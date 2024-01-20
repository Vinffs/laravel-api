@extends('layouts.app')

@section('title', 'Edit type')

@section('content')
    <main>
        <section class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Edit {{ $type->title }}</h1>
                <a href="{{ route('admin.types.index') }}" class="btn btn-danger">Return</a>
            </div>

            <div class="row gy-4">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('admin.types.update', $type->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 mx-3">
                                <label for="name" class="form-label">Add Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="insert name"
                                    value="{{ old('name', $type->name) }}">
                            </div>
                            @error('name')
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
