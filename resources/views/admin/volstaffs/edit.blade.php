@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{ $volstaff->user->name }}さんの情報編集admin</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($volstaff, ['route' => ['vol_staffs.update', $volstaff->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('admin.volstaffs.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('vol_staffs.index') }}" class="btn btn-default">キャンセル</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
