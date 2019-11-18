<div class = "col-12 mx-auto mt-2">
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

    @if(isset($task))
        <form action="{{ url('/tasks',$task->id) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name ="_method" value="PUT">
    @else
        <form action="{{ url('/store') }}" method="POST" enctype="multipart/form-data">
    @endif
        <input type="hidden" name ="_token" value = "{{ csrf_token() }}">

        <div class="card">
        <div class="card-header">
            <h4>Import คะแนนสอบ: </h4>
        </div>
        <div class="card-body">
            <label for="year" class="col-form-label">ปีการศึกษา: </label>
            <div>
                 <input type="text" class="form-control" id="year" name ="year" value="{{ old('year', isset($task)? $task->year : '')}}">
            </div>
        </div>
        <div class="card-body">
            <label for="year" class="col-form-label">วิชา: </label>
            <div>
            <select name="subject" id="subject" class="form-control">
                <option value="" hidden></option>
                    @foreach($subjects as $subject)
                        @if(old('subject', isset($task)? $task->subject : '') == $subject['id'])
                        <option value="{{ $subject['id'] }}" selected>{{ $subject['name'] }}</option>
                        @else
                        <option value="{{ $subject['id'] }}">{{ $subject['name'] }}</option>
                        @endif
                    @endforeach
            </select>
            </div>
        </div>
        <div class="card-body">
        <div class="custom-file">
                <input type="file" class="custom-file-input" id="file_upload" name="file_upload">
                <label class="custom-file-label" for="file_upload">Choose file</label>
            </div>
        </div>
        <div class="row">
                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
        </div>
        
    </form>
</div>