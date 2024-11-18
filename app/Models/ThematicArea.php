<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThematicArea extends Model
{
    use HasFactory;

    protected $fillable = ['thematic_area_name'];

    /**
     * Get the users associated with the thematic area.
     */
    // public function users()
    // {
    //     return $this->hasMany(User::class, 'thematic_id');
    // }

    public function users()
 {
     return $this->belongsToMany(User::class);
    
 }

// public function thematicAreas()
// {
//     return $this->belongsToMany(ThematicArea::class, 'thematic_area_user'); // Specify pivot table if not following conventions
// }

// public function users()
// {
//     return $this->belongsToMany(User::class, 'thematic_area_user'); // Specify pivot table if not following conventions
// }

}
