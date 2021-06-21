<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Base\BaseModel;



class Event extends BaseModel

{

		use SoftDeletes;

    protected $table='event';
     protected $dates = ['deleted_at'];
    protected $fillable = [
        'title', 'discription','event_picture','start_date','end_date','status',
    ];

}
