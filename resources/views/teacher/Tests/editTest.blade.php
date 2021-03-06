@extends('addingPanel')

@section('addingContent')
    <div class="card-header">Test edit</div>

    <div class="card-body">
        <form method="POST" action="{{ route('saveTest', $temp->id) }}">
            @csrf

            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                           name="title" value="{{ $temp->title }}" required autocomplete="title" autofocus>

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
                           name="threshold" value="{{ $temp->threshold }}" required autocomplete="threshold" autofocus>

                    @error('threshold')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <ul class="list-group text-center">
                    @foreach($questions as $question)
                        <a href="#" class="list-group-item list-group-item-action">
                            {{$question['question']}}
                        </a>
                    @endforeach
                </ul>
            </div>



            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
