<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'project_id',
        'name',
        'email',
        'phone',
        'website',
        'resume',
        'cover_letter',
    ];

    public function user()
    {
        return $this->belongsTo(USer::class, 'user_id');
    }
    
}
