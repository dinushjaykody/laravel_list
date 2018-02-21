<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('todos')->with('todos',$todos);
    }

    public function store(Request $request)
    {
       $todo =  new Todo();

       $todo->todo = $request->todo;
       $todo->save();

       Session::flash('success' , 'Item created successfully !!!');
       return redirect()->back();
    }

    public function delete($id)
    {
        $todo = Todo::find($id);

        if($todo) {
            $todo->delete();
        }

        Session::flash('success' , 'Item deleted successfully !!!');
        return redirect()->back();
    }

    public function update($id)
    {

        $todo = Todo::find($id);

        if($todo) {

            return view('update')->with('todo' , $todo);
        }
    }

    public function save(Request $request , $id)
    {

        $todo = Todo::find($id);

        if($todo) {
            if($request->todo) {
                $todo->todo = $request->todo;
                $todo->save();

                Session::flash('success' , 'Item updated successfully !!!');
                return redirect()->route('todos');
            }
        }
    }

    public function completed($id)
    {
        $todo = Todo::find($id);

        if($todo) {
            $todo->completed = 1;
            $todo->save();

            Session::flash('success' , 'Item marked as completed !!!');
            return redirect()->route('todos');
        }

    }
}
