<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Volstaff;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Flash;
use Response;

class commiVolstaffController extends AppBaseController
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
        $volstaffs = Volstaff::where('org_district', auth()->user()->is_commi)->with('user')->get();

        return view('commi.volstaffs.index')
            ->with('volstaffs', $volstaffs);
    }

    /**
     * Show the form for creating a new Volstaff.
     *
     * @return Response
     */


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

        // 当該地区以外は見せない
        if (empty($volstaff) || $volstaff->org_district <> auth()->user()->is_commi) {
            Flash::error('当該のデータが見つからない、もしくは閲覧権限がありません');

            return redirect(route('district_vol_staffs.index'));
        }

        // 参加費計算
        // 全期間の場合
        if ($volstaff->how_to_join == "全期間") {
            $fee = 30000;
        } else {
            // 部分参加の場合
            $days = substr_count($volstaff->join_days, "月") + 1;
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

        return view('commi.volstaffs.show')->with('volstaff', $volstaff);
    }

    /**
     * Show the form for editing the specified Volstaff.
     *
     * @param int $id
     *
     * @return Response
     */

    public function commi_check(Request $request){
        // 承認ボタン処理
        if($request['id']){
            $volstaff = Volstaff::with('user')->where('id',$request['id'])->first();
            $volstaff->commi_ok = now();
            $volstaff->save();
            Flash::success($volstaff->user->name." の承認を行いました");
            return back();
        }

    }
}
