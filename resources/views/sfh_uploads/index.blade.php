@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SFH修了証データアップロード</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        {{-- <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">SFH修了証のアップロード</h3>
            </div>
        </div> --}}

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('sfh_uploads.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
