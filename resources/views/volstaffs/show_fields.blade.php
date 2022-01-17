<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">基本情報</h3>

    <!-- Name Field -->
    <div class="col-sm-12">
        {!! Form::label('name', '氏名:') !!}
        {{ Auth::user()->name }} ({{ $volstaff->furigana }})
    </div>

    <!-- Camp Area Field -->
    <div class="col-sm-12">
        {!! Form::label('camp_area', 'キャンプ場:') !!}
        {{ $volstaff->camp_area }}
    </div>

    <!-- Job Department Field -->
    <div class="col-sm-12">
        {!! Form::label('job_department', '奉仕部署:') !!}
        {{ $volstaff->job_department }}
    </div>

    <!-- How To Join Field -->
    <div class="col-sm-12">
        {!! Form::label('how_to_join', '参加期間:') !!}
        {{ $volstaff->how_to_join }}
    </div>

    <!-- Bs Id Field -->
    <div class="col-sm-12">
        {!! Form::label('bs_id', '登録番号:') !!}
        {{ $volstaff->bs_id }}
    </div>

    <!-- Gender Field -->
    <div class="col-sm-12">
        {!! Form::label('gender', '性別:') !!}
        {{ $volstaff->gender }}
    </div>

    <!-- Birthday Field -->
    <div class="col-sm-12">
        {!! Form::label('birthday', '生年月日:') !!}
        {{ $volstaff->birthday->format('Y-m-d') }}
    </div>

    <!-- Email Field -->
    <div class="col-sm-12">
        {!! Form::label('email', 'Email:') !!}
        {{ Auth::user()->email }}
    </div>

    <!-- Phone Field -->
    <div class="col-sm-12">
        {!! Form::label('phone', '自宅電話:') !!}
        {{ $volstaff->phone }}
    </div>

    <!-- Cell Phone Field -->
    <div class="col-sm-12">
        {!! Form::label('cell_phone', 'ケータイ:') !!}
        {{ $volstaff->cell_phone }}
    </div>

    <!-- Training Record Field -->
    <div class="col-sm-12">
        {!! Form::label('training_record', '研修歴:') !!}
        {{ $volstaff->training_record }}
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">所属団</h3>
    <!-- Org Dan Name Field -->
    <div class="col-sm-12">
        {!! Form::label('org_dan_name', '所属団:') !!}
        {{ $volstaff->org_district }}地区 {{ $volstaff->org_dan_name }}{{ $volstaff->org_dan_number }}団 {{ $volstaff->org_group }}隊
    </div>

    <!-- Org Role Field -->
    <div class="col-sm-12">
        {!! Form::label('org_role', '役務:') !!}
        {{ $volstaff->org_role }}
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">所属地区</h3>
    <!-- District Role Field -->
    <div class="col-sm-12">
        {!! Form::label('district_role', '役務:') !!}
        {{ $volstaff->org_district }}地区 {{ $volstaff->district_role }}
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">車両情報</h3>
    <!-- Car Number Field -->
    <div class="col-sm-12">
        {!! Form::label('car_number', 'ナンバー:') !!}
        {{ $volstaff->car_number }}
    </div>

    <!-- Car Type Field -->
    <div class="col-sm-12">
        {!! Form::label('car_type', '車種:') !!}
        {{ $volstaff->car_type }}
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">その他</h3>
    <!-- Sfh Field -->
    <div class="col-sm-12">
        {!! Form::label('sfh', 'SFH:') !!}
        {{ $volstaff->sfh }}
    </div>

    <!-- Health Check Field -->
    <div class="col-sm-12">
        {!! Form::label('health_check', '健康調査:') !!}
        {{ $volstaff->health_check }}
    </div>

    <!-- Memo Field -->
    <div class="col-sm-12">
        {!! Form::label('memo', '特記事項:') !!}
        {{ $volstaff->memo }}
    </div>
</div>


<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'ユーザーID:') !!}
    {{ $volstaff->user_id }}
</div>
<!-- Uuid Field -->
<div class="col-sm-12">
    {!! Form::label('uuid', 'uuid:') !!}
    {{ $volstaff->uuid }}
</div>
<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    {{ $volstaff->created_at }}
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {{ $volstaff->updated_at }}
</div>
