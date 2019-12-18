@extends('layouts.app')

@section('title','Show CRQ score')

@section('content')

<div class = "col-12 mx-auto mt-2">
<table class="table table-striped">
<tr>ประกาศผลสอบ CRQ ปีการศึกษา  </tr>
<tr>ชั้นปีที่ </tr>

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  @foreach($showcrqs as $row)
    <tr>
      <th scope="row">{{$row['sap_id']}}</th>
      <td scope="row">{{$row['fullname']}}</td>
      <td scope="row">{{$row['supject']}}</td>
      <td scope="row">{{$row['academic_year']}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


@endsection