<div class="table-responsive">
    <table class="table" id="volstaffs-table">
        <thead>
            <tr>
                <th>User Id</th>
                <th>Bs Id</th>
                <th>Name</th>
                <th>Furigana</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Cell Phone</th>
                <th>Org Dan Name</th>
                <th>Org Dan Number</th>
                <th>Org Group</th>
                <th>Org Role</th>
                <th>District Role</th>
                <th>Training Record</th>
                <th>Uuid</th>
                <th>Sfh</th>
                <th>Health Check</th>
                <th>Car Number</th>
                <th>Car Type</th>
                <th>How To Join</th>
                <th>Camp Area</th>
                <th>Job Department</th>
                <th>Memo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($volstaffs as $volstaff)
                <tr>
                    <td>{{ $volstaff->user_id }}</td>
                    <td>{{ $volstaff->bs_id }}</td>
                    <td>{{ $volstaff->name }}</td>
                    <td>{{ $volstaff->furigana }}</td>
                    <td>{{ $volstaff->gender }}</td>
                    <td>{{ $volstaff->birthday }}</td>
                    <td>{{ $volstaff->email }}</td>
                    <td>{{ $volstaff->phone }}</td>
                    <td>{{ $volstaff->cell_phone }}</td>
                    <td>{{ $volstaff->org_dan_name }}</td>
                    <td>{{ $volstaff->org_dan_number }}</td>
                    <td>{{ $volstaff->org_group }}</td>
                    <td>{{ $volstaff->org_role }}</td>
                    <td>{{ $volstaff->district_role }}</td>
                    <td>{{ $volstaff->training_record }}</td>
                    <td>{{ $volstaff->uuid }}</td>
                    <td>{{ $volstaff->sfh }}</td>
                    <td>{{ $volstaff->health_check }}</td>
                    <td>{{ $volstaff->car_number }}</td>
                    <td>{{ $volstaff->car_type }}</td>
                    <td>{{ $volstaff->how_to_join }}</td>
                    <td>{{ $volstaff->camp_area }}</td>
                    <td>{{ $volstaff->job_department }}</td>
                    <td>{{ $volstaff->memo }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['volstaffs.destroy', $volstaff->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('volstaffs.show', [$volstaff->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('volstaffs.edit', [$volstaff->id]) }}" class='btn btn-default btn-xs'>
                                <span uk-icon="file-edit"></span>
                            </a>
                            {!! Form::button('<span uk-icon="trash"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
