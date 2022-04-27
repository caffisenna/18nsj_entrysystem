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
                <th>地区</th>
                <th>氏名</th>
                <th>参加期間</th>
                <th>希望</th>
                <th>メモ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($volstaffs as $volstaff)
                <tr>
                    <td>{{ $volstaff->user_id }}</td>
                    <td>{{ $volstaff->org_district }}</td>
                    <td><a href="{{ route('vol_staffs.show', [$volstaff->id]) }}">{{ $volstaff->user->name }}</a>
                    </td>
                    <td>{{ $volstaff->how_to_join }}</td>
                    <td>
                        @if (isset($volstaff->choice1_camp_area))
                            (1)
                            {{ $volstaff->choice1_camp_area }} / {{ $volstaff->choice1_job_department }}<br>
                        @endif
                        @if (isset($volstaff->choice2_camp_area))
                            (2){{ $volstaff->choice2_camp_area }} / {{ $volstaff->choice2_job_department }}<br>
                        @endif
                        @if (isset($volstaff->choice3_camp_area))
                            (3){{ $volstaff->choice3_camp_area }} / {{ $volstaff->choice3_job_department }}
                        @endif
                    </td>
                    <td width="120">{{ $volstaff->memo }}</td>
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
