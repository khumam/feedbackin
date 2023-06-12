<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'form_id',
        'name',
        'main_url',
        'redirect_url',
        'desc',
        'status'
    ];
}
