<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">基本情報</h3>
    <div class="form-group col-sm-6">
        {!! Form::label('name', '氏名:') !!}
        {{ Auth::user()->name }}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        {{ Auth::user()->email }}
    </div>

    <!-- Bs Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('bs_id', '登録番号:') !!}
        {!! Form::text('bs_id', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Furigana Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('furigana', 'ふりがな:') !!}
        {!! Form::text('furigana', null, ['class' => 'form-control']) !!}
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
        @if(isset($volstaff->birthday))
        <input type="text" name="birthday" value="{{ old('birthday') ?? $volstaff->birthday->format('Y-m-d') }}"
            class="form-control">
        @else
        <input type="text" name="birthday" value="" class="form-control">
        @endif
        @error('birthday')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Training Record Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('training_record', '研修歴:') !!}
        {!! Form::select('training_record', ['' => '', 'BS講習会' => 'BS講習会', 'BVS研修所' => 'BVS研修所', 'BVS実修所' => 'BVS実修所', 'CS研修所' => 'CS研修所', 'CS実修所' => 'CS実修所', 'BS研修所' => 'BS研修所', 'BS実修所' => 'BS実修所', 'VS研修所' => 'VS研修所', 'VS実修所' => 'VS実修所', 'RS研修所' => 'RS研修所', '団研修所' => '団研修所', '団実修所' => '団実修所', '他' => '他'], null, ['class' => 'form-control custom-select']) !!}
        @error('training_record')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('phone', '自宅電話:') !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Cell Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('cell_phone', 'ケータイ:') !!}
        {!! Form::text('cell_phone', null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">所属</h3>
    <!-- Org District Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_district', '所属地区:') !!}
        {!! Form::select('org_district', ['' => '', '大都心' => '大都心',
        'さくら' => 'さくら',
        '城東' => '城東',
        '山手' => '山手',
        'つばさ' => 'つばさ',
        '世田谷' => '世田谷',
        'あすなろ' => 'あすなろ',
        '城北' => '城北',
        '練馬' => '練馬',
        '多摩西' => '多摩西',
        '新多磨' => '新多磨',
        '南武蔵野' => '南武蔵野',
        '町田' => '町田',
        '北多摩' => '北多摩'], null, ['class' => 'form-control custom-select']) !!}
    </div>

    <!-- Org District Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_dan_name', '団名:') !!}
        {!! Form::text('org_dan_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Org Dan Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_dan_number', '団番号:') !!}
        {!! Form::text('org_dan_number', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Org Group Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_group', '隊:') !!}
        {!! Form::select('org_group', ['' => '', 'ビーバー' => 'ビーバー', 'カブ' => 'カブ', 'ボーイ' => 'ボーイ', 'ベンチャー' => 'ベンチャー', 'ローバー' => 'ローバー', '団' => '団'], null, ['class' => 'form-control custom-select']) !!}
        @error('org_group')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Org Role Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_role', '役務:') !!}
        {!! Form::select('org_role', ['' => '', '隊長' => '隊長', '副長' => '副長', '副長補' => '副長補', 'インストラクター' => 'インストラクター', '補助者' => '補助者', '団委員長' => '団委員長', '副団委員長' => '副団委員長', '団委員' => '団委員', 'スカウト' => 'スカウト', 'その他' => 'その他'], null, ['class' => 'form-control custom-select']) !!}
        @error('org_role')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- District Role Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('district_role', '地区役務:') !!}
        {!! Form::text('district_role', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">奉仕情報</h3>
    <!-- How To Join Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('how_to_join', '参加期間:') !!}
        {!! Form::select('how_to_join', ['' => '', '全期間' => '全期間', '前半' => '前半', '後半' => '後半'], null, ['class' => 'form-control custom-select']) !!}
        @error('how_to_join')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Camp Area Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('camp_area', 'キャンプ場:') !!}
        {!! Form::select('camp_area', ['' => '', '日向野営場' => '日向野営場', 'ひよどり山' => 'ひよどり山', '平和島' => '平和島'], null, ['class' => 'form-control custom-select']) !!}
        @error('camp_area')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Job Department Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('job_department', '奉仕部署:') !!}
        {!! Form::select('job_department', ['' => '', 'プログラム' => 'プログラム', '安全・救護' => '安全・救護', '施設・配給' => '施設・配給', '生活' => '生活', '総務' => '総務'], null, ['class' => 'form-control custom-select']) !!}
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">車両情報</h3>
    <!-- Car Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('car_number', 'カーナンバー:') !!}
        {!! Form::text('car_number', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Car Type Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('car_type', '車種:') !!}
        {!! Form::text('car_type', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">特記事項</h3>
    <!-- Memo Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('memo', '特記事項:') !!}
        {!! Form::textarea('memo', null, ['class' => 'form-control']) !!}
    </div>
</div>
