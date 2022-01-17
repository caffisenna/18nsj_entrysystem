@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ Auth::user()->name }}さんの情報</h1>
                </div>
                <div class="col-sm-6 btn-group">
                    <a href="{{ route('volstaffs.edit', [$volstaff->id]) }}" class='btn btn-default btn-xs'>
                        <i class="far fa-edit"></i>
                    </a>
                    <a class="btn btn-default float-right" href="{{ route('volstaffs.index') }}">
                        戻る
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('volstaffs.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
