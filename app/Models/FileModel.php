<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    protected $table = 'files';
    protected $fillable = ['name', 'path', 'mime_type', 'user_id'];
}
