<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Volstaff;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin) {
            // 管理者モード
            // 奉仕スタッフ統計
            $volstaffs['camp_area'] = Volstaff::select('camp_area', DB::raw("count(camp_area) as count"))->groupBy('camp_area')->get();
            $volstaffs['district'] = Volstaff::select('org_district', DB::raw("count(org_district) as count"))->groupBy('org_district')->get();
            $volstaffs['howtojoin'] = Volstaff::select('how_to_join', DB::raw("count(how_to_join) as count"))->groupBy('how_to_join')->get();
            $volstaffs['job'] = Volstaff::select('job_department', DB::raw("count(job_department) as count"))->groupBy('job_department')->get();

            // 参加隊のステータス
            $members['gender'] = Member::where('org_role', 'スカウト')->select('gender', DB::raw("count(gender) as count"))->groupBy('gender')->get();
            $members['grade'] = Member::where('grade', "<>", '')->select('grade', DB::raw("count(grade) as count"))->groupBy('grade')->get();
            $members['religion'] = Member::where('religion', "<>", '')->select('religion', DB::raw("count(religion) as count"))->groupBy('religion')->get();


            return view('home')->with('volstaffs', $volstaffs);
        }

        // 参加隊モード
        if (auth()->user()->is_troopstaff) {
            // 参加隊のステータス
            $members['gender'] = Member::where('user_id', auth()->id())->where('org_role', 'スカウト')->select('gender', DB::raw("count(gender) as count"))->groupBy('gender')->get();
            $members['grade'] = Member::where('user_id', auth()->id())->where('grade', "<>", '')->select('grade', DB::raw("count(grade) as count"))->groupBy('grade')->get();
            $members['religion'] = Member::where('user_id', auth()->id())->where('religion', "<>", '')->select('religion', DB::raw("count(religion) as count"))->groupBy('religion')->get();
            return view('home')->with('members', $members);
        }
        return view('home');
    }
}
