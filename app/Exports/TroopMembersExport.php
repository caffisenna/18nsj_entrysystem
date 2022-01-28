<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TroopMembersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member::where('user_id', Auth()->id())->get();
    }

    public function headings() :array
    {
        return [
            'ID', '隊ID', '隊役務', '班ID', '班役務', '登録番号', '氏名','ふりがな','進級','性別','生年月日','宗教','宗派','email','電話','ケータイ',
            '所属団名','団番号','所属隊','班','所属隊役務','研修歴','uuid','sfh','健康調査','参加期間','created_at','updated_at','deleted_at'
        ];
    }
}
