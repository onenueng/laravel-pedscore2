@extends('layouts.app')

@section('title','Show CRQ score')

@section('content')

<div class = "col-12 mx-auto mt-2">
<table class="table table-striped">
<tr>ประกาศผลสอบ CRQ ปีการศึกษา
        <!-- <td>@foreach($showcrqs as $row)
               {{$row['academic_year']}}  
            @endforeach
        </td> -->
        </tr>
<tr>ชั้นปีที่ </tr>

  <thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">sap_id</th>
      <th scope="col">fullname</th>
      <th scope="col">academic_year</th>
      <th scope="col">class</th>
      <th scope="col">no.1</th>
      <th scope="col">no.2</th>
      <th scope="col">no.3</th>
      <th scope="col">no.4</th>
      <th scope="col">no.5</th>
      <th scope="col">no.6</th>
      <th scope="col">no.7</th>
      <th scope="col">no.8</th>
      <th scope="col">no.9</th>
      <th scope="col">no.10</th>
      <th scope="col">no.11</th>
      <th scope="col">no.12</th>
      <th scope="col">no.13</th>
      <th scope="col">no.14</th>
      <th scope="col">no.15</th>
      <th scope="col">total</th>
      <th scope="col">percent</th>
    </tr>
  </thead>
  <tbody>
  @foreach($showcrqs as $row)
    <tr>
      <!-- <th scope="row">{{$row['id']}}</th> -->
      <th scope="row">{{$row->sap_id}}</th>
      <td scope="row">{{$row->full_name}}</td>
      <td scope="row">{{$row->academic_year}}</td>
      <td scope="row">{{$row->class}}</td>
      <td scope="row">{{$row->no1}}</td>
      <td scope="row">{{$row->no2}}</td>
      <td scope="row">{{$row->no3}}</td>
      <td scope="row">{{$row->no4}}</td>
      <td scope="row">{{$row->no5}}</td>
      <td scope="row">{{$row->no6}}</td>
      <td scope="row">{{$row->no7}}</td>
      <td scope="row">{{$row->no8}}</td>
      <td scope="row">{{$row->no9}}</td>
      <td scope="row">{{$row->no10}}</td>
      <td scope="row">{{$row->no11}}</td>
      <td scope="row">{{$row->no12}}</td>
      <td scope="row">{{$row->no13}}</td>
      <td scope="row">{{$row->no14}}</td>
      <td scope="row">{{$row->no15}}</td>
      <td scope="row">{{$row->total}}</td>
      <td scope="row">{{$row->percent}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


@endsection