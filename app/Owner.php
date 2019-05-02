<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
      'owner', 'animal', 'user_id'
    ];

    public function specifics()
    {
      return $this->hasMany(Specific::class);
    }

    public function addSpecific($specific)
    {
      $this->specifics()->create($specific);
    }
}
