<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class PostModel extends Model
{
    use HasFactory;

    protected $table="posts";

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'active',
        'published_at',
    ];

    protected $appends = [
        'short_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getShortDescriptionAttribute(){
        return Str::limit($this->description, 50, '...');
    }
}
