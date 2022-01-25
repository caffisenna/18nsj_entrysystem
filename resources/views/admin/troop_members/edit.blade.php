@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>メンバー編集admin</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            {!! Form::model($member, ['route' => ['troop_members.update', $member->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('admin.troop_members.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
                {{-- <a href="{{ route('troop_members.index') }}" class="btn btn-default">キャンセル</a> --}}
                <button type="button" onClick="history.back()" class="btn btn-default">キャンセル</button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
