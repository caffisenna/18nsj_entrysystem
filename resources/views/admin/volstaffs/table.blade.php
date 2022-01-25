<div class="table-responsive">
    <table class="table" id="volstaffs-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>氏名</th>
                <th>所属団</th>
                <th>地区役務</th>
                <th>参加期間</th>
                <th>キャンプ場</th>
                <th>部署</th>
                <th colspan="3">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($volstaffs as $volstaff)
                <tr>
                    <td>{{ $volstaff->user_id }}</td>
                    <td>{{ $volstaff->user->name }}</td>
                    <td>{{ $volstaff->org_district }}地区{{ $volstaff->org_dan_name }}{{ $volstaff->org_dan_number }}{{ $volstaff->org_group }} {{ $volstaff->org_role }}</td>
                    <td>{{ $volstaff->district_role }}</td>
                    <td>{{ $volstaff->how_to_join }}</td>
                    <td>{{ $volstaff->camp_area }}</td>
                    <td>{{ $volstaff->job_department }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['vol_staffs.destroy', $volstaff->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('vol_staffs.show', [$volstaff->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('vol_staffs.edit', [$volstaff->id]) }}" class='btn btn-default btn-xs'>
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
