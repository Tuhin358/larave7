@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    All Category


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
                            <th scope="col">Added By</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php ($i=1)
                            @foreach ($categories  as $category )
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td> {{ $category->category_name }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>

                              <td>
                                <a href="{{ url('Category/Edit/'.$category->id) }} " class="btn btn-info" >Edit </a>
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

                    Add Category

                </div>
                <div class="card-body">



                    <form action ="{{route('store.category')}}"  method="POST">

                        @csrf

                        <div class="form-group">
                          <label for="exampleInputEmail1" >Add Category</label>
                          <input type="text" name="category_name" class="form-control"
                           id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Enter Category">

                           @error('category_name')
                           <span class="text-danger"> {{ $message }}</span>

                           @enderror



                        </div>


                        <button type="submit" class="btn btn-primary"> Add </button>
                      </form>



                </div>
            </div>


        </div>


{{--
        Trash list  --}}

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Trash List


                </div>

                <div class="card-body">

                    @if(session('success'))


                    {{--  <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>  --}}
                      @endif
                    <table class="table  table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php ($i=1)
                            @foreach ($trashCat  as $category )
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td> {{ $category->category_name }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at }}</td>


                              <td>
                                  <a href="{{ url('Category/Edit/'.$category->id) }} " class="btn btn-info" >Edit </a>
                                <a href="{{ url('Softdelete/Category/'.$category->id) }}" class="btn btn-danger" >Delete </a>
                              </td>
                            </tr>


                            @endforeach


                            </tbody>
                      </table>
                        {{--  {{ $categories->links() }}  --}}




                </div>
            </div>
        </div>

        <div class="col-md-3"> </div>

    </div>



</div>
@endsection
