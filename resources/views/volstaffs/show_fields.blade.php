<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">スタッフ登録情報</h3>
    <table class="uk-table uk-table-striped">
        <tr>
            <th>氏名</th>
            <td>{{ Auth::user()->name }} ({{ $volstaff->furigana }})</td>
        </tr>
        <tr>
            <th>所属団</th>
            <td>{{ $volstaff->org_district }}地区 {{ $volstaff->org_dan_name }}{{ $volstaff->org_dan_number }}団 @unless ($volstaff->org_group == "団"){{ $volstaff->org_group }}隊@endunless {{ $volstaff->org_role }}</td>
        </tr>
        <tr>
            <th>地区役務</th>
            <td>{{ $volstaff->district_role }}</td>
        </tr>
        <tr>
            <th>ベース名</th>
            <td>{{ $volstaff->camp_area }}</td>
        </tr>
        <tr>
            <th>奉仕部署</th>
            <td>{{ $volstaff->job_department }}</td>
        </tr>
    </table>

    @unless($volstaff->job_department)
        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
            <h3 class="uk-card-title">希望部署(未定の場合)</h3>
            <table class="uk-table uk-table-striped">
                <tr>
                    <th>第1希望</th>
                    <td>{{ $volstaff->choice1_camp_area }} {{ $volstaff->choice1_job_department }}</td>
                </tr>
                <tr>
                    <th>第2希望</th>
                    <td>{{ $volstaff->choice2_camp_area }} {{ $volstaff->choice2_job_department }}</td>
                </tr>
                <tr>
                    <th>第3希望</th>
                    <td>{{ $volstaff->choice3_camp_area }} {{ $volstaff->choice3_job_department }}</td>
                </tr>
            </table>
        </div>
    @endunless

    <!-- How To Join Field -->
    <table class="uk-table uk-table-striped">
        <tr>
            <th>参加日</th>
            <td>
                @if ($volstaff->how_to_join != '全期間')
                    合計: {{ substr_count($volstaff->join_days, ',') + 1 }}日間 / 内訳: {{ $volstaff->join_days }}
                @else
                    {{ $volstaff->how_to_join }}
                @endif
            </td>
        </tr>
        <tr>
            <th>大集会参加希望</th>
            <td>{{ $volstaff->event_0807 }}</td>
        </tr>
        <tr>
            <th>登録番号</th>
            <td>{{ $volstaff->bs_id }}</td>
        </tr>
        <tr>
            <th>性別</th>
            <td>{{ $volstaff->gender }}</td>
        </tr>
        <tr>
            <th>生年月日</th>
            <td>{{ $volstaff->birthday->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <th>自宅電話</th>
            <td>{{ $volstaff->phone }}</td>
        </tr>
        <tr>
            <th>ケータイ</th>
            <td>{{ $volstaff->cell_phone }}</td>
        </tr>
        <tr>
            <th>研修歴</th>
            <td>{{ $volstaff->training_record }}</td>
        </tr>
        <tr>
            <th>車両情報</th>
            <td>{{ $volstaff->car_number }}<br>{{ $volstaff->car_type }}</td>
        </tr>
        {{-- <tr>
            <th>SFH</th>
            <td>{{ $volstaff->sfh }}</td>
        </tr> --}}
        {{-- <tr>
            <th>健康調査</th>
            <td>{{ $volstaff->health_check }}</td>
        </tr> --}}
        <tr>
            <th>特記事項</th>
            <td>{{ $volstaff->memo }}</td>
        </tr>
    </table>
</div>

<p class="uk-text-danger uk-text-large">参加費振込は別途ご案内しますのでお待ちください。</p>
<div class="uk-card uk-card-primary uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">参加費見積</h3>
    <ul>
        <li>参加区分: {{ $volstaff->how_to_join }}</li>
        <li>大集会参加希望: {{ $volstaff->event_0807 }}</li>
    </ul>
    <h4>内訳明細</h4>
    <table class="uk-table uk-table-small uk-table-justify uk-table-divider">
        <tr>
            <th>参加費</th>
            @if ($volstaff->how_to_join == '全期間')
                <td>27,000円</td>
            @else
                <td>{{ number_format(4000 * (substr_count($volstaff->join_days, ',') + 1)) }}円
                    (4,000円 x {{ substr_count($volstaff->join_days, ',') + 1 }}日間)</td>
            @endif
        </tr>
        <tr>
            <th>日本連盟分担金</th>
            <td>2,000円</td>
        </tr>
        <tr>
            <th>東京連盟分担金</th>
            <td>3,000円</td>
        </tr>

        @if ($volstaff->event_0807 == 'あり')
            <tr>
                <th>大集会参加費</th>
                <td>2,000円</td>
            </tr>
        @endif
        <tr>
            <th>
                <h4>合計</h4>
            </th>
            <td>
                <h4>{{ number_format($volstaff->total_fee) }} 円</h4>
            </td>
        </tr>
        <tr>
            <td>振込口座</td>
            <td>GMOあおぞらネット銀行 法人営業部 普通 1331429<br>
                シヤ）ニホンボーイスカウトトウキヨウレンメイ</td>
        </tr>
        <tr>
            <td>事務局確認</td>
            <td></td>
        </tr>
    </table>

</div>

{{--
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
</div> --}}
