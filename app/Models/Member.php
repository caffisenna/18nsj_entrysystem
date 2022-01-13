<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Member
 * @package App\Models
 * @version January 8, 2022, 2:45 pm JST
 *
 * @property string $user_id
 * @property string $role
 * @property integer $patrol_code
 * @property string $patrol_role
 * @property string $bs_id
 * @property string $name
 * @property string $furigana
 * @property string $grade
 * @property string $gender
 * @property string $birthday
 * @property string $religion
 * @property string $religion_sect
 * @property string $email
 * @property string $phone
 * @property string $cell_phone
 * @property string $org_dan_name
 * @property string $org_dan_number
 * @property string $org_group
 * @property string $org_patrol
 * @property string $org_role
 * @property string $training_record
 * @property string $uuid
 * @property string $sfh
 * @property string $health_check
 */
class Member extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'members';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'role',
        'patrol_code',
        'patrol_role',
        'bs_id',
        'name',
        'furigana',
        'grade',
        'gender',
        'birthday',
        'religion',
        'religion_sect',
        'email',
        'phone',
        'cell_phone',
        'org_dan_name',
        'org_dan_number',
        'org_group',
        'org_patrol',
        'org_role',
        'training_record',
        'uuid',
        'sfh',
        'health_check'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'role' => 'string',
        'patrol_code' => 'integer',
        'patrol_role' => 'string',
        'bs_id' => 'string',
        'name' => 'string',
        'furigana' => 'string',
        'grade' => 'string',
        'gender' => 'string',
        'birthday' => 'date',
        'religion' => 'string',
        'religion_sect' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'cell_phone' => 'string',
        'org_dan_name' => 'string',
        'org_dan_number' => 'string',
        'org_group' => 'string',
        'org_patrol' => 'string',
        'org_role' => 'string',
        'training_record' => 'string',
        'uuid' => 'string',
        'sfh' => 'string',
        'health_check' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'role' => 'required',
        'bs_id' => 'required',
        'name' => 'required',
        'furigana' => 'required',
        'gender' => 'required',
        'birthday' => 'required',
        'org_dan_name' => 'required',
        'org_dan_number' => 'required',
        'org_group' => 'required',
        'org_role' => 'required'
    ];

    public static $messages = [
        'role.required' => '役務は必須です',
        'bs_id.required' => '登録番号は必須です',
        'name.required' => '氏名は必須です',
        'furigana.required' => 'ふりがなは必須です',
        'gender.required' => '性別は必須です',
        'birthday.required' => '生年月日は必須です',
        'org_dan_name.required' => '所属団名は必須です',
        'org_dan_number.required' => '所属団番号は必須です',
        'org_group.required' => '所属隊は必須です',
        'org_role.required' => '所属隊役務は必須です',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
