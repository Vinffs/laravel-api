@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{ $technology->name }}</h1>
        <h3>Post List</h3>
        <ul class="list-group list-group-flush">
            @forelse ($technology->projects as $project)
                @if (Auth::id() == $project->user_id || Auth::id() == 1)
                    <li class="list-group-item">
                        <a href="{{ route('admin.projects.show', $project->slug) }}"
                            class="link-underline link-underline-opacity-0"> {{ $post->title }}</a>
                    </li>
                @endif
            @empty
                <li>No posts</li>
            @endforelse
        </ul>
    </section>
@endsection
