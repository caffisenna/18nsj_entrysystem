@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>隊メンバー一覧</h1>
                </div>
                <div class="col-sm-6">
                    @unless(ENV('TROOP_NEW_LOCK'))
                    <a class="btn btn-primary float-right" href="{{ route('members.create') }}">
                        新規追加
                    </a>
                    @endunless
                    <a class="btn btn-default float-right" href="{{ route('export') }}">
                        <span uk-icon="download"></span>Excel
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
                @include('members.table')

            </div>

        </div>
    </div>

@endsection
