@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <main>
        <section class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Edit {{ $project->title }}</h1>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-danger">Return</a>
            </div>

            <div class="row gy-4">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 mx-3">
                                <label for="image" class="form-label">Primary Language or Framework:</label>
                                <input type="text" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" placeholder="insert image url"
                                    value="{{ old('image', $project->image) }}">
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3 mx-3">
                                <label for="thumb" class="form-label">Choose an Image:</label>
                                <input type="file" class="form-control @error('thumb') is-invalid @enderror"
                                    id="thumb" name="thumb" placeholder="insert thumb url"
                                    value="{{ old('thumb', $project->thumb) }}">
                            </div>
                            @error('thumb')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3 mx-3">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" value="{{ old('title', $project->title) }}"
                                    class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                    placeholder="insert title" required maxlength="200" minlength="3">
                            </div>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3 mx-3">
                                <label for="type_id" class="form-label">Select Type:</label>
                                <select name="type_id" id="type_id"
                                    class="form-control @error('type_id') is-invalid @enderror">
                                    <option value="">Select a Type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mx-3">
                                <div class="form-group">
                                    <h6>Select technologies:</h6>
                                    @foreach ($technologies as $technology)
                                        <div class="form-check @error('technologies') is-invalid @enderror">
                                            @if ($errors->any('technologies'))
                                                <input type="checkbox" class="form-check-input" name="technologies[]"
                                                    value="{{ $technology->id }}"
                                                    {{ in_array($technology->id, old('technologies', $project->technologies)) ? 'checked' : '' }}>
                                            @else
                                                <input type="checkbox" class="form-check-input" name="technologies[]"
                                                    id="tag {{ $technology->id }}" value="{{ $technology->id }}"
                                                    {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                                            @endif
                                            <label class="form-check-label">

                                                {{ $technology->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-3 mx-3">
                                <label for="description" class="form-label">description:</label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control @error('description') is-invalid @enderror">
                                    {{ old('description', $project->description) }}
                                </textarea>
                            </div>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3 mx-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
