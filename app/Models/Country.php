<?php

namespace App\Models;

use App\Traits\SingularTableNameTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kblais\Uuid\Uuid;

class Country extends Model
{
    use HasFactory, Uuid, SingularTableNameTrait;

    protected $fillable = [
      'official_name',
      'english_name',
      'code',
      'flag',
    ];
}
