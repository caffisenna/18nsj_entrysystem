@if (Auth::user()->is_troopstaff)
    <li class="nav-item">
        <a href="{{ route('troopInfos.index') }}"
            class="nav-link {{ Request::is('user/troopInfos*') ? 'active' : '' }}">
            <p>隊基本情報</p>
        </a>
    </li>


    <li class="nav-item">
        <a href="{{ route('members.index') }}" class="nav-link {{ Request::is('user/members*') ? 'active' : '' }}">
            <p>メンバー一覧</p>
        </a>
    </li>
@endif

@if (!Auth::user()->is_troopstaff && !Auth::user()->is_admin)
    <li class="nav-item">
        {{-- <a href="{{ route('volstaffs.index') }}" --}}
        <a href="user/volstaffs"
            class="nav-link {{ Request::is('user/volstaffs*') ? 'active' : '' }}">
            <p>奉仕者</p>
        </a>
    </li>
@endif

@if (Auth::user()->is_admin)
    <li class="nav-item">
        <a href="{{ route('trooplists.index') }}"
            class="nav-link {{ Request::is('admin/trooplists*') ? 'active' : '' }}">
            <p>参加隊一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('vol_staffs.index') }}"
            class="nav-link {{ Request::is('admin/vol_staffs*') ? 'active' : '' }}">
            <p>奉仕者一覧</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('districtExecs.index') }}"
            class="nav-link {{ Request::is('admin/districtExecs*') ? 'active' : '' }}">
            <p>地区役員DB</p>
        </a>
    </li>
@endif
