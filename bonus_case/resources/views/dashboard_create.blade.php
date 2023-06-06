@extends('layouts.main')

@section('title', 'Create Instance')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Create Instance</h1>
                <form action="{{ route('instance.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Instance Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            aria-describedby="nameHelp" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (session('error'))
                            <div class="invalid-feedback">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Instance City</label>
                        <input name="city" type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                            aria-describedby="cityHelp" value="{{ old('city') }}">
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (session('error'))
                            <div class="invalid-feedback">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
