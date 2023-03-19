<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    // My Todo App Home Controller
    public function index(){
        $todos = Todo::all();
        return view('todos.index',compact('todos'));
    }

    // My Todo App Create Controller
    public function create(TodoRequest $request){
        Todo::create([
            'title' => $request->title,
            'details' => $request->details,
            'date' => $request->date
        ]);
        $request->session()->flash('message', 'List Created Successfully!');
        return to_route('todos.index');
    }

    // My Todo App Edit Controller
    public function edit($id)
    {
        $todos = Todo::find($id);
        return view('todos.edit',compact('todos'));
    }

    // My Todo App Update Controller
    public function update(TodoRequest $request,$id){
        $todos = Todo::find($id);
        $todos-> title = $request-> title;
        $todos-> details = $request-> details;
        $todos-> date = $request-> date;
        $todos-> save();
        $request->session()->flash('message', 'List Updated Successfully!');
        return to_route('todos.index');
    }

    // My Todo App Delete Controller
    public function delete($id){
        $todo = Todo::find($id);
        $todo->delete();
        return to_route('todos.index');
    }
}


