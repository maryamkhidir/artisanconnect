<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Tasks extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tasks';//custom table name else Users table would be searched for
    protected $primaryKey = 'id'; //custom primary key, else id would be searched for and used in the table
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    public  $timestamps = false; //Laravel should maintain my date columns, so I set this to true

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status','vendor_id','artisan_id','feedback','rating'
    ];

    /**     
    * Do not block all attributes from mass assignment
    */
    protected $guarded = [''];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ //hidden fields
    ];

    protected $dates = [
    ];

}
