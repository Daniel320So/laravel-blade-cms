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
        'linkedin',
        'website'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    
}
