<!-- User Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', '参加隊役務:') !!}
    {!! Form::select('role', ['' => '', '隊長' => '隊長', '副長' => '副長', '副長補' => '副長補', 'インストラクター' => 'インストラクター', '介助者' => '介助者', '上班' => '上班', '隊付き' => '隊付き', 'スカウト' => 'スカウト'], null, ['class' => 'form-control custom-select']) !!}
</div>
@error('role')
    <div class="error text-danger">{{ $message }}</div>
@enderror

<!-- How_To_Join Field -->
<div class="form-group col-sm-6">
    {!! Form::label('how_to_join', '参加形態(指導者のみ入力):') !!}
    {!! Form::select('how_to_join', ['' => '', '全期間' => '全期間', '前半' => '前半', '後半' => '後半'], null, ['class' => 'form-control custom-select']) !!}
    @error('how_to_join')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Patrol Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patrol_code', '班コード:') !!}
    {{-- {!! Form::text('patrol_code', null, ['class' => 'form-control']) !!} --}}
    <select name="patrol_code" id="" class="form-control">
        <option value=""></option>
        <option value=1 @if ($member->patrol_code == 1) selected @endif> {{ $member->p1 }} </option>
        <option value=2 @if ($member->patrol_code == 2) selected @endif> {{ $member->p2 }} </option>
        <option value=3 @if ($member->patrol_code == 3) selected @endif> {{ $member->p3 }} </option>
        <option value=4 @if ($member->patrol_code == 4) selected @endif> {{ $member->p4 }} </option>
        <option value=5 @if ($member->patrol_code == 5) selected @endif> {{ $member->p5 }} </option>
        <option value=6 @if ($member->patrol_code == 6) selected @endif> {{ $member->p6 }} </option>
    </select>

</div>

<!-- Patrol Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patrol_role', '班役務:') !!}
    {!! Form::select('patrol_role', ['' => '', '班長' => '班長', '次長' => '次長', '班員' => '班員', '上班' => '上班', '隊付き' => '隊付き', '指導者' => '指導者'], null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Bs Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bs_id', 'Bs Id:') !!}
    {!! Form::text('bs_id', null, ['class' => 'form-control']) !!}
    @error('bs_id')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', '氏名:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @error('name')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Furigana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('furigana', 'ふりがな:') !!}
    {!! Form::text('furigana', null, ['class' => 'form-control']) !!}
    @error('furigana')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Grade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grade', '進級:') !!}
    {!! Form::select('grade', ['' => '', '初級' => '初級', '2級' => '2級', '1級' => '1級', '菊' => '菊', '隼' => '隼', '富士' => '富士'], null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', '性別:') !!}
    {!! Form::select('gender', ['' => '', '男' => '男', '女' => '女'], null, ['class' => 'form-control custom-select']) !!}
    @error('gender')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('birthday', '生年月日:') !!}
    {!! Form::text('birthday', null, ['class' => 'form-control']) !!}
    @error('birthday')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', '自宅電話:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Cell Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cell_phone', 'ケータイ電話:') !!}
    {!! Form::text('cell_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Training Record Field -->
<div class="form-group col-sm-6">
    {!! Form::label('training_record', '研修歴:') !!}
    {!! Form::select('training_record', ['' => '', 'BS講習会' => 'BS講習会', 'BVS研修所' => 'BVS研修所', 'BVS実修所' => 'BVS実修所', 'CS研修所' => 'CS研修所', 'CS実修所' => 'CS実修所', 'BS研修所' => 'BS研修所', 'BS実修所' => 'BS実修所', 'VS研修所' => 'VS研修所', 'VS実修所' => 'VS実修所', 'RS研修所' => 'RS研修所', '団研修所' => '団研修所', '団実修所' => '団実修所', '他' => '他'], null, ['class' => 'form-control custom-select']) !!}
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">宗教</h3>
    <!-- Religion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('religion', '宗教:') !!}
        {!! Form::select('religion', ['' => '', '神道' => '神道', '仏教' => '仏教', 'キリスト教' => 'キリスト教', '金光教' => '金光教', '世界救世教' => '世界救世教', '天理教' => '天理教', 'その他' => 'その他'], null, ['class' => 'form-control custom-select']) !!}
    </div>

    <!-- Religion Sect Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('religion_sect', '宗派:') !!}
        {!! Form::text('religion_sect', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">所属団情報</h3>
    <!-- Org Dan Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_dan_name', '団名:') !!}
        {!! Form::text('org_dan_name', null, ['class' => 'form-control']) !!}
        @error('org_dan_name')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Org Dan Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_dan_number', '団番号:') !!}
        {!! Form::text('org_dan_number', null, ['class' => 'form-control']) !!}
        @error('org_dan_number')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Org Group Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_group', '隊:') !!}
        {!! Form::select('org_group', ['' => '', 'ビーバー' => 'ビーバー', 'カブ' => 'カブ', 'ボーイ' => 'ボーイ', 'ベンチャー' => 'ベンチャー', 'ローバー' => 'ローバー', '団' => '団'], null, ['class' => 'form-control custom-select']) !!}
        @error('org_group')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Org Patrol Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_patrol', '班:') !!}
        {!! Form::text('org_patrol', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Org Role Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_role', '役務:') !!}
        {!! Form::select('org_role', ['' => '', '隊長' => '隊長', '副長' => '副長', '副長補' => '副長補', 'インストラクター' => 'インストラクター', '補助者' => '補助者', '団委員長' => '団委員長', '副団委員長' => '副団委員長', '団委員' => '団委員', 'スカウト' => 'スカウト', 'その他' => 'その他'], null, ['class' => 'form-control custom-select']) !!}
        @error('org_role')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
