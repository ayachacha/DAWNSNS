<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $primaryKey =[
        'follow',
        'follower'
    ];

    protected $fillable =[
        'follow',
        'follower'
    ];

    public $timestamps = false;
    public $incrementing = false;


}
