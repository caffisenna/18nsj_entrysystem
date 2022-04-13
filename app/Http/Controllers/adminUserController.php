<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

class adminUserController extends AppBaseController
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
        $users = User::with('volstaff')->get();
        // dd($users);
        // $members = Member::where('user_id', $request->troop_id)->get();

        return view('admin.users')
            ->with('users', $users);
    }
}
