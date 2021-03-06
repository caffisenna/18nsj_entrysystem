@if (Auth::user()->is_troopstaff)
    <h4 class="uk-text-primary">基本情報</h4>
    <li class="nav-item">
        <a href="{{ route('troopInfos.index') }}"
            class="nav-link {{ Request::is('user/troopInfos*') ? 'active' : '' }}">
            <p><span uk-icon="info"></span>隊基本情報</p>
        </a>
    </li>


    <li class="nav-item">
        <a href="{{ route('members.index') }}" class="nav-link {{ Request::is('user/members*') ? 'active' : '' }}">
            <p><span uk-icon="users"></span>メンバー管理</p>
        </a>
    </li>

    <h4 class="uk-text-primary">アップロード管理</h4>

    {{-- <li class="nav-item">
        <a href="{{ route('sfh.index') }}" class="nav-link {{ Request::is('user/sfh*') ? 'active' : '' }}">
            <p><span uk-icon="upload"></span>SFH</p>
        </a>
    </li> --}}

    {{-- <li class="nav-item">
        <a href="{{ route('health_check.index') }}"
            class="nav-link {{ Request::is('user/health_check*') ? 'active' : '' }}">
            <p><span uk-icon="upload"></span>健康調査票</p>
        </a>
    </li> --}}
@endif

@if (!Auth::user()->is_troopstaff && !Auth::user()->is_admin && !Auth::user()->is_commi)
    <li class="nav-item">
        <a href="{{ route('volstaffs.index') }}"
            class="nav-link {{ Request::is('user/volstaffs*') ? 'active' : '' }}">
            <p>登録情報確認</p>
        </a>
    </li>
@endif

@if (Auth::user()->is_admin)
    @if (Auth::user()->is_staff == 0)
        <li class="nav-item">
            <a href="{{ route('trooplists.index') }}"
                class="nav-link {{ Request::is('admin/trooplists*') ? 'active' : '' }}">
                <p>派遣隊一覧</p>
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a href="{{ route('vol_staffs.index') }}"
            class="nav-link {{ Request::is('admin/vol_staffs*') ? 'active' : '' }}">
            <p>奉仕者一覧</p>
        </a>
    </li>
        <li class="nav-item">
            <a href="{{ route('schedule') }}"
                class="nav-link {{ Request::is('admin/schedule*') ? 'active' : '' }}">
                <p>参加日程</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('car_info') }}"
                class="nav-link {{ Request::is('admin/car_info*') ? 'active' : '' }}">
                <p>車両情報</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user_memo') }}"
                class="nav-link {{ Request::is('admin/user_memo*') ? 'active' : '' }}">
                <p>備考情報</p>
            </a>
        </li>
        @if (Auth::user()->is_staff == 0)
        <li class="nav-item">
            <a href="{{ route('undefined') }}"
                class="nav-link {{ Request::is('admin/undefined*') ? 'active' : '' }}">
                <p>部署未定一覧</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user_list') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                <p>ユーザー一覧</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('districtExecs.index') }}"
                class="nav-link {{ Request::is('admin/districtExecs*') ? 'active' : '' }}">
                <p>地区役員DB</p>
            </a>
        </li>

        <h4><span class="uk-text-danger">Danger</span></h4>

        <li class="nav-item">
            <a href="{{ route('gen_uuid') }}"
                class="nav-link {{ Request::is('admin/gen_uuid*') ? 'active' : '' }}">
                <p>UUID生成</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('fee_check') }}"
                class="nav-link {{ Request::is('admin/fee_check*') ? 'active' : '' }}">
                <p>入金チェック</p>
            </a>
        </li>
    @endif
@endif

@if (Auth::user()->is_commi && Auth::user()->is_troopstaff == 0)
    <li class="nav-item">
        <a href="{{ route('district_trooplists.index') }}"
            class="nav-link {{ Request::is('commi/trooplists*') ? 'active' : '' }}">
            <p>派遣隊一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('district_vol_staffs.index') }}"
            class="nav-link {{ Request::is('commi/vol_staffs*') ? 'active' : '' }}">
            <p>奉仕者一覧</p>
        </a>
    </li>
@endif

<h4 class="uk-text-primary">webサイト</h4>
<a href="https://18nsj.tokyo" class="nav-link">中央会場HP</a>
