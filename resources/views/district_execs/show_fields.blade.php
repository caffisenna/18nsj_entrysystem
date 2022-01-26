<h3>地区委員長</h3>
<table class="uk-table uk-table-hover">
    <tr>
        <th>氏名</th>
        <th>ケータイ</th>
        <th>email</th>
    </tr>
    <tr>
        <td>{{ $districtExec->chairman_name }}</td>
        <td>{{ $districtExec->chairman_phone }}</td>
        <td>{{ $districtExec->chairman_email }}</td>
    </tr>
</table>

<h3>地区コミッショナー</h3>
<table class="uk-table uk-table-hover">
    <tr>
        <th>氏名</th>
        <th>ケータイ</th>
        <th>email</th>
    </tr>
    <tr>
        <td>{{ $districtExec->commi_name }}</td>
        <td>{{ $districtExec->commi_phone }}</td>
        <td>{{ $districtExec->commi_email }}</td>
    </tr>
</table>
