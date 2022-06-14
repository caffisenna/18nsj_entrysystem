@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ url('/admin/gen_uuid?gen=true') }}">
                        UUID生成
                    </a>
                    <h1>UUID未作成(派遣隊メンバー)</h1>
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
                    <table class="table uk-table uk-table-striped uk-table-hover uk-table-small" id="members-table">
                        <thead>
                            <tr>
                                <th>氏名</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection
