<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $timestamps = True;
    protected $table = 'person';
    protected $fillable = [
        'id_number',
        'first_name',
        'last_name',
        'affiliation',
        'role',
        'token',
        'qr_code',
        'shirt_size',
        'team',
        'room',
        'is_register'
    ];
}
