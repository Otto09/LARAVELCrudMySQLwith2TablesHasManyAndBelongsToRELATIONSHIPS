<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;

class OwnersController extends Controller
{
    public function index()
    {
      $owners = Owner::all();

      return view('owners.index', compact('owners'));
    }

    public function create()
    {
      return view('owners.create');
    }

    public function show(Owner $owner)
    {
      return view('owners.show', compact('owner'));
    }

    public function edit(Owner $owner)
    {
      return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
      request()->validate([
      'owner' => ['required', 'min:3'],
      'animal' => ['required', 'min:3']
      ]);

      Owner::whereId($id)->update($request->except(['_method','_token']));

      return redirect('/owners');
    }

    public function destroy(Owner $owner)
    {
      $owner->delete();

      return redirect('/owners');
    }

    public function store()
    {
      $attributes = request()->validate([
      'owner' => ['required', 'min:3'],
      'animal' => ['required', 'min:3']
      ]);

      Owner::create($attributes);

      return redirect('/owners');
    }
}
