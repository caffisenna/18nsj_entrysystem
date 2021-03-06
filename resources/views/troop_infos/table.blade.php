<div class="table-responsive">
    <table class="table uk-table-striped uk-table-hover uk-table-small" id="troopInfos-table">
        <tr>
            <th>User Id</th>
            <td>{{ $troopInfo->user_id }}</td>
        </tr>
        <tr>
            <th>所属県連・地区</th>
            <td>{{ $troopInfo->pref }}連盟 {{ $troopInfo->district }}地区</td>
        </tr>
        <tr>
            <th>派遣隊コード</th>
            <td>@if (isset($troopInfo->troop_number)){{ $troopInfo->troop_number }}@else 未定 @endif</td>
        </tr>
    </table>
</div>


<h3>地区責任者情報</h3>
<div class="table-responsive">
    <table class="table uk-table-striped uk-table-hover uk-table-small" id="troopInfos-table">
        <tr>
            <th>氏名</th>
            <td>{{ $troopInfo->person_in_charge_name }} ({{ $troopInfo->person_in_charge_position }})</td>
        </tr>
        <tr>
            <th>登録番号</th>
            <td>{{ $troopInfo->person_in_charge_bsid }}</td>
        </tr>
        <tr>
            <th>電話</th>
            <td>{{ $troopInfo->person_in_charge_phone }}</td>
        </tr>
        <tr>
            <th>ケータイ</th>
            <td>{{ $troopInfo->person_in_charge_cellphone }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td><a
                    href="mailto:{{ $troopInfo->person_in_charge_email }}">{{ $troopInfo->person_in_charge_email }}</a>
            </td>
        </tr>
    </table>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    {{-- <h3 class="uk-card-title">地区役員情報</h3>
    <table class="table uk-table-striped uk-table-hover uk-table-small" id="troopInfos-table">
        <tr>
            <th>役務</th>
            <th>氏名</th>
            <th>TEL</th>
            <th>email</th>
        </tr>
        <tr>
            <td>地区委員長</td>
            <td>{{ $troopInfo->district_exec->chairman_name }}</td>
            <td>{{ $troopInfo->district_exec->chairman_phone }}</td>
            <td>{{ $troopInfo->district_exec->chairman_email }}</td>
        </tr>
        <tr>
            <td>地区コミッショナー</td>
            <td>{{ $troopInfo->district_exec->commi_name }}</td>
            <td>{{ $troopInfo->district_exec->commi_phone }}</td>
            <td>{{ $troopInfo->district_exec->commi_email }}</td>
        </tr>
    </table> --}}
</div>

<h3>班情報</h3>
<div class="table-responsive">
    <table class="table uk-table-striped uk-table-hover uk-table-small" id="troopInfos-table">
        <tr>
            <th>班ID</th>
            <th>班名</th>
        </tr>
        <tr>
            <td>1</td>
            <td>{{ $troopInfo->patrol1 }}班</td>
        </tr>
        <tr>
            <td>2</td>
            <td>{{ $troopInfo->patrol2 }}班</td>
        </tr>
        <tr>
            <td>3</td>
            <td>{{ $troopInfo->patrol3 }}班</td>
        </tr>
        <tr>
            <td>4</td>
            <td>{{ $troopInfo->patrol4 }}班</td>
        </tr>
        <tr>
            <td>5</td>
            <td>{{ $troopInfo->patrol5 }}班</td>
        </tr>
        <tr>
            <td>6</td>
            <td>{{ $troopInfo->patrol6 }}班</td>
        </tr>
    </table>



</div>
