@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ユーザー一覧</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
                <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        // Setup - add a text input to each footer cell
                        $('#users-table thead tr')
                            .clone(true)
                            .addClass('filters')
                            .appendTo('#users-table thead');

                        var table = $('#users-table').DataTable({
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
                    <table class="table uk-table uk-table-striped uk-table-hover uk-table-small" id="users-table">
                        <thead>
                            <tr>
                                <th>氏名</th>
                                <th>email</th>
                                <th>スタッフ登録</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @if(!$user->is_admin && !$user->is_troopstaff)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (empty($user->volstaff))
                                            <span class="uk-text-danger">未登録</span>
                                        @else
                                            <span class="uk-text-success">登録済み</span
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#users-table').DataTable();
                    });
                </script>


            </div>

        </div>
    </div>
@endsection
