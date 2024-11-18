<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureOfAuthorization extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the users associated with this nature of authorization.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'nature_of_authorization_id');
    }
}
