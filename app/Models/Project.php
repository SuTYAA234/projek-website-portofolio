<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //untuk mengisi field yang boleh diisi massal
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
    ];
}
