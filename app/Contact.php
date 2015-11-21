<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    public $fillable = [
        'owner_id',
        'first_name',
        'last_name',
        'email',
        'address',
        'twitter',
    ];

    public function Owner(){

        return $this->belongsTo(User::class);
    }
}
