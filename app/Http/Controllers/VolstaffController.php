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
use Response;
use App\Http\Util\SlackPost;
use Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\StaffRegisterd;

class VolstaffController extends AppBaseController
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

        // 隊スタッフが見ようとしたらHOMEにへリダイレクト
        if (Auth::user()->is_troopstaff) {
            return view('home');
        }

        $volstaff = Volstaff::where('user_id', auth()->id())->first();
        // 登録期間外
        if(empty($volstaff) && env('STAFF_LOCK')){
            Flash::error('期間外のため新規登録と情報の編集ができません');
            return view('home');
        }
        if (empty($volstaff)) {
            $user = User::where('id', auth()->id())->first();
            return view('volstaffs.create')->with('user', $user);
        } else {
            if (isset($volstaff->join_days) && $volstaff->join_days <> "N;") {
                $volstaff->join_days = implode(",", unserialize($volstaff->join_days));
            }
            // 参加費計算
            // 全期間の場合
            if ($volstaff->how_to_join == "全期間") {
                $fee = 32000;
            } else {
                // 部分参加の場合
                $days = substr_count($volstaff->join_days, ',') + 1;
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
            return view('volstaffs.show')->with('volstaff', $volstaff)->with('user');
        }

        return view('volstaffs.index')
            ->with('volstaffs', $volstaffs);
    }

    /**
     * Show the form for creating a new Volstaff.
     *
     * @return Response
     */
    public function create()
    {
        return view('volstaffs.create');
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

        Flash::success('スタッフ情報を登録しました。登録完了メールを送信しました。');

        //slack通知
        $name = User::where('id', $input['user_id'])->value('name'); // 氏名をUserから取得
        $slackpost = new SlackPost();
        $slackpost->send(":new: " . $name . ' (' . $input['org_district'] . ')' . ' がスタッフ情報を登録しました');

        // logger
        Log::info('[新規スタッフ登録] name:' . $name . ' district:' . $input['org_district']);

        // 確認メール送信
        $sendto = User::where('id', $input['user_id'])->value('email');
        Mail::to($sendto)->queue(new StaffRegisterd($name)); // メールをqueueで送信

        return redirect(route('volstaffs.index'));
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
        $volstaff = Volstaff::find($id);

        if (empty($volstaff)) {
            Flash::error('Volstaff not found');

            return redirect(route('volstaffs.index'));
        }

        // 参加費計算
        // 全期間の場合
        if ($volstaff->how_to_join == "全期間") {
            $fee = 32000;
        } else {
            // 部分参加の場合
            $days = substr_count($volstaff->join_days, ',');
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

        return view('volstaffs.show')->with('volstaff', $volstaff);
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

            return redirect(route('volstaffs.index'));
        }

        // 登録期間外
        if(env('STAFF_LOCK')){
            Flash::error('期間外のため新規登録と情報の編集ができません');
            return view('home');
        }

        // 確定後の編集ロック
        if(isset($volstaff->edit_lock)){
            Flash::error('申込確定後の編集はできません。');
            return view('home');
        }

        if (isset($volstaff->join_days)) {
            $volstaff->join_days = implode(",", unserialize($volstaff->join_days));
        }

        return view('volstaffs.edit')->with('volstaff', $volstaff)->with('user');
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

            return redirect(route('volstaffs.index'));
        }

        $volstaff->fill($request->all());
        // 参加日程をシリアライズ
        if ($volstaff->how_to_join <> "全期間") {
            $volstaff['join_days'] = serialize($request['join_days']);
        } else {
            $volstaff['join_days'] = null;
        }
        $volstaff->save();

        $name = Auth()->user()->name . "(" . $request['org_district'] . ")";

        $slackpost = new SlackPost();
        $slackpost->send(":pencil: " . $name . ' がスタッフ情報を更新しました');

        // logger
        Log::info('[スタッフ情報更新] name:' . $name);

        Flash::success('スタッフ情報を更新しました');

        return redirect(route('volstaffs.index'));
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

            return redirect(route('volstaffs.index'));
        }

        $volstaff->delete();

        Flash::success('Volstaff deleted successfully.');

        return redirect(route('volstaffs.index'));
    }
}
