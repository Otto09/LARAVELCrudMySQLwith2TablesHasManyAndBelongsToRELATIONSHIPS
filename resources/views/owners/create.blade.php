@extends('layout')

@section('content')
  <h1 class="text-center title text-primary">Create a New Owner</h1>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('ADD') }}</div>

          <div class="card-body">
            <form action="/owners" method="POST">
              @csrf
              <div class="form-group row">
                <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __('Owner') }}</label>

                <div class="col-md-6">
                  <input type="text" name="owner" class="form-control{{ $errors->has('owner') ? ' is-invalid' : '' }}" value="{{ old('owner') }}" required>

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
                  <input type="text" name="animal" class="form-control{{ $errors->has('animal') ? ' is-invalid' : '' }}" value="{{ old('animal') }}" required>

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
                    {{ __('Create Owner') }}
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
