@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>隊基本情報作成</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="card">

            {!! Form::open(['route' => 'troopInfos.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('troop_infos.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('troopInfos.index') }}" class="btn btn-default">キャンセル</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
