<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    
    protected $table = 'person';
    protected $fillable = ['firstname', 'lastname', 'dateofbirth', 'emailaddress'];
    
    public function assets()
    {
        return $this->hasMany(Asset::class, 'owner_id');
    }

}
