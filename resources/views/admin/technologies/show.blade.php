@extends('layouts.app')
@section('content')
    <section class="container py-2">
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
        <h1>{{ $technology->name }}</h1>
        <ul>
            @foreach ($technology->projects as $project)
                <li>{{ $project->title }}</li>
            @endforeach
        </ul>
    </section>
@endsection
