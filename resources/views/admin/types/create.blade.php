@extends('layouts.app')

@section('title', 'Create a New Project')

@section('content')
    <main>
        <section class="container">
            <h1>Add a new Type</h1>
            <div class="row gy-4">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 mx-3">
                                <label for="name" class="form-label">Type Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="insert name" value="{{ old('name') }}">
                            </div>
                            @error('image')
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
