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
                        $(cell).html('<input type="text" placeholder="' + title + '" style="width:60px" />');

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
                <th>氏名</th>
                <th>参加期間</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($volstaffs as $volstaff)
                <tr>
                    <td>{{ $volstaff->user_id }}</td>
                    <td>{{ $volstaff->camp_area }}</td>
                    <td>{{ $volstaff->job_department }}</td>
                    <td><a href="{{ route('vol_staffs.show', [$volstaff->id]) }}">{{ $volstaff->user->name }}</a>
                    </td>
                    <td>{{ $volstaff->how_to_join }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['vol_staffs.destroy', $volstaff->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('vol_staffs.edit', [$volstaff->id]) }}" class='btn btn-default btn-xs'>
                                <span uk-icon="file-edit"></span>
                            </a>
                            {!! Form::button('<span uk-icon="trash"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
                        </div>
                        {!! Form::close() !!}
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
