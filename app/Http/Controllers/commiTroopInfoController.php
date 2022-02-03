<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\User;
use App\Models\TroopInfo;
use App\Models\DistrictExec;
use Illuminate\Http\Request;
use Flash;
use Response;

class commiTroopInfoController extends AppBaseController
{
    /**
     * Display a listing of the TroopInfo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var TroopInfo $troopInfos */
        $troops = User::where('is_troopstaff', '1')->with('troopinfo')->wherehas('troopinfo',function($q){
            $q->where('district', auth()->user()->is_commi);})->with('member')->get();

        return view('commi.troop_lists.index')
            ->with('troops', $troops);
    }


    public function show($id)
    {
        /** @var TroopInfo $troopInfo */
        $troopInfo = TroopInfo::find($id);

        if (empty($troopInfo)) {
            Flash::error('Troop Info not found');

            return redirect(route('commi.troopInfos.index'));
        }

        return view('commi.troop_infos.show')->with('troopInfo', $troopInfo);
    }

    /**
     * Show the form for editing the specified TroopInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var TroopInfo $troopInfo */
        $troopInfo = TroopInfo::find($id);

        if (empty($troopInfo)) {
            Flash::error('Troop Info not found');

            return redirect(route('troopInfos.index'));
        }

        return view('troop_infos.edit')->with('troopInfo', $troopInfo);
    }

    /**
     * Update the specified TroopInfo in storage.
     *
     * @param int $id
     * @param UpdateTroopInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTroopInfoRequest $request)
    {
        /** @var TroopInfo $troopInfo */
        $troopInfo = TroopInfo::find($id);

        if (empty($troopInfo)) {
            Flash::error('Troop Info not found');

            return redirect(route('troopInfos.index'));
        }

        $troopInfo->fill($request->all());
        $troopInfo->save();

        Flash::success('更新しました');

        return redirect(route('troopInfos.index'));
    }

    /**
     * Remove the specified TroopInfo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TroopInfo $troopInfo */
        $troopInfo = TroopInfo::find($id);

        if (empty($troopInfo)) {
            Flash::error('Troop Info not found');

            return redirect(route('troopInfos.index'));
        }

        $troopInfo->delete();

        Flash::success('Troop Info deleted successfully.');

        return redirect(route('troopInfos.index'));
    }
}
