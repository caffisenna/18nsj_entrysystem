@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>詳細admin</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class='btn-group'>
            <a href="{{ route('troop_members.edit', [$member->id]) }}" class='btn btn-warning float-right'>
                <i class="far fa-edit"></i>編集
            </a>
            {{-- <a class="btn btn-default float-right" href="{{ route('troop_members.index') }}">
                戻る
            </a> --}}
            <button type="button" onClick="history.back()" class="btn btn-default">戻る</button>
        </div>
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('admin.troop_members.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
