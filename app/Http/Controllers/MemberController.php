<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Member;
use App\Models\TroopInfo;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Exports\TroopMembersExport;
use Excel;

class MemberController extends AppBaseController
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
        $members = Member::where('user_id', auth()->id())->get();

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

        return view('members.index')
            ->with('members', $members);
    }

    /**
     * Show the form for creating a new Member.
     *
     * @return Response
     */
    public function create()
    {
        $member = new Member();
        // 班名取得
        $member->p1 = TroopInfo::where('id', auth()->id())->value('patrol1');
        $member->p2 = TroopInfo::where('id', auth()->id())->value('patrol2');
        $member->p3 = TroopInfo::where('id', auth()->id())->value('patrol3');
        $member->p4 = TroopInfo::where('id', auth()->id())->value('patrol4');
        $member->p5 = TroopInfo::where('id', auth()->id())->value('patrol5');
        $member->p6 = TroopInfo::where('id', auth()->id())->value('patrol6');

        return view('members.create')->with('member',$member);
    }

    /**
     * Store a newly created Member in storage.
     *
     * @param CreateMemberRequest $request
     *
     * @return Response
     */
    public function store(CreateMemberRequest $request)
    {
        $input = $request->all();

        /** @var Member $member */
        $member = Member::create($input);

        Flash::success('Member saved successfully.');

        return redirect(route('members.index'));
    }

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

        if($member->user_id <> auth()->id()){
            Flash::error('閲覧権限がありません');
            return redirect(route('members.index'));
        }

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }

        return view('members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified Member.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Member $member */
        $member = Member::find($id);

        // 班名取得
        $member->p1 = TroopInfo::where('id', auth()->id())->value('patrol1');
        $member->p2 = TroopInfo::where('id', auth()->id())->value('patrol2');
        $member->p3 = TroopInfo::where('id', auth()->id())->value('patrol3');
        $member->p4 = TroopInfo::where('id', auth()->id())->value('patrol4');
        $member->p5 = TroopInfo::where('id', auth()->id())->value('patrol5');
        $member->p6 = TroopInfo::where('id', auth()->id())->value('patrol6');


        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }

        return view('members.edit')->with('member', $member);
    }

    /**
     * Update the specified Member in storage.
     *
     * @param int $id
     * @param UpdateMemberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMemberRequest $request)
    {
        /** @var Member $member */
        $member = Member::find($id);

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }

        $member->fill($request->all());
        $member->save();

        Flash::success("$request->name の情報を更新しました");

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified Member from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Member $member */
        $member = Member::find($id);

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }

        $member->delete();

        Flash::success('Member deleted successfully.');

        return redirect(route('members.index'));
    }

    public function export(){
        return Excel::download(new TroopMembersExport, 'member_lists.xlsx');
    }
}
