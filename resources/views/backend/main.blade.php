@extends('layouts.admin_layout')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Main</li>
        </ol>

        <form action="{{route('admin.main.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}

         <div class="row">
             <div class="form-group col-md-3 mt-3">
                <h3>Background Image</h3>
                 <img  style="height:30vh" src="{{url($main->bc_img)}}" class="img-thumbnail">

                 <input type="file" class="mt-3" id="bc_img" name="bc_img">
             </div>
             <div class="form-group col-md-4 mt-3">

            <div class="mb-3">
                <lebel for="title"><h4>Title</h4></lebel>
                <input type="text" class="form-controll" id="title" name="title" value="{{$main->title}}">

            </div>

            <div class="mb-5">
                <lebel for="sub_title"><h4>Sub Title</h4></lebel>
                <input type="text" class="form-controll" id="sub_title" name="sub_title" value="{{$main->sub_title}}">
            </div>

            <div>
                <h4>Upload Resume</h4>
                <input class="mt-2" type="file" class="mt-2" id="resume" name="resume">
            </div>
             </div>
         </div>
         <input type="submit" name="submit" class="btn btn-primary mt-5" value="Submit">
    </div>
</form>
</main>
@endsection
