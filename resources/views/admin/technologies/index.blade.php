@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between align-items-center my-2">
            <h1>TECHNOLOGY LIST</h1>
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Add a Project</a>
        </div>


        <table class="table table-hover">
            <thead>
                <tr class="text-center no-display">
                    <th scope="col">
                        <h6 class="text-start text-dark-emphasis">Language/Framework</h6>
                    </th>
                    <th scope="col">
                        <h6 class="text-dark-emphasis">Project Name</h6>
                    </th>
                    <th scope="col">
                        <h6 class="text-dark-emphasis">Description</h6>
                    </th>
                    <th scope="col">
                        <h6 class="text-dark-emphasis">Actions</h6>
                    </th>
                </tr>
            </thead>
            <tbody class="fs-6">
                @foreach ($technologies as $technology)
                    <tr class="text-center no-display">
                        <th scope="row" class="text-start fw-normal">
                            <img class="avatar" width="30" height="30"
                                src="{{ Vite::asset("public/img/$technology->image.svg") }}"
                                alt="{{ $technology->image }}" />
                        </th>
                        <td>{{ $technology->title }}</td>
                        <td>{{ $technology->description }}</td>
                        <td>
                            <a class="btn border" href="{{ route('admin.technologies.show', $technology->id) }}"><i
                                    class="fa-solid fa-circle-info"></i></a>
                            <a class="btn border" href="{{ route('admin.technologies.edit', $technology->id) }}"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <form class="d-inline" action="{{ route('admin.technologies.destroy', $technology->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cancel-button btn btn-danger"
                                    data-item-title="{{ $technology->title }}"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('partials.modal_delete');
@endsection
