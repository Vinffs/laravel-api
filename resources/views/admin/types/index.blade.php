@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between align-items-center my-2">
            <h1>TYPE LIST</h1>
            <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Add a Type</a>
        </div>


        <table class="table table-hover">
            <thead>
                <tr class="text-center no-display">
                    <th scope="col">
                        <h6 class="text-start text-dark-emphasis">#</h6>
                    </th>
                    <th scope="col">
                        <h6 class="text-dark-emphasis">Type Name</h6>
                    </th>
                    <th scope="col">
                        <h6 class="text-dark-emphasis">Actions</h6>
                    </th>
                </tr>
            </thead>
            <tbody class="fs-6">
                @foreach ($types as $type)
                    <tr class="text-center no-display">
                        <th scope="row" class="text-start fw-normal">
                            {{ $type->id }}
                        </th>
                        <td>{{ $type->name }}</td>
                        <td>
                            <a class="btn border" href="{{ route('admin.types.show', $type->slug) }}"><i
                                    class="fa-solid fa-circle-info"></i></a>
                            <a class="btn border" href="{{ route('admin.types.edit', $type->slug) }}"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <form class="d-inline" action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="cancel-button btn btn-danger"
                                    data-item-title="{{ $type->name }}"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    @include('partials.modal_delete');
@endsection
