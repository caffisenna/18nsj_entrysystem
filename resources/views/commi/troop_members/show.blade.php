@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>詳細commi</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class='btn-group'>
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
