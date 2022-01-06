<div class="table-responsive">
    <table class="table" id="troopInfos-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Pref</th>
        <th>District</th>
        <th>Troop Number</th>
        <th>Person In Charge Name</th>
        <th>Person In Charge Position</th>
        <th>Person In Charge Bsid</th>
        <th>Person In Charge Phone</th>
        <th>Person In Charge Cellphone</th>
        <th>Person In Charge Email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($troopInfos as $troopInfo)
            <tr>
                <td>{{ $troopInfo->user_id }}</td>
            <td>{{ $troopInfo->pref }}</td>
            <td>{{ $troopInfo->district }}</td>
            <td>{{ $troopInfo->troop_number }}</td>
            <td>{{ $troopInfo->person_in_charge_name }}</td>
            <td>{{ $troopInfo->person_in_charge_position }}</td>
            <td>{{ $troopInfo->person_in_charge_bsid }}</td>
            <td>{{ $troopInfo->person_in_charge_phone }}</td>
            <td>{{ $troopInfo->person_in_charge_cellphone }}</td>
            <td>{{ $troopInfo->person_in_charge_email }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['troopInfos.destroy', $troopInfo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('troopInfos.show', [$troopInfo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('troopInfos.edit', [$troopInfo->id]) }}" class='btn btn-default btn-xs'>
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
