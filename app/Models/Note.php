<?php



namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Base\BaseModel;



class Note extends BaseModel

{
	use SoftDeletes;

    protected $table='usernote';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title', 'discription','user_id'
    ];

}
