<div class="form-group col-sm-6">
    {!! Form::label('file', '健康調査票:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::hidden('member_id', $member->id) !!}
            {!! Form::file('file', ['class' => 'custom-file-input']) !!}
            {!! Form::label('file', '健康調査票を選択', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
    @error('file')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>
