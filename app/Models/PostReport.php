<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_name', 
        'report_description',
        'post_id',
        'user_id',
        'report_id',
    ];

    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
