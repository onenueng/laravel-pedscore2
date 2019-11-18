@extends('layouts.app')

@section('title','Resident Score')

@section('content')

@include('score._form')

<div class = "col-12 mx-auto mt-2">
<table class="table">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">year</th>
      <th scope="col">Subject</th>
      <th scope="col">file_upload</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
  @foreach($tasks as $task)
    <tr>
      <th>{{$task->id}}</th>
      <td>{{$task->year}}</td> 
      <td>{{$task->getSubjectName()}}</td> 
      <td><a href="{{ url('storage/' .$task->file_upload)}}">คลิ๊กเพื่อดู File</a></td>
      <td>
      <a class="btn btn-sm btn-success" role="button" href="{{ url('/tasks', $task->id) }}">Edit</a>
      <form id="delete-task-{{ $task->id }}" action="/tasks/{{ $task->id }}" method="POST" style="display: none;">
            @csrf
            @method('delete')
      </form>
      @if(!$task->status)
        <button 
          class ="btn btn-sm btn-danger"
          onclickk="document.getElementById('delete-task-{{ $task->id }}').submit()"
        >Delete</button>
      @endif 
    </td>     </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection

@section('js')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@endsection