@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>スケジュール</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
        <form action="" method="post">
            {!! Form::open() !!}
            {!! Form::label('base', 'ベース:') !!}
            {!! Form::select('base', ['' => '', '大田ベース' => '大田ベース', '八王子ベース' => '八王子ベース', '日向野営場' => '日向野営場'], null, ['class' => 'form-control custom-select']) !!}
            {!! Form::label('depart', '部署:') !!}
            {!! Form::select('depart', ['' => '', '施設・配給' => '施設・配給','プログラム' => 'プログラム','安全・救護' => '安全・救護','総務' => '総務'], null, ['class' => 'form-control custom-select']) !!}
            {!! Form::submit('抽出', ['class'=>'uk-button-primary']) !!}
            {!! Form::close() !!}
        </form>
        <div class="card">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="uk-table uk-table-hover uk-table-striped uk-table-small" id="volstaffs-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>キャンプ場</th>
                                <th>部署</th>
                                <th>地区</th>
                                <th>氏名</th>
                                @for ($i = 3; $i < 12; $i++)
                                    <th>{{ $i }}日</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($volstaffs as $volstaff)
                                <tr>
                                    <td>{{ $volstaff->user_id }}</td>
                                    <td>{{ $volstaff->camp_area }}</td>
                                    <td>{{ $volstaff->job_department }}</td>
                                    <td>{{ $volstaff->org_district }}</td>
                                    <td><a
                                            href="{{ route('vol_staffs.show', [$volstaff->id]) }}">{{ $volstaff->user->name }}</a>
                                    </td>
                                    {{-- join_daysでループを回す --}}
                                    @for ($j = 3; $j < 12; $j++)
                                        @if (strpos($volstaff->join_days, $j . '日'))
                                            <td>〇</td>
                                        @else
                                            <td></td>
                                        @endif
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
