<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $todos = Todo::paginate(2);
        return view('todos.index', compact('todos'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * store
     *
     * @return void
     */
    public function store(Request $request) {
        $request->validate([
            'task' => 'required|min:2',
            'description' => 'required'
        ]);

        $todo = new Todo();
        $todo->task = $request->task;
        $todo->description = $request->description;

        $todo->save();
        notify()->success("La tache a été crée avec succès");
        return redirect()->route('todos');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'task' => 'required|min:2',
            'description' => 'required'
        ]);
        $todo = Todo::find($id);
        $todo->task = $request->task;
        $todo->description = $request->description;
        $todo->save();
        notify()->success("La tache a été modifiée avec succès");
        return redirect()->route('todos');
    }

    public function delete($id){
        Todo::destroy($id);
        notify()->success("La tache a été supprimée avec succès");
        return back();
    }
}
