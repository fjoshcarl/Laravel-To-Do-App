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

        <form method="POST" id="delete-form" action="todos/{{$todo->id}}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger mt-2" onclick="return alert('Are you sure you want to delete the item?')">Delete</a>
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
