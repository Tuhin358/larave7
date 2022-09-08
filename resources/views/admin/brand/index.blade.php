@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    All Brand


                </div>

                <div class="card-body">

                    @if(session('success'))


                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Brand_image</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php ($i=1)
                            @foreach ($brands  as $brand )
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td> {{ $brand->brand_name }}</td>
                                <td>
                                    <img src="{{asset( $brand->brand_image) }}" style="height:60px; width:80px;" alt=" ">
                                </td>
                                <td>{{ $brand->created_at }}</td>

                              <td>
                                <a href="{{ url('/brand/edit/' .$brand->id) }} " class="btn btn-info" >Edit </a>
                                <a href=" " class="btn btn-danger" >Delete </a>
                              </td>
                            </tr>


                            @endforeach


                            </tbody>
                            {{--  {{ $categories->links() }}  --}}

                      </table>




                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-primary">

                    Add Brand

                </div>
                <div class="card-body">



                    <form action ="{{route('store.brand')}}"  method="POST" enctype="multipart/form-data" >

                        @csrf

                        <div class="form-group">
                          <label for="exampleInputEmail1" >Brand name</label>
                          <input type="text" name="brand_name" class="form-control"
                           id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder=" Brand Name">

                           @error('brand_name')
                           <span class="text-danger"> {{ $message }}</span>

                           @enderror

                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1" >Brand Image</label>
                            <input type="file" name="brand_image" class="form-control"
                             id="exampleInputEmail1" aria-describedby="emailHelp"
                             >

                             @error('brand_image')
                             <span class="text-danger"> {{ $message }}</span>

                             @enderror

                          </div>

                        <button type="submit" class="btn btn-primary"> Add </button>
                      </form>



                </div>
            </div>


        </div>





</div>
@endsection
