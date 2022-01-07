@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>隊基本情報</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('troopInfos.edit', [$troopInfo->id]) }}" class='btn btn-primary float-right'>
                        <i class="far fa-edit"></i>編集
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
                @include('troop_infos.table')

            </div>

        </div>
    </div>

@endsection
