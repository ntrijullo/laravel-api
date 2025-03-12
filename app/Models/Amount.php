<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    protected $fillable = ['user_id', 'date', 'amount'];

    protected $visible = ['id', 'user_id', 'date', 'amount'];
}
