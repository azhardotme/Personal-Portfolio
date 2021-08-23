@extends('layouts.admin_layout')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of Services</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Portfolio</li>
        </ol>


        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Big Image</th>
                <th scope="col">Small Image</th>
                <th scope="col">Title</th>
                <th scope="col">Sub Title</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count($portfolio)>0)
                @foreach ($portfolio as $portfolio)
                <tr>
                    <th scope="row">{{$portfolio->id}}</th>
                    <td>
                        <img style="height: 10vh;" src="{{url($portfolio->big_image)}}" alt="Big Image">
                    </td>
                    <td>
                        <img style="height:10vh;" src="{{url($portfolio->small_image)}}" alt="Small Image">
                    </td>
                    <td>{{$portfolio->title}}</td>
                    <td>{{$portfolio->sub_title}}</td>
                    <td>{{Str::limit(strip_tags($portfolio->description),10)}}</td>
                    <td>{{$portfolio->client}}</td>
                    <td>{{$portfolio->category}}</td>
                    <td>
                        <div class="row">
                            <div>
                                <a href="{{route('admin.portfolios.edit',$portfolio->id)}}" class="btn btn-primary m-2">Edit</a>
                            </div>

                            <div>
                                <form action="{{route('admin.portfolios.destroy',$portfolio->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                     <input type="submit" name="submit" value="Delete" class="btn btn-danger m-2">
                                </form>
                            </div>
                    </td>
                    </div>
                  </tr>
                @endforeach
                @endif
            </tbody>
          </table>
</main>
@endsection
