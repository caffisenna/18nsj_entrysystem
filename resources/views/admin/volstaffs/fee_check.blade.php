@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>スタッフ入金チェック</h1>
                </div>
                <div class="col-sm-6">
                    {{-- <a class="btn btn-primary float-right" href="{{ route('vol_staffs.create') }}">
                        Add New
                    </a> --}}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
                <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        // Setup - add a text input to each footer cell
                        $('#volstaffs-table thead tr')
                            .clone(true)
                            .addClass('filters')
                            .appendTo('#volstaffs-table thead');

                        var table = $('#volstaffs-table').DataTable({
                            orderCellsTop: true,
                            fixedHeader: true,
                            initComplete: function() {
                                var api = this.api();

                                // For each column
                                api
                                    .columns()
                                    .eq(0)
                                    .each(function(colIdx) {
                                        // Set the header cell to contain the input element
                                        var cell = $('.filters th').eq(
                                            $(api.column(colIdx).header()).index()
                                        );
                                        var title = $(cell).text();
                                        $(cell).html('<input type="text" placeholder="' + title +
                                            '" style="width:60px" />');

                                        // On every keypress in this input
                                        $(
                                                'input',
                                                $('.filters th').eq($(api.column(colIdx).header()).index())
                                            )
                                            .off('keyup change')
                                            .on('keyup change', function(e) {
                                                e.stopPropagation();

                                                // Get the search value
                                                $(this).attr('title', $(this).val());
                                                var regexr =
                                                    '({search})'; //$(this).parents('th').find('select').val();

                                                var cursorPosition = this.selectionStart;
                                                // Search the column for that value
                                                api
                                                    .column(colIdx)
                                                    .search(
                                                        this.value != '' ?
                                                        regexr.replace('{search}', '(((' + this.value +
                                                            ')))') :
                                                        '',
                                                        this.value != '',
                                                        this.value == ''
                                                    )
                                                    .draw();

                                                $(this)
                                                    .focus()[0]
                                                    .setSelectionRange(cursorPosition, cursorPosition);
                                            });
                                    });
                            },
                        });
                    });
                </script>
                <div class="table-responsive">
                    <table class="uk-table uk-table-hover uk-table-striped" id="volstaffs-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>キャンプ場</th>
                                <th>部署</th>
                                <th>地区</th>
                                <th>氏名</th>
                                <th>参加期間</th>
                                <th>大集会</th>
                                <th>参加費</th>
                                <th>確認</th>
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
                                    @if ($volstaff->how_to_join == '全期間')
                                        <td>{{ $volstaff->how_to_join }}</td>
                                    @elseif(isset($volstaff->how_to_join))
                                        <td>{{ substr_count($volstaff->join_days, '月') + 1 }}日間</td>
                                    @else
                                        <td></td>
                                    @endif

                                    <td>{{ $volstaff->event_0807 }}</td>
                                    @if (isset($volstaff->how_to_join))
                                        <td>{{ number_format($volstaff->total_fee) }}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>
                                        <div class='btn-group'>
                                            @if (empty($volstaff->fee_checked_at))
                                                <a href="{{ url('/admin/fee_check?id=') . $volstaff->id }}"
                                                    class="uk-button uk-button-danger uk-button-small"
                                                    onclick="return confirm('入金OK?')">未収</a>
                                            @else
                                                {{ $volstaff->fee_checked_at }}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#volstaffs-table').DataTable();
                    });
                </script>


                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
