<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    // se pensiamo di passare progetti alle tecnologie nelle crud
    protected $guarded = ['project'];

    public function projects() {
        return $this->belongsToMany(Project::class);
    }
}
