<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">地区</h3>
    <!-- District Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('district_name', '地区名:') !!}
        {!! Form::text('district_name', null, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">地区委員長</h3>
    <!-- Chairman Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('chairman_name', '氏名:') !!}
        {!! Form::text('chairman_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Chairman Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('chairman_phone', 'ケータイ:') !!}
        {!! Form::text('chairman_phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Chairman Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('chairman_email', 'Email:') !!}
        {!! Form::text('chairman_email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">地区コミッショナー</h3>
    <!-- Commi Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('commi_name', '氏名:') !!}
        {!! Form::text('commi_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Commi Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('commi_phone', 'ケータイ:') !!}
        {!! Form::text('commi_phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Commi Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('commi_email', 'Email:') !!}
        {!! Form::text('commi_email', null, ['class' => 'form-control']) !!}
    </div>
</div>
