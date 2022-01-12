<li class="nav-item">
    <a href="{{ route('troopInfos.index') }}"
       class="nav-link {{ Request::is('troopInfos*') ? 'active' : '' }}">
        <p>隊基本情報</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('members.index') }}"
       class="nav-link {{ Request::is('members*') ? 'active' : '' }}">
        <p>メンバー一覧</p>
    </a>
</li>


