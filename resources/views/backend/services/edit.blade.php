@extends('layouts.admin_layout')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Service</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Services</li>
        </ol>

        <form action="{{route('admin.service.update',$service->id)}}" method="POST" enctype="multipart/form-data">
          @csrf

         <div class="row">
             <div class="form-group col-md-4 mt-3">
                <div class="mb-2">
                    <lebel for="icon"><h4>Icon</h4></lebel>
                    <input type="text" class="form-controll" id="icon" name="icon" value="{{$service->icon}}">
                </div>
            <div class="mb-3">
                <lebel for="title"><h4>Title</h4></lebel>
                <input type="text" class="form-controll" id="title" name="title" value="{{$service->title}}">
            </div>
            <div class="mb-3">
                <lebel for="description"><h4>Description</h4></lebel>
                <textarea type="text" class="form-controll" id="description" name="description">{{$service->description}}</textarea>

            </div>
             </div>
         </div>
         <input type="submit" name="submit" class="btn btn-primary mt-5" value="Update">
    </div>
</form>
</main>
@endsection
