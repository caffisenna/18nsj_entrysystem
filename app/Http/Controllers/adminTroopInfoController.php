<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTroopInfoRequest;
use App\Http\Requests\UpdateTroopInfoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use App\Models\TroopInfo;
use App\Models\DistrictExec;
use Illuminate\Http\Request;
use Flash;
use Response;

class adminTroopInfoController extends AppBaseController
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
        $troops = User::where('is_troopstaff', '1')->with('troopinfo')->with('member')->get();

        return view('admin.troop_lists.index')
            ->with('troops', $troops);
    }

    /**
     * Show the form for creating a new TroopInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('troop_infos.create');
    }

    /**
     * Store a newly created TroopInfo in storage.
     *
     * @param CreateTroopInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateTroopInfoRequest $request)
    {
        $input = $request->all();

        // relation用にuser_idを認証idから取得
        $input['user_id'] = auth()->id();

        /** @var TroopInfo $troopInfo */
        $troopInfo = TroopInfo::create($input);

        Flash::success('Troop Info saved successfully.');

        return redirect(route('troopInfos.index'));
    }

    /**
     * Display the specified TroopInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TroopInfo $troopInfo */
        $troopInfo = TroopInfo::find($id);

        if (empty($troopInfo)) {
            Flash::error('Troop Info not found');

            return redirect(route('troopInfos.index'));
        }

        return view('troop_infos.show')->with('troopInfo', $troopInfo);
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
