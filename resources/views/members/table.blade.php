<h3>隊指導者</h3>
<div class="table-responsive">
    <table class="table uk-table uk-table-striped uk-table-hover uk-table-small" id="members-table">
        <thead>
            <tr>
                <th>役務</th>
                <th>氏名</th>
                <th>性別</th>
                <th>所属団・役務</th>
                <th>研修歴</th>
                <th>SFH</th>
                <th>健康調査</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                @if ($member->role == '隊長' || $member->role == '副長')
                    <tr>
                        <td>{{ $member->role }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->org_dan_name }}{{ $member->org_dan_number }}団 {{ $member->org_group }}隊
                            {{ $member->org_role }}</td>
                        <td>{{ $member->training_record }}</td>
                        <td>{{ $member->sfh }}</td>
                        <td>{{ $member->health_check }}</td>
                        <td width="120">
                            {!! Form::open(['route' => ['members.destroy', $member->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('members.show', [$member->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('members.edit', [$member->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<h3>上班・隊付き</h3>
<div class="table-responsive">
    <table class="table uk-table uk-table-striped uk-table-hover uk-table-small" id="members-table">
        <thead>
            <tr>
                <th>役務</th>
                <th>氏名</th>
                <th>進級</th>
                <th>性別</th>
                <th>所属団</th>
                <th>班</th>
                <th>役務</th>
                <th>SFH</th>
                <th>健康調査</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                @if ($member->role == '上班' || $member->role == '隊付き')
                    <tr>
                        <td>{{ $member->role }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->grade }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->org_dan_name }}{{ $member->org_dan_number }}団 {{ $member->org_group }}隊
                        </td>
                        <td>{{ $member->org_patrol }}</td>
                        <td>{{ $member->org_role }}</td>
                        <td>{{ $member->sfh }}</td>
                        <td>{{ $member->health_check }}</td>
                        <td width="120">
                            {!! Form::open(['route' => ['members.destroy', $member->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('members.show', [$member->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('members.edit', [$member->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<h3>スカウト</h3>
<div class="table-responsive">
    <table class="table uk-table uk-table-striped uk-table-hover uk-table-small" id="members-table">
        <thead>
            <tr>
                <th>役務</th>
                <th>班</th>
                <th>班役務</th>
                <th>氏名</th>
                <th>進級</th>
                <th>性別</th>
                <th>所属団</th>
                <th>原隊の班</th>
                <th>役務</th>
                <th>SFH</th>
                <th>健康調査</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                @if ($member->role == 'スカウト')
                    <tr>
                        <td>{{ $member->role }}</td>
                        <td>{{ $member->patrol_code }}</td>
                        <td>{{ $member->patrol_role }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->grade }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->org_dan_name }}{{ $member->org_dan_number }}団 {{ $member->org_group }}隊
                        </td>
                        <td>{{ $member->org_patrol }}</td>
                        <td>{{ $member->org_role }}</td>
                        <td>{{ $member->sfh }}</td>
                        <td>{{ $member->health_check }}</td>
                        <td width="120">
                            {!! Form::open(['route' => ['members.destroy', $member->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('members.show', [$member->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('members.edit', [$member->id]) }}" class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
