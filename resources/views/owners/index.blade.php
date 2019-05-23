@extends('layout')

@section('content')
  <h1 class="text-center text-primary">Owners</h1><br>
  <a href="/owners/create" class="btn btn-primary btn-lg float-right" role="button"
  aria-pressed="true" style="margin-right: 15px;">ADD NEW OWNER</a><br><br><br>
  @if (session('message'))
    <p class="float-right" style="margin-right: 0px;">{{ session('message') }}
    </p><br>
  @endif
  <ul class="list-unstyled text-center col-3">
    @foreach($owners as $owner)
    <li class="">
      <a href="/owners/{{ $owner->id}}"
      class="bg-primary text-decoration-none text-white p-3 rounded">
          {{$owner->owner}}
      </a>
    </li><br><br>
    @endforeach
  </ul>

@endsection
