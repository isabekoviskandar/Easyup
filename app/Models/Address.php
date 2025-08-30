<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected   $table = 'addresses';

    protected  $fillable = [
        'name',
    ];

    public function getAllAddress()
    {
        return self::all();
    }

    public function getAddressById($id)
    {
        return self::findOrFail($id);
    }
}
