@extends('layout')

@section('content')

  <h1 class="text-center title text-primary">Edit Owner</h1>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('EDIT') }}</div>

          <div class="card-body">
            <form action="/owners/{{ $owner->id }}" method="POST">
              @csrf
              @method('PATCH')
              <div class="form-group row">
                <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __('Owner') }}</label>

                <div class="col-md-6">
                  <input type="text" name="owner" class="form-control{{ $errors->has('owner') ? ' is-invalid' : '' }}" value="{{ $owner->owner }}" required>

                  @if ($errors->has('owner'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('owner') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="animal" class="col-md-4 col-form-label text-md-right">{{ __('Animal') }}</label>

                <div class="col-md-6">
                  <input type="text" name="animal" class="form-control{{ $errors->has('animal') ? ' is-invalid' : '' }}" value="{{ $owner->animal }}" required>

                  @if ($errors->has('animal'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('animal') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Update Owner') }}
                  </button>
                </div>
              </div><br>
            </form>

            <form action="/owners/{{ $owner->id }}" method="post">
              @csrf
              @method('DELETE')
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Delete Owner') }}
                  </button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>


@endsection
