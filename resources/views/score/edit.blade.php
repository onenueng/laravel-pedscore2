@extends ('layouts.app')
 
@section('title','Edit Task')

@section('content')
    @if($message = Session::get('success'))
        <div class = "aleart aleart-success">
            {{ $message }}
        </div>
    @endif($error->any())

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('/tasks',$task->id) }}" method="POST">
       
        <input type="hidden" name ="_method" value="PUT">
        <input type="hidden" name ="_token" value = "{{ csrf_token() }}">

        <div class="card">
        <div class="card-header">
            <h4>Import คะแนนสอบ : Edit</h4>
        </div>
        <div class="card-body">
            <label for="year" class="col-form-label">ปีการศึกษา: </label>
            <div>
                 <input type="text" class="form-control" id="year" name ="year" value="{{ old('year',$task->year) }}">
            </div>
        </div>
        <div class="card-body">
            <label for="year" class="col-form-label">วิชา: </label>
            <div>
            <select name="subject" id="subject" class="form-control">
                <option value="" hidden></option>
                    @foreach($subjects as $subject)
                        @if(old('subject',$task->subject) == $subject['id'])
                        <option value="{{ $subject['id'] }}" selected>{{ $subject['name'] }}</option>
                        @else
                        <option value="{{ $subject['id'] }}">{{ $subject['name'] }}</option>
                        @endif
                    @endforeach
            </select>
            </div>
        </div>
        <div class="row">
                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
        </div>
        
    </form>


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