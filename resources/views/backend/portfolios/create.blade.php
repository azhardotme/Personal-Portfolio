@extends('layouts.admin_layout')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create a new Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Portfolio</li>
        </ol>

        <form action="{{route('admin.portfolios.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}

         <div class="row">

             <div class="form-group col-md-3 mt-3">
                <h3>Big Image</h3>
                 <img  style="height:30vh" src="{{asset('Backend/assets/img/big_image.jpg')}}" class="img-thumbnail">
                 <input type="file" class="mt-3" name="big_image">
             </div>

             <div class="form-group col-md-3 mt-3">
                <h3>Small Image</h3>
                 <img  style="height:20vh" src="{{asset('Backend/assets/img/small_image.jpg')}}" class="img-thumbnail">
                 <input type="file" class="mt-3" name="small_image">
             </div>

             <div class="form-group col-md-3 mt-3">
                 <h3>Description</h3>
                 <textarea class="form-controll" name="description"  cols="70" rows="5" name="description"></textarea>

             </div>

             <div class="form-group col-md-4 mt-3">
            <div class="mb-3">
                <lebel for="title"><h4>Title</h4></lebel>
                <input type="text" class="form-controll" id="title" name="title" value="">
            </div>

            <div class="mb-4">
                <lebel for="sub_title"><h4>Sub Title</h4></lebel>
                <input type="text" class="form-controll" id="sub_title" name="sub_title" value="">
             </div>

             </div>

             <div class="form-group col-md-4 mt-3">
                <div class="mb-3">
                    <lebel for="category"><h4>Client</h4></lebel>
                    <input type="text" class="form-controll"  name="client" value="">
                </div>

                <div class="mb-3">
                    <lebel for="category"><h4>Category</h4></lebel>
                    <input type="text" class="form-controll" name="category" value="">
                 </div>

                 </div>
         </div>
         <input type="submit" name="submit" class="btn btn-primary my-5" value="Submit">
    </div>
</form>
</main>
@endsection
