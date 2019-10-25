@extends('layouts.app')
@section('content')
  <h3 class="text-center">Edit Todo</h3>
  <form action="{{route('todos.update',$todo->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Todo Title</label>
      <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') ? : $todo->title }}"
      placeholder="Enter Title">
      @if($errors->has('title'))
        <span class="invalid-feedback">
          {{$errors->first('title')}}
        </span>
      @endif
    </div>
    <div class="form-group">
      <label for="body">Todo Description</label>
      <textarea name="body" id="body" rows="4" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
        placeholder="Enter Todo Description">{{ old('body') ? : $todo->body }}</textarea>
      @if($errors->has('body'))
        <span class="invalid-feedback">
          {{$errors->first('body')}}
        </span>
      @endif
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection
