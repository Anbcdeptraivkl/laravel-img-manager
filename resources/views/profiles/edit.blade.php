@extends('layouts.app')

@section('content')
<div class="container w-75">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row pb-4">
                    <h1 class="">Edit Profile</h1>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">{{ __('New Title') }}</label>
                    <input
                        id="title"
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        name="title"
                        value="{{ old('title') ?? $user->profile->title }}"
                        required autocomplete="title"
                    >
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">{{ __('New Description') }}</label>
                    <input
                        id="description"
                        type="text"
                        class="form-control @error('description') is-invalid @enderror"
                        name="description"
                        value="{{ old('description') ?? $user->profile->description }}"
                        required autocomplete="description"
                    >
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">{{ __('New URL') }}</label>
                    <!--
                    # Using Old Data
                    # Using $user Data passed from Controller
                    -->
                    <input
                        id="url"
                        type="text"
                        class="form-control @error('url') is-invalid @enderror"
                        name="url"
                        value="{{ old('url') ?? $user->profile->url }}"
                        required autocomplete="url"
                    >
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Profile Image') }}</label>
                    <input type="file" id="image" class="form-control-file" name="image">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
