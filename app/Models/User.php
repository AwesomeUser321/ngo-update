<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        
        'name_of_agency',
        'full_name',
        'father_name',
        'cnic_no',
        'applicant_phone',
        'email_address',
        'password',
        'vswa_hq_id',
        'nature_of_authorization_id',
    ];

    /**
     * Get the thematic area associated with the user.
     */
    public function thematicArea()
    {
        return $this->belongsTo(ThematicArea::class, 'thematic_id');
    }

    /**
     * Get the VSWA headquarter associated with the user.
     */
    public function vswaHeadQuarter()
    {
        return $this->belongsTo(VswaHeadQuarter::class, 'vswa_hq_id');
    }

    // In User model
public function thematicAreas()
{
    return $this->belongsToMany(ThematicArea::class);
}

public function natureOfAuthorization()
{
    return $this->belongsTo(NatureOfAuthorization::class, 'nature_of_authorization_id');
}



}
