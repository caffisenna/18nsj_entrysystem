@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>備考情報</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

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
                                <th>備考</th>
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
                                    <td>{{ $volstaff->memo }}</td>
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
