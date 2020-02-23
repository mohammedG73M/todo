<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todos = Todo::where('user_id', '=', Auth::user()->id)->get();
        return view('home', compact('todos'));
    }

    public function create()
    {
        return view('add');
    }

    public function store(Request $request)
    {
        $todo = new Todo;

        $todo->task = $request->input('task');
        $todo->category = $request->input('category');
        $todo->description = $request->input('description');
        $todo->user_id = Auth::user()->id;
        $todo->save();
        return redirect('home');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        if (Auth::user()->id != $todo->user_id) {
            return redirect('home');
        }
        return view('edit', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        if ($todo = Todo::find($id)) {
            if (Auth::user()->id != $todo->user_id) {
                return redirect('home');
            }
            $data = $request->all();
            $todo->task = $data['task'];
            $todo->category = $data['category'];
            $todo->description = $data['description'];
            $todo->save();
        }
        return redirect('home');
    }

    public function delete($id)
    {
        if ($todo = Todo::find($id)) {
            if (Auth::user()->id != $todo->user_id) {
                return redirect('home');
            }
            $todo->delete();
        }
        return redirect('home');
    }
}
