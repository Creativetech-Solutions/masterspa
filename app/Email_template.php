<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email_template extends Model
{
    protected $fillable = [
        'name', 'subject', 'help', 'body'
    ];
}
