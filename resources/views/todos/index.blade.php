@extends('layouts.app')
@section('title', "Liste des todos")

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow rounded">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Liste des todos</h5>
                        <a href="{{ route('todos.create') }}" class="btn btn-dark">Ajouter une tâche</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tache</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date de création</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($todos as $key => $todo)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $todo->task }}</td>
                                    <td>{{ \Str::limit($todo->description, 25) }}</td>
                                    <td>{{ $todo->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-success btn-sm">Modifier</a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $todo->id }}">Supprimer</button>
                                        <div class="modal fade" id="delete{{ $todo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                             <form action="{{ route('todos.delete', $todo->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <div class="modal-header bg-danger">
                                                  <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Suppression de ressource</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <p>
                                                    Voulez-vous vraiment supprimer la tâche : <strong>{{ $todo->task }}</strong> ?
                                                  </p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                  <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </div>
                                             </form>
                                            </div>
                                          </div>
                                        </div>

                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                    <div class="card-footer">
                      {{ $todos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
