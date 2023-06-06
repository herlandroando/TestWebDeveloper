@extends('layouts.main')

@section('title', 'Edit Instance')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Instance</h1>
                <form action="{{ route('instance.update', $instance->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Instance Name</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            aria-describedby="nameHelp" value="{{ old('name') ?? $instance->name }}">
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
                            aria-describedby="cityHelp" value="{{ old('city') ?? $instance->city }}">
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
