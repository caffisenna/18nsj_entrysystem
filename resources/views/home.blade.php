@extends('layouts.app')

@section('content')
    @include('flash::message')
    <div class="container">
        {{-- 隊スタッフのメニュー --}}
        @if (auth()->user()->is_troopstaff)
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><span uk-icon="info"></span>隊基本情報</h3>
                <p class=""><a href="{{ route('troopInfos.index') }}">隊基本情報</a>は以下の情報を管理します。</p>
                <ul>
                    <li>地区情報</li>
                    <li>地区責任者情報、同責任者情報</li>
                    <li>参加隊の班情報(班名)</li>
                </ul>
            </div>
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><span uk-icon="users"></span>メンバー管理</h3>
                <p class=""><a
                        href="{{ route('members.index') }}">メンバー管理</a>は参加隊の構成員の情報を管理します。提出いただいたエクセルシートの情報をインポートしてありますのでメンバーの入れ替えなどがあれば随時修正をしてください。<br>
                    一覧をエクセル形式でダウンロード可能です。</p>
            </div>
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><span uk-icon="upload"></span>アップロード管理</h3>
                <p class="">アップロード管理はSFH修了証と健康調査票のアップロードを管理します。各メンバーの修了証と健康調査票をこちらからアップロードしてください。<br>
                    ファイルの形式はいずれもpdfかjpg形式です。</p>
            </div>
        @endif
        @if (auth()->user()->is_commi)
            <h3>{{ auth()->user()->is_commi }}地区コミッショナーさん、ようこそ!</h3>

            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><span uk-icon="info"></span>参加隊一覧</h3>
                <p class=""><a href="{{ route('district_trooplists.index') }}">参加隊一覧</a>は参加隊のスカウト、指導者に関する情報を表示します。</p>
            </div>

            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><span uk-icon="users"></span>奉仕者一覧</h3>
                <p class=""><a
                        href="{{ route('district_vol_staffs.index') }}">奉仕者一覧</a>は中央会場各所で奉仕するスタッフの情報を表示します。参加承認処理を行ってください。</p>
            </div>
        @endif
        <div class="row">
        </div>
    </div>
@endsection
