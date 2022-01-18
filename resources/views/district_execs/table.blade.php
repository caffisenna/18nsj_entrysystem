<div class="table-responsive">
    <table class="table" id="districtExecs-table">
        <thead>
            <tr>
                <th>地区名</th>
                <th>地区委員長</th>
                <th>地区コミ</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($districtExecs as $districtExec)
                <tr>
                    <td>{{ $districtExec->district_name }}</td>
                    <td>{{ $districtExec->chairman_name }}</td>
                    <td>{{ $districtExec->commi_name }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['districtExecs.destroy', $districtExec->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('districtExecs.show', [$districtExec->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('districtExecs.edit', [$districtExec->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
