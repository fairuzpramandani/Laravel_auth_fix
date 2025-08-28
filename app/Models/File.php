<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'original_name',
        'name',
        'path',
        'mime_type',
        'updated_at',
        'created_at',
    ];
}