<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DistrictExec
 * @package App\Models
 * @version January 18, 2022, 8:35 pm JST
 *
 * @property string $district_name
 * @property string $chairman_name
 * @property string $chairman_phone
 * @property string $chairman_email
 * @property string $commi_name
 * @property string $commi_phone
 * @property string $commi_email
 */
class DistrictExec extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'district_execs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'district_name',
        'chairman_name',
        'chairman_phone',
        'chairman_email',
        'commi_name',
        'commi_phone',
        'commi_email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'district_name' => 'string',
        'chairman_name' => 'string',
        'chairman_phone' => 'string',
        'chairman_email' => 'string',
        'commi_name' => 'string',
        'commi_phone' => 'string',
        'commi_email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'district_name' => 'required',
        // 'chairman_name' => 'required',
        // 'chairman_phone' => 'required',
        // 'chairman_email' => 'required',
        // 'commi_name' => 'required',
        // 'commi_phone' => 'required',
        // 'commi_email' => 'required'
    ];


}
