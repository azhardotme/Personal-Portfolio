@extends('layouts.admin_layout')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List of About</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">List of About</li>
        </ol>


        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title 1</th>
                <th scope="col">Title 2</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count($about)>0)
                @foreach ($about as $about)
                <tr>
                    <th scope="row">{{$about->id}}</th>
                    <td>
                        <img style="height: 20vh;" src="{{url($about->image)}}" alt="Image">
                    </td>
                    <td>{{$about->title1}}</td>
                    <td>{{$about->title2}}</td>
                    <td>{{Str::limit(strip_tags($about->description),20)}}</td>
                    <td>
                        <div class="row">
                            <div>
                                <a href="{{route('admin.about.edit',$about->id)}}" class="btn btn-primary m-2">Edit</a>
                            </div>

                            <div>
                                <form action="{{route('admin.about.destroy',$about->id)}}" method="POST">
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
