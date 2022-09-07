@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('update State') }}
                    <a href="{{ route('states.index') }}" class="btn btn-primary mb-2 float-right">back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('states.update',$state->id) }}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __(' State ') }}</label>
                            <div class="col-md-6">
                                <select class="form-select form-control" aria-label="Default select example"
                                    name="country_id">
                                    <option selected>Open this select menu</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ $country->id == $state->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __(' Name ') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old(' name ',$state->name) }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('State Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
{{-- Start Delete Country --}}
                <div class="m-2 p-2">
                    <form method="POST" action="{{ route('states.destroy', $state->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete {{ $state->name }}</button>
                    </form>
                </div>
                {{-- End Delete Country --}}
            </div>
        </div>
    </div>
</div>
@endsection
