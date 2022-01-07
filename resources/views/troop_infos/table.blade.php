<div class="table-responsive">
    <table class="table" id="troopInfos-table">
        <tr>
            <th>User Id</th>
            <td>{{ $troopInfo->user_id }}</td>
        </tr>
        <tr>
            <th>所属県連・地区</th>
            <td>{{ $troopInfo->pref }}連盟 {{ $troopInfo->district }}地区</td>
        </tr>
        <tr>
            <th>参加隊コード</th>
            <td>@if (isset($troopInfo->troop_number)){{ $troopInfo->troop_number }}@else 未定 @endif</td>
        </tr>
    </table>


    <h3>地区責任者情報</h3>
    <table class="table" id="troopInfos-table">
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

    <h3>班情報</h3>
    <table class="table" id="troopInfos-table">
        <tr>
            <th>1班目</th>
            <td>{{ $troopInfo->patrol1 }} 班</td>
        </tr>
        <tr>
            <th>2班目</th>
            <td>{{ $troopInfo->patrol2 }} 班</td>
        </tr>
        <tr>
            <th>3班目</th>
            <td>{{ $troopInfo->patrol3 }} 班</td>
        </tr>
        <tr>
            <th>4班目</th>
            <td>{{ $troopInfo->patrol4 }} 班</td>
        </tr>
        <tr>
            <th>5班目</th>
            <td>{{ $troopInfo->patrol5 }} 班</td>
        </tr>
        <tr>
            <th>6班目</th>
            <td>{{ $troopInfo->patrol6 }} 班</td>
        </tr>
    </table>



</div>
