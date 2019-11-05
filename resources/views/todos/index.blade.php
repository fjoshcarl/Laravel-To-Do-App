@extends('layouts.app')
@section('content')
  <h2 class="text-center">All Todos</h2>

  <!-- START -->

  <table class="table table-borderless text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Time created</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @forelse($todos as $todo)
      <td>{{$todo->title}}</td>
      <td>
        {{str_limit($todo->body,20)}}
        <br />
        <a href="{{route('todos.show',$todo->id)}}">Read More</a>
      </td>
      <td>{{$todo->created_at->diffForHumans()}}</td>
      <td>
        <a href="{{route('todos.edit',$todo->id)}}" class="btn btn-primary">Update</a>
        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal{{$todo->id}}">Delete</a>

        <div class="clearfix"></div>
        <div class="modal fade" id="deletemodal{{$todo->id}}">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Todo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form{{$todo->id}}').submit()">Proceed</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
          </div>
        </div>

        <form method="POST" id="delete-form{{$todo->id}}" action="todos/{{$todo->id}}">
          @csrf
          @method('DELETE')
        </form>

      </td>
    </tr>
    @empty
      <tr>
        <td colspan="4">
          <h4 class="text-center">No Todos Found!</h4>
        </td>
      </tr>
    @endforelse
  </tbody>
</table>
<div class="d-flex justify-content-center">
  {{$todos->links('vendor.pagination.bootstrap-4')}}
</div>


@endsection
