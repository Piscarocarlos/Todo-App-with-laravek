
@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container">
    <div class="row mt-2">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow rounded-3">
                <div class="card-body">
                    <form action="{{ route('send_contact') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="subject">Sujet:</label>
                            <input type="text" name="subject" id="subject" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">Content:</label>
                            <textarea name="content" id="content" rows="6" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark w-100">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
