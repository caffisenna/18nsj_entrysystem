<div class="table-responsive">
    <table class="table" id="planUploads-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>役務</th>
                <th>氏名</th>
                <th>修了証</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->role }}</td>
                    <td>{{ $member->name }}</td>
                    @if (isset($member->sfh))
                        <td><a
                                href="{{ url('/') }}/sfh/{{ $member->sfh }}">UP済み</a>
                        </td>
                    @else
                        <td><a href="{{ url('/user/sfh/create?id=').$member->id }}" class="uk-button uk-button-primary"><span uk-icon="cloud-upload"></span>up</a></td>
                    @endif
                    <td width="120">
                        {!! Form::open(['route' => ['sfh.destroy', $member->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {!! Form::button('<span uk-icon="trash"></span>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('本当に削除しますか?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
