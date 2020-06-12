@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8" style="max-width: 600px;">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="Showing Image">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center pb-4">
                <div class="pr-3">
                    <img class="rounded-circle w-100" style="max-width: 40px;" src="{{ $post->user->profile->profileImage() }}">
                </div>
                <!--Linking between Username and User Profile-->
                <h4 style="margin-bottom: 0;"><a href="/profile/{{ $post->user->id }}">
                    <span class="text-dark">{{ $post->user->username }}</span>
                </a></h4>
                <!--Follow Button and Functionalities-->
                <a class="pl-3 follow-btn">Follow</a>
            </div>
            <p>{{ $post->caption }}</p>
        </div>
    </div>
</div>
@endsection
