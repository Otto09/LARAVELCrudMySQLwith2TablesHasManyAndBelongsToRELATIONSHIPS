<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
      'owner', 'animal'
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
