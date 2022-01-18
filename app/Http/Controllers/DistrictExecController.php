<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistrictExecRequest;
use App\Http\Requests\UpdateDistrictExecRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\DistrictExec;
use Illuminate\Http\Request;
use Flash;
use Response;

class DistrictExecController extends AppBaseController
{
    /**
     * Display a listing of the DistrictExec.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var DistrictExec $districtExecs */
        $districtExecs = DistrictExec::all();

        return view('district_execs.index')
            ->with('districtExecs', $districtExecs);
    }

    /**
     * Show the form for creating a new DistrictExec.
     *
     * @return Response
     */
    public function create()
    {
        return view('district_execs.create');
    }

    /**
     * Store a newly created DistrictExec in storage.
     *
     * @param CreateDistrictExecRequest $request
     *
     * @return Response
     */
    public function store(CreateDistrictExecRequest $request)
    {
        $input = $request->all();

        /** @var DistrictExec $districtExec */
        $districtExec = DistrictExec::create($input);

        Flash::success('District Exec saved successfully.');

        return redirect(route('districtExecs.index'));
    }

    /**
     * Display the specified DistrictExec.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DistrictExec $districtExec */
        $districtExec = DistrictExec::find($id);

        if (empty($districtExec)) {
            Flash::error('District Exec not found');

            return redirect(route('districtExecs.index'));
        }

        return view('district_execs.show')->with('districtExec', $districtExec);
    }

    /**
     * Show the form for editing the specified DistrictExec.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var DistrictExec $districtExec */
        $districtExec = DistrictExec::find($id);

        if (empty($districtExec)) {
            Flash::error('District Exec not found');

            return redirect(route('districtExecs.index'));
        }

        return view('district_execs.edit')->with('districtExec', $districtExec);
    }

    /**
     * Update the specified DistrictExec in storage.
     *
     * @param int $id
     * @param UpdateDistrictExecRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistrictExecRequest $request)
    {
        /** @var DistrictExec $districtExec */
        $districtExec = DistrictExec::find($id);

        if (empty($districtExec)) {
            Flash::error('District Exec not found');

            return redirect(route('districtExecs.index'));
        }

        $districtExec->fill($request->all());
        $districtExec->save();

        Flash::success('District Exec updated successfully.');

        return redirect(route('districtExecs.index'));
    }

    /**
     * Remove the specified DistrictExec from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DistrictExec $districtExec */
        $districtExec = DistrictExec::find($id);

        if (empty($districtExec)) {
            Flash::error('District Exec not found');

            return redirect(route('districtExecs.index'));
        }

        $districtExec->delete();

        Flash::success('District Exec deleted successfully.');

        return redirect(route('districtExecs.index'));
    }
}
