<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Type extends Model
{
    use HasFactory;
    
    // definiamo la cardinalità
    public function posts() {
        return $this->hasMany(Project::class);
    }
}
//principale