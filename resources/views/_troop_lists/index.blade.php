@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>隊リスト</h1>
                </div>
                <div class="col-sm-6">
                    {{-- <a href="{{ route('troopInfos.edit', [$troops->id]) }}" class='btn btn-primary float-right'>
                        <i class="far fa-edit"></i>編集
                    </a> --}}
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
                        <th>地区</th>
                        <th>操作担当者</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($troops as $troop)
                        <tr>
                            <td><a href="{{ route('members.show', [$troop->id]) }}">{{ $troop->id }}</a></td>
                            <td>@if(isset($troop->troopinfo->district)){{ $troop->troopinfo->district }}@endif</td>
                            <td>{{ $troop->name }}</td>
                            <td width="120">
                                {!! Form::open(['route' => ['members.destroy', $troop->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('members.edit', [$troop->id]) }}" class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
