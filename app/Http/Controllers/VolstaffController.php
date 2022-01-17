<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVolstaffRequest;
use App\Http\Requests\UpdateVolstaffRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Volstaff;
use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Flash;
use Response;

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
        $volstaff = Volstaff::where('user_id',auth()->id())->first();
        if(empty($volstaff)){
            $user = User::where('id',auth()->id())->first();
            return view('volstaffs.create')->with('user',$user);
        }else{
            return view('volstaffs.show')->with('volstaff',$volstaff)->with('user');
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

        /** @var Volstaff $volstaff */
        $volstaff = Volstaff::create($input);

        Flash::success('スタッフ情報を登録しました');

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
        $volstaff->save();

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
