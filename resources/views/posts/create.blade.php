@extends('layouts.app')

@section('content')
<div class="container w-75">
    <form action="/p" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row pb-4">
                    <h1 class="">New Post</h1>
                </div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">{{ __('Post Caption') }}</label>
                    <input
                        id="caption"
                        type="text"
                        class="form-control @error('caption') is-invalid @enderror"
                        name="caption"
                        value="{{ old('caption') }}"
                        required autocomplete="caption"
                    >
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Image') }}</label>
                    <input type="file" id="image" class="form-control-file" name="image">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
