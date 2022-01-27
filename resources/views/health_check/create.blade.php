@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>健康調査票をアップロード</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h3 class="uk-card-title">対象者: {{ $member->name }}</h3>
            </div>
        </div>

        <div class="card">
                {!! Form::open(['route' => 'health_check.store', 'files' => true]) !!}

                <div class="card-body">

                    <div class="row">
                        @include('health_check.fields')
                    </div>

                </div>

                <div class="card-footer">
                    {!! Form::submit('アップロード', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('health_check.index') }}" class="btn btn-default">キャンセル</a>
                </div>

                {!! Form::close() !!}
        </div>
    </div>
@endsection
