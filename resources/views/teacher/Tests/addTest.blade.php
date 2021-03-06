@extends('addingPanel')

@section('addingContent')
    <div class="card-header">New test</div>

    <div class="card-body">
        <form method="POST" action="{{ route('addTest') }}">
            @csrf

            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                           name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="threshold" class="col-md-4 col-form-label text-md-end">Threshold</label>

                <div class="col-md-6">
                    <input id="threshold" type="text" class="form-control @error('threshold') is-invalid @enderror"
                           name="threshold" value="{{ old('threshold') }}" required autocomplete="threshold" autofocus>

                    @error('threshold')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <select class="form-select" multiple name="questions[]">
                    @foreach($questions as $question)
                        <option value="{{$question['id']}}">{{$question['question']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Add test
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
