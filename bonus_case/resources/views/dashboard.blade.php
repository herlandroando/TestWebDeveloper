@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Welcome, {{ auth()->user()->name }}</h1>
                <p>Logout <a href="{{ route('logout') }}">here</a></p>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            {{-- Table Instances --}}
            <div class="col-12">
                <h2>Instances</h2>
                {{-- Search --}}
                <form action="{{ route('dashboard') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="q" aria-label="Search"
                            value="{{ request('q') }}">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
                {{-- create instance --}}
                <a href="{{ route('instance.create') }}" class="btn btn-primary">Create Instance</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Instance ID</th>
                            <th scope="col">Instance Name</th>
                            <th scope="col">Instance City</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instances as $instance)
                            <tr>
                                <th scope="row">{{ $instance->id }}</th>
                                <td>{{ $instance->name }}</td>
                                <td>{{ $instance->city }}</td>
                                <td>
                                    {{-- <a href="{{ route('instance.show', $instance->id) }}" class="btn btn-primary">View</a> --}}
                                    <a href="{{ route('instance.edit', $instance->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('instance.destroy', $instance->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $instances->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection
