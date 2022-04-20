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
        $users = User::where('name','NOT LIKE',"%地区")->with('volstaff')->get();

        return view('admin.users')
            ->with('users', $users);
    }
}
