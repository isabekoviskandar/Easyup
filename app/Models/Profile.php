<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'first_name',
        'last_name',
        'gender',
        'birthday',
        'ielts_level',
        'user_type',
        'type',
        'suggested_from'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class , 'address_id');
    }
}
