@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>隊メンバー一覧admin</h1>
                </div>
                <div class="col-sm-6">
                    {{-- <a class="btn btn-primary float-right" href="{{ route('troop_members.create', $_REQUEST['troop_id']) }}"> --}}
                        <a class="btn btn-primary float-right" href="{{ url('/admin/troop_members/create?troop_id=').$_REQUEST['troop_id'] }}">
                        新規追加
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('admin.troop_members.table')

            </div>

        </div>
    </div>

@endsection
