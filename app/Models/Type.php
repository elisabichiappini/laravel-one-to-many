<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    //relazione una categoria può appartenere a un progetto
    public function projects() {
        return $this->hasOne(Project::class);
    }
}
