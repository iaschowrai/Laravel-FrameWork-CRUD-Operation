<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'value', 'purchased','assigned','owner_id'];
    
public function owner()
{
    return $this->belongsTo(Person::class, 'owner_id');
}

}
