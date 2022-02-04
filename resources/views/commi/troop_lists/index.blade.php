@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ auth()->user()->is_commi }}地区 隊リスト</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')

        <div class="clearfix"></div>

        <div class="table-responsive">
            <table class="table uk-table uk-table-striped uk-table-hover uk-table-small" id="members-table">
                <thead>
                    <tr>
                        <th>隊id</th>
                        <th>メンバー構成</th>
                        <th>隊長</th>
                        <th>操作担当者</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($troops as $troop)
                        <tr>
                            <td>{{ $troop->id }}</td>
                            <td><a href="{{ url("/commi/district_troop_members/?troop_id=$troop->id") }}">メンバー</a></td>
                            <td>{{ App\Models\Member::where('user_id',$troop->id)->where('role','隊長')->value('name'); }}</td>
                            <td>{{ $troop->name }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
