@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('update State') }}
                    <a href="{{ route('cities.index') }}" class="btn btn-primary mb-2 float-right">back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cities.update',$city->id) }}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __(' State ') }}</label>
                            <div class="col-md-6">
                                <select class="form-select form-control" aria-label="Default select example"
                                    name="state_id">
                                    <option selected>Open this select menu</option>
                                    @foreach ($states as $state)
                                    <option value="{{ $state->id }}" {{ $state->id == $city->state_id ? 'selected' : ''
                                        }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
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
                                    name="name" value="{{ old(' name ',$city->name) }}" required autocomplete="name"
                                    autofocus>
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
                                    {{ __('City Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Start Delete Country --}}
                <div class="m-2 p-2">
                    <form method="POST" action="{{ route('cities.destroy', $city->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete {{ $city->name }}</button>
                    </form>
                </div>
                {{-- End Delete Country --}}
            </div>
        </div>
    </div>
</div>
@endsection
