<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    // se pensiamo di passare progetti alle tecnologie nelle crud
    protected $guarded = ['slug'];

    //relazione più tecnologie possono appartenere a più progetti
    public function projects() {
        return $this->belongsToMany(Project::class)->withTimestamps();
    }
}
