<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">基本情報</h3>
    <table class="table uk-table-striped uk-table-hover uk-table-small" id="troopInfos-table">
        <tr>
            <td>氏名</td>
            <td>{{ $member->name }} ({{ $member->furigana }})</td>
        </tr>
        <tr>
            <td>性別</td>
            <td>{{ $member->gender }}</td>
        </tr>
        <tr>
            <td>参加隊役務</td>
            <td>{{ $member->role }}</td>
        </tr>
        <tr>
            <td>参加隊形態</td>
            <td>{{ $member->how_to_join }}</td>
        </tr>

        @if ($member->grade)
            <tr>
                <td>進級</td>
                <td>{{ $member->grade }}</td>
            </tr>
        @endif
        <tr>
            <td>生年月日</td>
            <td>{{ $member->birthday->format('Y-m-d') }}</td>
        </tr>
        @if ($member->patrol_code)
            <tr>
                <td>班・役務</td>
                <td>{{ $member->patrol_code }} {{ $member->patrol_role }}</td>
            </tr>
        @endif
        <tr>
            <td>登録番号</td>
            <td>{{ $member->bs_id }}</td>
        </tr>
        <tr>
            <td>研修歴</td>
            <td>{{ $member->training_record }}</td>
        </tr>
        <tr>
            <td>email</td>
            <td>{{ $member->email }}</td>
        </tr>
        <tr>
            <td>電話番号</td>
            <td>{{ $member->phone }}</td>
        </tr>
        <tr>
            <td>ケータイ</td>
            <td>{{ $member->cell_phone }}</td>
        </tr>
    </table>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">宗教</h3>
    <table class="table uk-table-striped uk-table-hover uk-table-small" id="troopInfos-table">
        <tr>
            <td>{{ $member->religion }} {{ $member->religion_sect }}</td>
        </tr>
    </table>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">原隊</h3>
    <table class="table uk-table-striped uk-table-hover uk-table-small" id="troopInfos-table">
        <tr>
            <td>所属</td>
            <td>{{ $member->org_dan_name }}{{ $member->org_dan_number }}団 {{ $member->org_group }}隊</td>
        </tr>
        <tr>
            <td>役務</td>
            <td>{{ $member->org_role }}</td>
        </tr>
        @if ($member->org_patrol)
            <tr>
                <td>班・役務</td>
                <td>{{ $member->org_patrol }}班 {{ $member->org_role }}</td>
            </tr>
        @endif
    </table>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">提出物</h3>
    <table class="table uk-table-striped uk-table-hover uk-table-small" id="troopInfos-table">
        <tr>
            <td>SFH</td>
            <td>{{ $member->sfh }}</td>
        </tr>
        <tr>
            <td>健康調査</td>
            <td>{{ $member->health_check }}</td>
        </tr>

    </table>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m">
    <h3 class="uk-card-title">データベース</h3>
    <table class="table uk-table-striped uk-table-hover uk-table-small" id="troopInfos-table">
        <tr>
            <td>uuid</td>
            <td>{{ $member->uuid }}</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>{{ $member->created_at }}</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>{{ $member->updated_at }}</td>
        </tr>
    </table>
</div>
