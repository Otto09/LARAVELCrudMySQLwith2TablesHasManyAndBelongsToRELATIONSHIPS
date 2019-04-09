<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specific;
use App\Owner;

class OwnerSpecificsController extends Controller
{
    public function store(Owner $owner)
    {
      $attributes = request()->validate(['detail' => 'required']);

      $owner->addSpecific($attributes);

      return back();
    }

    public function update(Specific $specific)
    {
      //$specific->specify(request()->has('specified'));

      //$specific->update([
        //'specified' => request()->has('specified')
      //]);

      $method = request()->has('specified') ? 'specify' : 'unspecify';

      $specific->$method();

      return back();
    }
}
