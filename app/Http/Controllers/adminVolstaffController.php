<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVolstaffRequest;
use App\Http\Requests\UpdateVolstaffRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Volstaff;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Flash;
use Laracasts\Flash\Flash as FlashFlash;
use Response;
use App\Http\Util\SlackPost;
use Log;

class adminVolstaffController extends AppBaseController
{
    /**
     * Display a listing of the Volstaff.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Volstaff $volstaffs */

        // ここでwith('user')することでeager loadすることが可能
        // データが増えたときにN+1問題を回避できる
        if (isset($_REQUEST['district'])) { // 地区
            $volstaffs = Volstaff::where('org_district', $_REQUEST['district'])->with('user')->get();
        } elseif (isset($_REQUEST['job_department'])) { // 部署
            $volstaffs = Volstaff::where('job_department', $_REQUEST['job_department'])->with('user')->get();
        } elseif (isset($_REQUEST['camp_area'])) {
            $volstaffs = Volstaff::where('camp_area', $_REQUEST['camp_area'])->with('user')->get();
        } else {
            $volstaffs = Volstaff::with('user')->get();
        }

        return view('admin.volstaffs.index')
            ->with('volstaffs', $volstaffs);
    }

    /**
     * Show the form for creating a new Volstaff.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.volstaffs.create');
    }

    /**
     * Store a newly created Volstaff in storage.
     *
     * @param CreateVolstaffRequest $request
     *
     * @return Response
     */
    public function store(CreateVolstaffRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->id();
        $input['uuid'] = Uuid::uuid4();

        // 参加日程をシリアライズ
        if (isset($input['join_days'])) {
            $input['join_days'] = serialize($input['join_days']);
        }

        /** @var Volstaff $volstaff */
        $volstaff = Volstaff::create($input);

        // Userテーブルにフラグ付与
        Auth()->user()->is_staff = 1;
        Auth()->user()->save();

        Flash::success('スタッフ情報を登録しました');

        return redirect(route('vol_staffs.index'));
    }

    /**
     * Display the specified Volstaff.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Volstaff $volstaff */
        $volstaff = Volstaff::with('user')->find($id);

        if (empty($volstaff)) {
            Flash::error('Volstaff not found');

            return redirect(route('vol_staffs.index'));
        }

        // 参加費計算
        // 全期間の場合
        if ($volstaff->how_to_join == "全期間") {
            $fee = 32000;
        } else {
            // 部分参加の場合
            $days = substr_count($volstaff->join_days, "月");
            $fee = 4000 * $days;
            $cost = 5000; // 日連+東連分担金
            $fee = $fee + $cost;

            // 参加日程のunserialize
            $volstaff->join_days = implode(',', unserialize($volstaff->join_days));
        }

        // 大集会参加費
        if ($volstaff->event_0807 == "あり") {
            $event_fee = 2000;
        } else {
            $event_fee = 0;
        }

        // 合計
        $volstaff->total_fee = $fee + $event_fee;

        return view('admin.volstaffs.show')->with('volstaff', $volstaff);
    }

    /**
     * Show the form for editing the specified Volstaff.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Volstaff $volstaff */
        $volstaff = Volstaff::find($id);

        if (empty($volstaff)) {
            Flash::error('Volstaff not found');

            return redirect(route('vol_staffs.index'));
        }

        if (isset($volstaff->join_days) && !empty($volstaff->join_days)) {
            $volstaff->join_days = implode(",", unserialize($volstaff->join_days));
        }

        return view('admin.volstaffs.edit')->with('volstaff', $volstaff)->with('user');
    }

    /**
     * Update the specified Volstaff in storage.
     *
     * @param int $id
     * @param UpdateVolstaffRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVolstaffRequest $request)
    {
        /** @var Volstaff $volstaff */
        $volstaff = Volstaff::find($id);

        if (empty($volstaff)) {
            Flash::error('Volstaff not found');

            return redirect(route('vol_staffs.index'));
        }

        $volstaff->fill($request->all());
        // 参加日程をシリアライズ
        if ($volstaff->how_to_join <> "全期間") {
            $volstaff['join_days'] = serialize($request['join_days']);
        } else {
            $volstaff['join_days'] = null;
        }
        $volstaff->save();

        Flash::success('スタッフ情報を更新しました');

        return redirect(route('vol_staffs.index'));
    }

    /**
     * Remove the specified Volstaff from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Volstaff $volstaff */
        $volstaff = Volstaff::find($id);

        if (empty($volstaff)) {
            Flash::error('Volstaff not found');

            return redirect(route('vol_staffs.index'));
        }

        $volstaff->delete();

        Flash::success('削除しました。');

        return redirect(route('vol_staffs.index'));
    }

    public function fee_check(Request $request)
    {
        /** @var Volstaff $volstaffs */

        // 入金ボタン処理
        if ($request['id']) {
            $volstaff = Volstaff::with('user')->where('id', $request['id'])->first();
            $volstaff->fee_checked_at = now();

            $name = User::where('id', $volstaff->user_id)->value('name') . "(" . $volstaff->org_district . ")";

            // slack
            $slackpost = new SlackPost();
            $slackpost->send(":dollar: " . $name . ' の入金チェック');

            // logger
            Log::info('[入金チェック] ' . $name);

            $volstaff->save();
            Flash::success($volstaff->user->name . " の入金確認を行いました");
            return back();
        }

        // ここでwith('user')することでeager loadすることが可能
        // データが増えたときにN+1問題を回避できる
        // 参加費個人振込は6/1以降に登録した人だけなので、フィルターをかける
        $volstaffs = Volstaff::with('user')->where('created_at', '>', '2022-06-01 00:00:00')->get();

        // 参加費計算
        foreach ($volstaffs as $volstaff) {
            // 全期間の場合
            if ($volstaff->how_to_join == "全期間") {
                $fee = 32000;
            } else {
                // 部分参加の場合
                $days = substr_count($volstaff->join_days, '月');
                $fee = 4000 * $days;
                $cost = 5000; // 日連+東連分担金
                $fee = $fee + $cost;
            }

            // 大集会参加費
            if ($volstaff->event_0807 == "あり") {
                $event_fee = 2000;
            } else {
                $event_fee = 0;
            }

            // 合計
            $volstaff->total_fee = $fee + $event_fee;
        }

        return view('admin.volstaffs.fee_check')
            ->with('volstaffs', $volstaffs);
    }

    public function undefined(Request $request)
    {
        /** @var Volstaff $volstaffs */

        $volstaffs = Volstaff::whereNull('camp_area')->with('user')->get();

        return view('admin.volstaffs.undefined')
            ->with('volstaffs', $volstaffs);
    }

    public function schedule(Request $request)
    {
        /** @var Volstaff $volstaffs */

        if (isset($request->base) && empty(($request->depart))) {
            $volstaffs = Volstaff::with('user')->where('camp_area', $request->base)->orderby('camp_area')->get();
        } elseif (isset($request->depart) && empty(($request->base))) {
            $volstaffs = Volstaff::with('user')->where('job_department', $request->depart)->orderby('camp_area')->get();
        } elseif (isset($request->base) && isset($request->depart)) {
            $volstaffs = Volstaff::with('user')->where('camp_area', $request->base)->where('job_department', $request->depart)->orderby('camp_area')->get();
        } else {
            $volstaffs = Volstaff::with('user')->orderby('camp_area')->get();
        }

        return view('admin.volstaffs.schedule')
            ->with('volstaffs', $volstaffs);
    }
}
