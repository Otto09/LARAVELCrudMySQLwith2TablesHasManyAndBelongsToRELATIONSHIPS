<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use App\Mail\OwnerCreated;


class OwnersController extends Controller
{
    function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $owners = auth()->user()->owners;

      //Get all the owners for the authenticated user
      //$owners = Owner::where('user_id', auth()->id())->get();

      return view('owners.index', [
        'owners' => auth()->user()->owners
      ]);
    }

    public function create()
    {
      return view('owners.create');
    }

    public function show(Owner $owner)
    {
      $this->authorize('update', $owner);

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
      $this->authorize('update', $owner);
      
      $owner->delete();

      return redirect('/owners');
    }

    public function store()
    {
      $attributes = request()->validate([
      'owner' => ['required', 'min:3'],
      'animal' => ['required', 'min:3']
      ]);

      $attributes['user_id'] = auth()->id();

      $owner = Owner::create($attributes);

      //\Mail::to($owner->user->email)->send(
        //new OwnerCreated($owner)
      //);

      return redirect('/owners');
    }
}
