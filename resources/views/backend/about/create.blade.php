@extends('layouts.admin_layout')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create a new About</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">About</li>
        </ol>

        <form action="{{route('admin.about.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}

         <div class="row">

             <div class="form-group col-md-3 mt-3">
                <h3>Image</h3>
                 <img  style="height:30vh" src="{{asset('Backend/assets/img/big_image.jpg')}}" class="img-thumbnail">
                 <input type="file" class="mt-3" name="image">
             </div>

             <div class="form-group col-md-4 mt-3">
                <div class="mb-3">
                    <lebel for="title"><h4>Title 1</h4></lebel>
                    <input type="text" class="form-controll" id="title1" name="title1" value="">
                </div>

                <div class="mb-4">
                    <lebel for="sub_title"><h4>Title 2</h4></lebel>
                    <input type="text" class="form-controll" id="title2" name="title2" value="">
                 </div>

             <div class="form-group col-md-3 mt-3">
                 <h3>Description</h3>
                 <textarea class="form-controll" name="description"  cols="70" rows="5" name="description"></textarea>
             </div>
             </div>

         </div>
         <input type="submit" name="submit" class="btn btn-primary my-5" value="Submit">
    </div>
</form>
</main>
@endsection
