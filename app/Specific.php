<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specific extends Model
{
    protected $fillable = [
      'detail', 'specified'
    ];

    public function specify($specified = true)
    {
      $this->update(compact('specified'));
    }

    public function unspecify()
    {
      $this->specify(false);
    }

    public function owner()
    {
      return $this->belongsTo(Owner::class);
    }
}
