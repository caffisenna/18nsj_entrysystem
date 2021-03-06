<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#scouts-table thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#scouts-table thead');

        var table = $('#scouts-table').DataTable({
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
<h3>????????????</h3>
<div class="table-responsive">
    <table class="table uk-table uk-table-striped uk-table-hover uk-table-small" id="members-table">
        <thead>
            <tr>
                <th>??????</th>
                <th>????????????</th>
                <th>??????</th>
                <th>??????</th>
                <th>?????????</th>
                <th>??????</th>
                <th>?????????</th>
                <th>??????</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                @if ($member->role == '??????' || $member->role == '??????'|| $member->role == '?????????')
                    <tr>
                        <td>{{ $member->role }}</td>
                        <td>{{ $member->how_to_join }}</td>
                        <td><a href="{{ route('troop_members.show', [$member->id]) }}">{{ $member->name }}</a></td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->org_dan_name }}{{ $member->org_dan_number }}??? @unless($member->org_group == "???"){{ $member->org_group }}???@endunless
                        </td>
                        <td>{{ $member->org_role }}</td>
                        <td>{{ $member->training_record }}</td>
                        <td width="120">
                            {!! Form::open(['route' => ['troop_members.destroy', $member->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('troop_members.edit', [$member->id]) }}" class='btn btn-default btn-xs'>
                                    <span uk-icon="file-edit"></span>
                                </a>
                                {!! Form::button('<span uk-icon="trash"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('????????????????????????????')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<h3>??????????????????</h3>
<div class="table-responsive">
    <table class="table uk-table uk-table-striped uk-table-hover uk-table-small" id="members-table">
        <thead>
            <tr>
                <th>??????</th>
                <th>??????</th>
                <th>??????</th>
                <th>??????</th>
                <th>?????????</th>
                <th>???</th>
                <th>??????</th>
                <th>??????</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                @if ($member->role == '??????' || $member->role == '?????????')
                    <tr>
                        <td>{{ $member->role }}</td>
                        <td><a href="{{ route('troop_members.show', [$member->id]) }}">{{ $member->name }}</a></td>
                        <td>{{ $member->grade }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->org_dan_name }}{{ $member->org_dan_number }}??? {{ $member->org_group }}???
                        </td>
                        <td>{{ $member->org_patrol }}</td>
                        <td>{{ $member->org_role }}</td>
                        <td width="120">
                            {!! Form::open(['route' => ['troop_members.destroy', $member->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('troop_members.edit', [$member->id]) }}" class='btn btn-default btn-xs'>
                                    <span uk-icon="file-edit"></span>
                                </a>
                                {!! Form::button('<span uk-icon="trash"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('????????????????????????????')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<h3>????????????</h3>
<div class="table-responsive">
    <table class="table uk-table uk-table-striped uk-table-hover uk-table-small" id="scouts-table">
        <thead>
            <tr>
                <th>no</th>
                <th>???</th>
                <th>?????????</th>
                <th>??????</th>
                <th>??????</th>
                <th>??????</th>
                <th>?????????</th>
                <th>????????????</th>
                <th>??????</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                @if ($member->role == '????????????')
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $member->patrol_code }}</td>
                        <td>@if ($member->patrol_role != '??????'){{ $member->patrol_role }}@endif</td>
                        <td><a href="{{ route('troop_members.show', [$member->id]) }}">{{ $member->name }}</a></td>
                        <td>{{ $member->grade }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->org_dan_name }}{{ $member->org_dan_number }}??? {{ $member->org_group }}???</td>
                        <td>{{ $member->org_patrol }}</td>
                        <td>
                            {!! Form::open(['route' => ['troop_members.destroy', $member->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('troop_members.edit', [$member->id]) }}" class='btn btn-default btn-xs'>
                                    <span uk-icon="file-edit"></span>
                                </a>
                                {!! Form::button('<span uk-icon="trash"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('????????????????????????????')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#scouts-table').DataTable();
    });
</script>
