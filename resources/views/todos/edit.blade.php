@extends('layouts.app')
@section('title', "Modifier une tache")

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow rounded">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Modifier une tache</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todos.update', $todo->id) }}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="form-group mb-3">
                                <label for="task">Votre tache:</label>
                                <input type="text" name="task" id="task" class="form-control @error('task') is-invalid @enderror" value="{{ $todo->task }}">
                                @error('task')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Décrivez votre tache</label>
                                <textarea name="description" id="description" cols="30" rows="6"
                                class="form-control @error('description') is-invalid @enderror">{{ $todo->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark w-100 ">Modifier la tache</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
