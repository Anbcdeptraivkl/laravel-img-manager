@extends('layouts.app')

@section('content')
<div class="container w-75">
    <div class="row">
        <div class="col-3 pl-5">
            <img class="rounded-circle w-100 profile-image" src="{{ $user->profile->profileImage() }}" style="width:200px; height: 175px;">
        </div>
        <div class="col-9 pt-3 pl-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h2>{{ $user->username }}</h2>
                <div class="d-flex align-items-center">
                    <!--Follow Button with Followed Status Data-->
                    <follow-button user-id="{{ $user->id }}" followed="{{ $followed }}"></follow-button>
                    @can('update', $user->profile)
                        <button type="button" class="btn btn-primary" onclick="location.href = '/p/create';">New Post</button>
                    @endcan
                </div>
            </div>
            @can('update', $user->profile)
                <a href = '/profile/{{ $user->id }}/edit'>Edit Profile</a>
            @endcan
            <!--Telescope-->
            <div class="d-flex">
                <div class="pr-4"><strong>{{ $user->posts->count()}}</strong> posts</div>
                <div class="pr-4"><strong>{{ $user->profile->followers->count() }}</strong> followers</div>
                <div class="pr-4"><strong>{{ $user->followings->count() }}</strong> following</div>
            </div>
            <div class="pt-3"><a href="#">{{ $user->profile->title }}</a></div>
            <div><p>{{ $user->profile->description }}</p></div>
            <div><a>{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
</div>
@endsection
