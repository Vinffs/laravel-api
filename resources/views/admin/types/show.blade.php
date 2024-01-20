@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>
            {{ $type->name }}
        </h1>
        @forelse ($type->projects as $project)
            <li>{{ $project->title }}</li>
        @empty
            <li>No projects</li>
        @endforelse
        <a href="{{ route('admin.types.index') }}" class="btn btn-danger">Return</a>
    </section>
@endsection
