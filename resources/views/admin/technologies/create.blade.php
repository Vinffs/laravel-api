@extends('layouts.app')

@section('title', 'Create a New Technology')

@section('content')
    <main>
        <section class="container">
            <h1>Add a new technology</h1>
            <div class="row gy-4">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 mx-3">
                                <label for="image" class="form-label">Primary Language or Framework:</label>
                                <input type="text" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" placeholder="insert image url"
                                    value="{{ old('image') }}">
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3 mx-3">
                                <label for="thumb" class="form-label">Choose an Image:</label>
                                <input type="file" class="form-control @error('thumb') is-invalid @enderror"
                                    id="thumb" name="thumb" placeholder="insert thumb url"
                                    value="{{ old('thumb') }}">
                            </div>
                            @error('thumb')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3 mx-3">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" value="{{ old('title') }}"
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
                                            {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3 mx-3">
                                <label for="description" class="form-label">description:</label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                    class="form-control @error('description') is-invalid @enderror">
                                    {{ old('description') }}
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
