<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class planUpload
 * @package App\Models
 * @version August 30, 2021, 11:32 pm JST
 *
 * @property string $user_id
 * @property string $file_path
 * @property file $file
 */
class Sfh extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sfh_uploads';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'member_id',
        'file_path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'member_id' => 'integer',
        'user_id' => 'string',
        'file_path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'member_id' => 'required',
        'file' => 'required|mimes:pdf,jpg',
    ];

    public static $messages = [
        'file.required'=>'SFH修了証のファイルを指定してください',
        'file.mimes'=>'SFH修了証はPDFまたはjpg形式のみアップロード可能です',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


}
