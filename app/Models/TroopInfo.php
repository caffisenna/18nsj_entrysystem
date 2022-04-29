<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TroopInfo
 * @package App\Models
 * @version January 5, 2022, 10:37 pm JST
 *
 * @property string $user_id
 * @property string $pref
 * @property string $district
 * @property string $troop_number
 * @property string $person_in_charge_name
 * @property string $person_in_charge_position
 * @property string $person_in_charge_bsid
 * @property string $person_in_charge_phone
 * @property string $person_in_charge_cellphone
 * @property string $person_in_charge_email
 */
class TroopInfo extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'troop_infos';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'pref',
        'district',
        'troop_number',
        'person_in_charge_name',
        'person_in_charge_position',
        'person_in_charge_bsid',
        'person_in_charge_phone',
        'person_in_charge_cellphone',
        'person_in_charge_email',
        'patrol1',
        'patrol2',
        'patrol3',
        'patrol4',
        'patrol5',
        'patrol6'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'pref' => 'string',
        'district' => 'string',
        'troop_number' => 'string',
        'person_in_charge_name' => 'string',
        'person_in_charge_position' => 'string',
        'person_in_charge_bsid' => 'string',
        'person_in_charge_phone' => 'string',
        'person_in_charge_cellphone' => 'string',
        'person_in_charge_email' => 'string',
        'patrol1' => 'string',
        'patrol2' => 'string',
        'patrol3' => 'string',
        'patrol4' => 'string',
        'patrol5' => 'string',
        'patrol6' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'person_in_charge_name' => 'required',
        'person_in_charge_position' => 'required',
        // 'person_in_charge_bsid' => 'required',
        'person_in_charge_phone' => 'required',
        'person_in_charge_cellphone' => 'required',
        'person_in_charge_email' => 'required|email:strict'
    ];

    public static $messages = [
        'person_in_charge_name.required' => '氏名は必須です',
        'person_in_charge_position.required' => '役務は必須です',
        // 'person_in_charge_bsid.required' => '登録番号は必須です',
        'person_in_charge_phone.required' => '電話番号は必須です',
        'person_in_charge_cellphone.required' => 'ケータイは必須です',
        'person_in_charge_email.required' => 'emailは必須です',
        'person_in_charge_email.email' => '有効なemailの形式で入力して下さい',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


}
