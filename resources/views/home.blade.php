@extends('layouts.app')

@section('content')
    @include('flash::message')
    <div class="container">
        <h1>18NSJ東京連盟中央会場受付システム</h1>
        @unless(auth()->user()->is_admin || auth()->user()->is_troopstaff || auth()->user()->is_commi)
            <h2>奉仕スタッフ</h2>
            <a href="{{ url('/user/volstaffs') }}" class="uk-button uk-button-primary">奉仕スタッフの登録・確認はこちら</a>
        @endunless

        @unless(auth()->user()->is_admin || auth()->user()->is_staff || auth()->user()->is_commi)
            <h2>派遣隊の受付</h2>
            <ul>
                <li>現在情報はありません</li>
            </ul>
        @endunless
        {{-- 隊スタッフのメニュー --}}
        @if (auth()->user()->is_troopstaff)
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><span uk-icon="info"></span>隊基本情報</h3>
                <p class=""><a href="{{ route('troopInfos.index') }}">隊基本情報</a>は以下の情報を管理します。</p>
                <ul>
                    <li>地区情報</li>
                    <li>地区責任者情報、同責任者情報</li>
                    <li>派遣隊の班情報(班名)</li>
                </ul>
            </div>
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><span uk-icon="users"></span>メンバー管理</h3>
                <p class=""><a
                        href="{{ route('members.index') }}">メンバー管理</a>は派遣隊の構成員の情報を管理します。提出いただいたエクセルシートの情報をインポートしてありますのでメンバーの入れ替えなどがあれば随時修正をしてください。<br>
                    一覧をエクセル形式でダウンロード可能です。</p>
            </div>
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><span uk-icon="upload"></span>アップロード管理</h3>
                <p class="">現在準備中</p>
            </div>

            <h3>統計情報</h3>
            <h4>スカウトの構成</h4>
            <table class="uk-table uk-table-striped uk-table-hover">
                @foreach ($members['gender'] as $val)
                    <tr>
                        <td>{{ $val->gender }}</td>
                        <td>{{ $val->count }}</td>
                    </tr>
                @endforeach
            </table>

            <h4>進級</h4>
            <table class="uk-table uk-table-striped uk-table-hover">
                @foreach ($members['grade'] as $val)
                    <tr>
                        <td>{{ $val->grade }}</td>
                        <td>{{ $val->count }}</td>
                    </tr>
                @endforeach
            </table>

            <h4>宗教</h4>
            <table class="uk-table uk-table-striped uk-table-hover">
                @foreach ($members['religion'] as $val)
                    <tr>
                        <td>{{ $val->religion }}</td>
                        <td>{{ $val->count }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
        @if (auth()->user()->is_commi)
            <h3>{{ auth()->user()->is_commi }}地区コミッショナーさん、ようこそ!</h3>

            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><span uk-icon="info"></span>派遣隊一覧</h3>
                <p class=""><a
                        href="{{ route('district_trooplists.index') }}">派遣隊一覧</a>は派遣隊のスカウト、指導者に関する情報を表示します。</p>
            </div>

            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title"><span uk-icon="users"></span>奉仕者一覧</h3>
                <p class=""><a
                        href="{{ route('district_vol_staffs.index') }}">奉仕者一覧</a>は中央会場各所で奉仕するスタッフの情報を表示します。参加確認処理を行ってください。
                </p>
            </div>
        @endif

        @if (auth()->user()->is_admin)
            <div class="row">
                <h3>ベース別スタッフ数</h3>
                <table class="uk-table uk-table-striped uk-table-hover">
                    <thead>
                        <tr>
                            @foreach ($volstaffs['camp_area'] as $val)
                                @unless(empty($val->camp_area))
                                    <th class="uk-table-shrink"><a href="{{ url("/admin/vol_staffs/?camp_area=$val->camp_area") }}">{{ $val->camp_area }}</a></td>
                                    @endunless
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($volstaffs['camp_area'] as $val)
                                @unless(empty($val->camp_area))
                                    <td>{{ $val->count }}人</td>
                                @endunless
                            @endforeach
                        </tr>
                    </tbody>
                </table>

                <h3>部署別スタッフ数</h3>
                <table class="uk-table uk-table-striped uk-table-hover">
                    <thead>
                        <tr>
                            @foreach ($volstaffs['job'] as $val)
                                @unless(empty($val->job_department))
                                    <th class="uk-table-shrink"><a href="{{ url("/admin/vol_staffs/?job_department=$val->job_department") }}">{{ $val->job_department }}</a></th>
                                @endunless
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($volstaffs['job'] as $val)
                                @unless(empty($val->job_department))
                                    <td>{{ $val->count }}</td>
                                @endunless
                            @endforeach
                        </tr>
                    </tbody>
                </table>

                <h3>地区別スタッフ数</h3>
                <table class="uk-table uk-table-striped uk-table-hover uk-table-small">
                    <thead>
                        <tr>
                            @foreach ($volstaffs['district'] as $val)
                                <th class="uk-table-shrink"><a href="{{ url("/admin/vol_staffs/?district=$val->org_district") }}">{{ $val->org_district }}</a></th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($volstaffs['district'] as $val)
                                <td class="">{{ $val->count }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
