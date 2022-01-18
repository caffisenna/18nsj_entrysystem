@if(Auth::user()->is_troopstaff)
<li class="nav-item">
    <a href="{{ route('troopInfos.index') }}"
       class="nav-link {{ Request::is('user/troopInfos*') ? 'active' : '' }}">
        <p>隊基本情報</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('members.index') }}"
       class="nav-link {{ Request::is('user/members*') ? 'active' : '' }}">
        <p>メンバー一覧</p>
    </a>
</li>
@endif

@if(!Auth::user()->is_troopstaff)
<li class="nav-item">
    <a href="{{ route('volstaffs.index') }}"
       class="nav-link {{ Request::is('user/volstaffs*') ? 'active' : '' }}">
        <p>奉仕者</p>
    </a>
</li>
@endif

<li class="nav-item">
    <a href="{{ route('districtExecs.index') }}"
       class="nav-link {{ Request::is('districtExecs*') ? 'active' : '' }}">
        <p>地区役員DB</p>
    </a>
</li>


