<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    // Table Name
    protected $table = 'templates';
    //primary key
    public $primaryKey = 'id';
    // Timestamp
    public $timestamps = true;

}
