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
use Auth;
use App\Http\Util\SlackPost;
use Log;

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
        // $members = Member::where('user_id', auth()->id())->get();
        $members = Member::where('user_id', Auth()->user()->is_troopstaff)->get();
        // dd($members);

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

        return view('members.create')->with('member', $member);
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
        $name = ($input['name'] . ' (' . $input['org_dan_name'] . $input['org_dan_number'] . ')');

        // $input['user_id'] = Auth::user()->id;
        $input['user_id'] = Auth::user()->is_troopstaff;

        /** @var Member $member */
        $member = Member::create($input);

        $slackpost = new SlackPost();
        $slackpost->send(":new: " . $name . ' の参加者登録がされました。');

        // logger
        Log::info('[新規参加者登録] name:' . $name);

        Flash::success('メンバーを登録しました。');

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

        if ($member->user_id <> Auth()->user()->is_troopstaff) {
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
        $user_id = Member::where('id', $id)->value('user_id');

        /** @var Member $member */
        if ($user_id <> Auth::user()->is_troopstaff) {
            Flash::error('権限がありません');
            return redirect(route('members.index'));
        }

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
        $name = ($request['name'] . ' (' . $request['org_dan_name'] . $request['org_dan_number'] . ')');

        $member->save();

        $slackpost = new SlackPost();
        $slackpost->send(":memo: " . $name . ' の参加者情報が更新されました。');

        // logger
        Log::info('[参加者更新] name:' . $name);

        Flash::success("$name の情報を更新しました");

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

        // 氏名設定
        $name = $member->name . "(" . $member->org_dan_name . $member->org_dan_number . ")";

        $member->delete();

        // slack
        $slackpost = new SlackPost();
        $slackpost->send(":put_litter_in_its_place: " . $name . ' の参加者情報が削除されました。');

        // logger
        Log::info('[参加者削除] name:' . $name);

        Flash::success($name . 'を削除しました。');

        return redirect(route('members.index'));
    }

    public function export()
    {
        return Excel::download(new TroopMembersExport, 'member_lists.xlsx');
    }
}
