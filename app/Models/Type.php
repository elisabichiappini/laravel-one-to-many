<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    // se pensiamo di passare progetti alle tecnologie nelle crud
    protected $guarded = ['slug'];
    
    //relazione una categoria può appartenere a un progetto
    public function projects() {
        return $this->hasOne(Project::class);
    }
}
