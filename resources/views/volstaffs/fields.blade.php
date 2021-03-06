<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    各部の業務内容は<a
        href="https://18nsj.tokyo/%e5%90%84%e9%83%a8%e4%bc%9a%e3%81%ae%e6%a5%ad%e5%8b%99%e5%86%85%e5%ae%b9%e3%81%ab%e3%81%a4%e3%81%84%e3%81%a6/">各部会の業務内容について</a>を参照してください。
    <h3 class="uk-card-title">基本情報</h3>
    <!-- NDA Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nda', '秘匿条項への同意:スタッフの申込を行うことにより、以下の秘匿条項に同意したことになります。') !!}
        <ul class="uk-text-danger">
            <li>善良なる奉仕スタッフとしての注意義務をもって厳重に情報を管理すること</li>
            <li>立場上知り得た情報(ファイル等を含む)を本業務以外の目的で情報を使用しないこと(スタッフ外への口外、提供を禁じます)</li>
        </ul>
    </div>


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
        {!! Form::text('bs_id', null, ['class' => 'form-control', 'maxlength' => '10']) !!}
        @error('bs_id')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Furigana Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('furigana', 'ふりがな:') !!}
        {!! Form::text('furigana', null, ['class' => 'form-control', 'placeholder' => 'ひらがな or カタカナ']) !!}
        @error('furigana')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
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
        @if (isset($volstaff->birthday))
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
        {!! Form::select('org_district', ['' => '', '大都心' => '大都心', 'さくら' => 'さくら', '城東' => '城東', '山手' => '山手', 'つばさ' => 'つばさ', '世田谷' => '世田谷', 'あすなろ' => 'あすなろ', '城北' => '城北', '練馬' => '練馬', '多摩西' => '多摩西', '新多磨' => '新多磨', '南武蔵野' => '南武蔵野', '町田' => '町田', '北多摩' => '北多摩'], null, ['class' => 'form-control custom-select']) !!}
        @error('org_district')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Org District Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_dan_name', '団名:') !!}
        {!! Form::text('org_dan_name', null, ['class' => 'form-control', 'placeholder' => '(例)渋谷']) !!}
        @error('org_dan_name')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Org Dan Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('org_dan_number', '団番号:') !!}
        {!! Form::text('org_dan_number', null, ['class' => 'form-control', 'maxlength' => '2', 'placeholder' => '(例)14']) !!}
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
        {!! Form::label('how_to_join', '参加日程:') !!}<br>
        {!! Form::select('how_to_join', ['' => '', '全期間' => '全期間', '部分参加' => '部分参加'], null, ['class' => 'form-control custom-select']) !!}
        @error('how_to_join')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
        <h4>参加日程をチェックしてください(部分参加の場合)</h4>
        @if (!empty($volstaff->join_days))
            <label><input type="checkbox" name="join_days[]" value="8月3日"
                    {{ preg_match('/8月3日/', $volstaff->join_days) ? 'checked="checked"' : '' }}>
                8月3日(水)(事前準備)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月4日"
                    {{ preg_match('/8月4日/', $volstaff->join_days) ? 'checked="checked"' : '' }}>
                8月4日(木)(事前準備)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月5日"
                    {{ preg_match('/8月5日/', $volstaff->join_days) ? 'checked="checked"' : '' }}> 8月5日(金)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月6日"
                    {{ preg_match('/8月6日/', $volstaff->join_days) ? 'checked="checked"' : '' }}> 8月6日(土)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月7日"
                    {{ preg_match('/8月7日/', $volstaff->join_days) ? 'checked="checked"' : '' }}> 8月7日(日)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月8日"
                    {{ preg_match('/8月8日/', $volstaff->join_days) ? 'checked="checked"' : '' }}> 8月8日(月)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月9日"
                    {{ preg_match('/8月9日/', $volstaff->join_days) ? 'checked="checked"' : '' }}> 8月9日(火)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月10日"
                    {{ preg_match('/8月10日/', $volstaff->join_days) ? 'checked="checked"' : '' }}>
                8月10日(水)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月11日"
                    {{ preg_match('/8月11日/', $volstaff->join_days) ? 'checked="checked"' : '' }}>
                8月11日(木)(後片付け)</label><br>
        @else
            <label><input type="checkbox" name="join_days[]" value="8月3日"> 8月3日(水)(事前準備)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月4日"> 8月4日(木)(事前準備)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月5日"> 8月5日(金)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月6日"> 8月6日(土)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月7日"> 8月7日(日)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月8日"> 8月8日(月)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月9日"> 8月9日(火)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月10日"> 8月10日(水)</label><br>
            <label><input type="checkbox" name="join_days[]" value="8月11日"> 8月11日(木)(後片付け)</label><br>
        @endif
        @error('join_days')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <h3>奉仕部署が決まっている方</h3>
    <!-- Camp Area Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('camp_area', 'キャンプ場(実行委員会で決定している方):') !!}
        {!! Form::label('camp_area', '日向野営場の募集は終了しました') !!}
        @if (isset($volstaff))
            {!! Form::select('camp_area', ['' => '', '大田ベース' => '大田ベース', '八王子ベース' => '八王子ベース'], null, ['class' => 'form-control custom-select']) !!}
        @else
            {!! Form::select('camp_area', ['' => '', '大田ベース' => '大田ベース', '八王子ベース' => '八王子ベース'], null, ['class' => 'form-control custom-select']) !!}
        @endif
        @error('camp_area')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Job Department Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('job_department', '奉仕部署(実行委員会で決定している方):') !!}
        {!! Form::select('job_department', ['' => '', 'プログラム' => 'プログラム', '安全・救護' => '安全・救護', '施設・配給' => '施設・配給', '総務' => '総務'], null, ['class' => 'form-control custom-select']) !!}
        @error('job_department')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- 大集会参加希望 Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('event_0807', '大集会の参加希望(8/7 大田区立総合体育館):') !!}
        {!! Form::select('event_0807', ['' => '', 'あり' => 'あり', 'なし' => 'なし'], null, ['class' => 'form-control custom-select']) !!}
        @error('event_0807')
            <div class="error text-danger">{{ $message }}</div>
        @enderror
    </div>

    <h3>奉仕部署がまだ決まっていない方</h3>
    <p class="uk-text-primary">第1〜第3希望を選択してください。実行委員会で決定後お知らせ致します。(5月中旬予定)</p>
    <h4>第1希望</h4>
    <!-- Camp Area Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('choice1_camp_area', 'キャンプ場(第1希望):') !!}
        {!! Form::label('choice1_camp_area', '日向野営場の募集は終了しました') !!}
        @if (isset($volstaff))
            {!! Form::select('choice1_camp_area', ['' => '', '大田ベース' => '大田ベース', '八王子ベース' => '八王子ベース'], null, ['class' => 'form-control custom-select']) !!}
        @else
            {!! Form::select('choice1_camp_area', ['' => '', '大田ベース' => '大田ベース', '八王子ベース' => '八王子ベース'], null, ['class' => 'form-control custom-select']) !!}
        @endif
    </div>

    <!-- Job Department Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('choice1_job_department', '奉仕部署(第1希望):') !!}
        {!! Form::select('choice1_job_department', ['' => '', 'プログラム' => 'プログラム', '安全・救護' => '安全・救護', '施設・配給' => '施設・配給', '総務' => '総務'], null, ['class' => 'form-control custom-select']) !!}
    </div>

    <h4>第2希望</h4>
    <!-- Camp Area Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('choice2_camp_area', 'キャンプ場(第2希望):') !!}
        {!! Form::label('choice2_camp_area', '日向野営場の募集は終了しました') !!}
        @if (isset($volstaff))
            {!! Form::select('choice2_camp_area', ['' => '', '大田ベース' => '大田ベース', '八王子ベース' => '八王子ベース'], null, ['class' => 'form-control custom-select']) !!}
        @else
            {!! Form::select('choice2_camp_area', ['' => '', '大田ベース' => '大田ベース', '八王子ベース' => '八王子ベース'], null, ['class' => 'form-control custom-select']) !!}
        @endif
    </div>

    <!-- Job Department Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('choice2_job_department', '奉仕部署(第2希望):') !!}
        {!! Form::select('choice2_job_department', ['' => '', 'プログラム' => 'プログラム', '安全・救護' => '安全・救護', '施設・配給' => '施設・配給', '総務' => '総務'], null, ['class' => 'form-control custom-select']) !!}
    </div>

    <h4>第3希望</h4>
    <!-- Camp Area Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('choice3_camp_area', 'キャンプ場(第3希望):') !!}
        {!! Form::label('choice3_camp_area', '日向野営場の募集は終了しました') !!}
        @if (isset($volstaff))
            {!! Form::select('choice3_camp_area', ['' => '', '大田ベース' => '大田ベース', '八王子ベース' => '八王子ベース'], null, ['class' => 'form-control custom-select']) !!}
        @else
            {!! Form::select('choice3_camp_area', ['' => '', '大田ベース' => '大田ベース', '八王子ベース' => '八王子ベース'], null, ['class' => 'form-control custom-select']) !!}
        @endif
    </div>

    <!-- Job Department Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('choice3_job_department', '奉仕部署(第3希望):') !!}
        {!! Form::select('choice3_job_department', ['' => '', 'プログラム' => 'プログラム', '安全・救護' => '安全・救護', '施設・配給' => '施設・配給', '総務' => '総務'], null, ['class' => 'form-control custom-select']) !!}
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">車両情報</h3>
    <p class="uk-text-warning uk-text-small">業務車両など登録車両の参考情報として任意記入してください</p>
    <!-- Car Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('car_number', 'ナンバー:') !!}
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
    <p class="uk-text-warning uk-text-small">実行委員会に伝えておきたいことなどを確認入力してください。(チームで参加する、等)</p>
    <!-- Memo Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('memo', '特記事項:') !!}
        {!! Form::textarea('memo', null, ['class' => 'form-control']) !!}
    </div>
</div>
