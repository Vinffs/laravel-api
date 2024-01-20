@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>
            {{ $project->title }}
        </h1>
        <div><img src="{{ asset("storage/$project->thumb") }}" alt="{{ $project->title }}"></div>
        <p>{{ $project->description }}</p>
        <div>{{ $project->type ? $project->type->name : 'Uncategorized' }}</div>
        @if ($project->technologies)
            <div class="mb-3">
                <h4>Technologies</h4>
                @foreach ($project->technologies as $technology)
                    <a href="{{ route('admin.technologies.show', $technology->id) }}"
                        class="btn btn-danger">{{ $technology->name }}</a>
                @endforeach
            </div>
        @endif
        <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Return</a>
    </section>
@endsection
