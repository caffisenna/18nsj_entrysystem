<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">所属</h3>

    <!-- Pref Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('pref', '県連盟:') !!}
        {!! Form::text('pref', null, ['class' => 'form-control']) !!}
    </div>

    <!-- District Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('district', '地区:') !!}
        {!! Form::text('district', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Troop Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('troop_number', '隊番号:') !!}
        {!! Form::text('troop_number', null, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">地区責任者情報</h3>

    <!-- Person In Charge Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('person_in_charge_name', '氏名:') !!}
        {!! Form::text('person_in_charge_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Person In Charge Position Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('person_in_charge_position', '役務:') !!}
        {!! Form::text('person_in_charge_position', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Person In Charge Bsid Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('person_in_charge_bsid', '登録番号:') !!}
        {!! Form::text('person_in_charge_bsid', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Person In Charge Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('person_in_charge_phone', '電話番号:') !!}
        {!! Form::text('person_in_charge_phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Person In Charge Cellphone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('person_in_charge_cellphone', 'ケータイ:') !!}
        {!! Form::text('person_in_charge_cellphone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Person In Charge Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('person_in_charge_email', 'Email:') !!}
        {!! Form::text('person_in_charge_email', null, ['class' => 'form-control']) !!}
    </div>

</div>
