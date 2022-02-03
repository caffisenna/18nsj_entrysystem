<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Member;
use App\Models\TroopInfo;
use Illuminate\Http\Request;
use Flash;
use Response;
use Ramsey\Uuid\Uuid;

class commiMemberController extends AppBaseController
{
    /**
     * Display a listing of the Member.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Member $members */
        // $members = Member::all();
        $members = Member::where('user_id', $request->troop_id)->get();

        // 当該地区以外は見せない
        $troop = TroopInfo::where('user_id', $request->troop_id)->first();
        if($troop->district <> auth()->user()->is_commi){
            Flash::error('当該のデータが見つからない、もしくは閲覧権限がありません');

            return redirect(route('district_trooplists.index'));
        }

        // 班名処理
        foreach ($members as $member) {
            if (isset($member->patrol_code)) {
                switch ($member->patrol_code) {
                    case '1':
                        $member->patrol_code = TroopInfo::where('id', auth()->id())->value('patrol1');
                        break;
                    case '2':
                        $member->patrol_code = TroopInfo::where('id', auth()->id())->value('patrol2');
                        break;
                    case '3':
                        $member->patrol_code = TroopInfo::where('id', auth()->id())->value('patrol3');
                        break;
                    case '4':
                        $member->patrol_code = TroopInfo::where('id', auth()->id())->value('patrol4');
                        break;
                    case '5':
                        $member->patrol_code = TroopInfo::where('id', auth()->id())->value('patrol5');
                        break;
                    case '6':
                        $member->patrol_code = TroopInfo::where('id', auth()->id())->value('patrol6');
                        break;
                }
            }
        }

        return view('commi.troop_members.index')
            ->with('members', $members);
    }

    /**
     * Show the form for creating a new Member.
     *
     * @return Response
     */


    /**
     * Display the specified Member.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Member $member */
        $member = Member::findorfail($id);

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('district_troop_members.index'));
        }

        return view('commi.troop_members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified Member.
     *
     * @param int $id
     *
     * @return Response
     */
}
