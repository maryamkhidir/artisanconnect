<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Portfolio extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'portfolio';//custom table name else Users table would be searched for
    protected $primaryKey = 'id'; //custom primary key, else id would be searched for and used in the table
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid', 'skill', 'image1', 'image2'
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
