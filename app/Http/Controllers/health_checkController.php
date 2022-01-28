<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createhealth_checkRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Member;
use Auth;
use File;

use App\Http\Util\SlackPost;

class health_checkController extends AppBaseController
{
    /**
     * Display a listing of the planUpload.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $id = auth()->id();

        $members = Member::where('user_id', $id)->get();

        return view('health_check.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new planUpload.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $member = Member::where('user_id', auth()->id())->where('id', $request['id'])->select('id','name')->firstorfail();
        return view('health_check.create')->with('member', $member);
    }

    /**
     * Store a newly created planUpload in storage.
     *
     * @param CreateplanUploadRequest $request
     *
     * @return Response
     */
    public function store(Createhealth_checkRequest $request)
    {
        $input = $request->all();

        // ファイル名をhash化する
        $fileName = $request->file->hashName();

        // 画像をpublicに移動
        $request->file->move(public_path('health_check'), $fileName);

        $input['file_path'] = $fileName;
        $member = Member::where('id', $input['member_id'])->firstorfail();
        $member->health_check = $fileName;
        $member->save();

        /** @var planUpload $planUpload */
        // $sfh = Sfh::create($input);

        // slack通知
        // $id = Auth()->user()->id;
        // $name = Auth()->user()->name;
        // $slack = new SlackPost();
        // $slack->send(":memo:[計画書] 参加者ID:$id " . $name . "さんが計画書アップ!");

        Flash::success('アップロードが完了しました');

        return redirect(route('health_check.index'));
    }

    /**
     * Show the form for editing the specified planUpload.
     *
     * @param int $id
     *
     * @return Response
     */


    /**
     * Remove the specified planUpload from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Health_check $planUpload */
        $member = Member::where('id',$id)->firstorfail();
        $delFileName = $member->health_check;

        // ファイル削除
        File::delete(public_path('health_check/') . $delFileName);


        if (empty($delFileName)) {
            Flash::error('ファイルが見つかりません');

            return redirect(route('health_check.index'));
        }

        $member->health_check = null;
        $member->save();

        // $member->delete();

        Flash::success('健康調査票の削除が完了しました。');

        return redirect(route('health_check.index'));
    }
}
