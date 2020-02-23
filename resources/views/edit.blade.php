@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Edit Task</div>

                    <div class="card-body">
                        <form action="{{url('/update/'. $todo->id)}}" id="form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="task">Task</label>
                                <input class="form-control" id="task" type="text" name="task" placeholder="Task" value="{{$todo->task ?? ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input class="form-control" id="category" type="text" name="category" placeholder="Category" value="{{$todo->category ?? ''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <input class="form-control" id="Description" type="text" name="description" placeholder="Description" value="{{$todo->description ?? ''}}" required>
                            </div>

                            <button class="btn btn-primary bg-dark" type="submit" id="save">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
