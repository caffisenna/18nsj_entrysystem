<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Volstaff
 * @package App\Models
 * @version January 17, 2022, 11:01 am JST
 *
 * @property string $user_id
 * @property string $bs_id
 * @property string $name
 * @property string $furigana
 * @property string $gender
 * @property string $birthday
 * @property string $email
 * @property string $phone
 * @property string $cell_phone
 * @property string $org_dan_name
 * @property string $org_dan_number
 * @property string $org_group
 * @property string $org_role
 * @property string $district_role
 * @property string $training_record
 * @property string $uuid
 * @property string $sfh
 * @property string $health_check
 * @property string $car_number
 * @property string $car_type
 * @property string $how_to_join
 * @property string $camp_area
 * @property string $job_department
 * @property string $memo
 */
class Volstaff extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'volstaffs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'bs_id',
        'name',
        'furigana',
        'gender',
        'birthday',
        'email',
        'phone',
        'cell_phone',
        'org_dan_name',
        'org_dan_number',
        'org_group',
        'org_role',
        'district_role',
        'training_record',
        'uuid',
        'sfh',
        'health_check',
        'car_number',
        'car_type',
        'how_to_join',
        'camp_area',
        'job_department',
        'memo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'string',
        'bs_id' => 'string',
        'furigana' => 'string',
        'gender' => 'string',
        'birthday' => 'date',
        'phone' => 'string',
        'cell_phone' => 'string',
        'org_district' => 'string',
        'org_dan_name' => 'string',
        'org_dan_number' => 'string',
        'org_group' => 'string',
        'org_role' => 'string',
        'district_role' => 'string',
        'training_record' => 'string',
        'uuid' => 'string',
        'sfh' => 'string',
        'health_check' => 'string',
        'car_number' => 'string',
        'car_type' => 'string',
        'how_to_join' => 'string',
        'camp_area' => 'string',
        'job_department' => 'string',
        'memo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'bs_id' => 'required',
        'furigana' => 'required',
        'gender' => 'required',
        'birthday' => 'required',
        'org_district' => 'required',
        'org_dan_name' => 'required',
        'org_dan_number' => 'required',
        'org_group' => 'required',
        'org_role' => 'required',
        'how_to_join' => 'required',
        'camp_area' => 'required',
        'job_department' => 'required'
    ];

    public static $messages = [
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
