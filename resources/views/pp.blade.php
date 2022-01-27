<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('/css/uikit.min.css') }}">

    <title>{{ config('app.name') }}</title>
</head>

<body class="antialiased">
    <h3>個人情報の取り扱いについて</h3>
    <table class="uk-table uk-table-striped uk-table-responsive">
        <tr>
            <th>個人情報収集者の名称</th>
            <td>一般社団法人 日本ボーイスカウト東京連盟</td>
        </tr>
        <tr>
            <th>個人情報利用者の名称</th>
            <td>一般社団法人 日本ボーイスカウト東京連盟</td>
        </tr>
        <tr>
            <th>収集する個人情報</th>
            <td>行事への参加の際に必要な加盟登録番号、氏名、生年月日、研修歴、電話番号、所属、車両情報、E-メールアドレスなど、以下の利用目的範囲内の個人情報</td>
        </tr>
        <tr>
            <th>個人情報の利用目的</th>
            <td>第18回日本スカウトジャンボリー 中央会場の運営にのみ利用させていただきます。</td>
        </tr>
        <tr>
            <th>個人情報の提供に関する必須、任意の区別</th>
            <td>個人情報の提供はあくまで任意によるものですが、必要な情報のご提供がない場合には申込をお受けできない場合がございますのでご了承願います。</td>
        </tr>
        <tr>
            <th>個人が提供する個人情報の個人によるコントロールの権利</th>
            <td>当連盟は、提供された個人情報に関する開示等を求められた場合、提供者本人であることの確認後、本人が提供した個人情報の内容確認、修正及び更新、削除、また利用及び開示に関する、同意の一部あるいは全部の撤回について合理的な範囲で速やかに応じます。
            </td>
        </tr>
        <tr>
            <th>個人情報に関する開示、利用目的の通知依頼、及び苦情・相談のお申し出窓口</th>
            <td>住所 〒167-0022 東京都杉並区下井草4-4-3-1階<br>
                窓口 一般社団法人 日本ボーイスカウト東京連盟 事務局</td>
        </tr>
        <tr>
            <th>個人情報の取り扱いに関する安全管理措置及び第三者への提供に関して</th>
            <td>お預かりした個人情報はその利用目的の範囲内で正確かつ最新の内容に保つよう努め、不正アクセス、改ざん、漏洩などから守るべく適切な安全管理措置を講じます。また法令により例外として認められる場合を除き、ご本人の同意を得ることなく第三者への開示、提供は行いません。
            </td>
        </tr>
    </table>
    <!-- Main Footer -->
    <footer class="main-footer">
        <p class="uk-text-small uk-text-center">ボーイスカウト東京連盟<br>
            {{ config('app.name') }} &copy;</p>
    </footer>
</body>

</html>
