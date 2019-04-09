@extends('layout')

@section('content')
  <h1 class="title text-center text-primary">{{ $owner->owner }}</h1>

  <div class="content  col-4 bg-primary text-white rounded">{{ $owner->animal }}</div><br>

  <a href="/owners/{{ $owner->id }}/edit" class="btn btn-primary btn-lg"
  role="button" aria-pressed="true" >{{ __('Edit') }}</a><br><br>

  @if($owner->specifics->count())
    @foreach ($owner->specifics as $specific)

    <div class="col-4 bg-info text-white rounded">

      <form class="" action="/specifics/{{ $specific->id }}" method="POST">
        @method('PATCH')
        @csrf
        <label class="{{ $specific->specified ? 'is-specified' : '' }}" for="specified">
          <input type="checkbox" name="specified" onchange="this.form.submit()" {{ $specific->specified ? 'checked' : '' }}>
          {{ $specific->detail }}
        </label>

      </form>

    </div><br>

    @endforeach
  @endif

  {{-- Add a new specific form --}}
  <form class="card  bg-info" action="/owners/{{ $owner->id }}/specifics" method="POST">
    @csrf
    <div class="form-group row">
      <label for="detail" class="col-md-4 col-form-label text-md-right mt-4 text-white">
      {{ __('New Specific') }}</label>

      <div class="col-md-6"><br>
        <input type="text" name="detail" class="form-control form-control{{ $errors->has('detail') ? ' is-invalid' : '' }}" required>

        @if ($errors->has('detail'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('detail') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group row mb-3">
      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary btn-lg aria-pressed="true"">
          {{ __('Add Specific') }}
        </button>
      </div>
    </div>
  </form>

@endsection
