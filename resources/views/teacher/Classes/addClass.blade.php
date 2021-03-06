@extends('addingPanel')

@section('addingContent')
    <div class="card-header">New class</div>

    <div class="card-body">
        <form method="POST" action="{{ route('addClass') }}">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <select class="form-select" multiple name="users[]">
                    @foreach($users as $user)
                        @if($user['Role'] != 1)
                        <option value="{{$user['id']}}">{{$user['name']}} {{$user['surrname']}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Add class
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
