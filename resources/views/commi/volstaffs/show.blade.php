@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $volstaff->user->name }}さんの情報commi</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            @include('flash::message')

            <div class="card-body">
                <div class="row">
                    @include('commi.volstaffs.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
