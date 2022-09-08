@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">


        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-primary">
                    Edit Brand
                </div>

                <div class="card-body">


                    <form action ="{{ url('/update/brand/' .$brands->id) }} "
                         method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="old_image " value="{{ $brands->brand_image }}"

                        <div class="form-group">
                          <label for="exampleInputEmail1" >Brand Name</label>
                          <input type="text" name="brand_name" class="form-control"
                           id="exampleInputEmail1" aria-describedby="emailHelp"
                           value="{{ $brands->brand_name }}">

                           @error('brand_name')
                           <span class="text-danger"> {{ $message }}</span>
                           @enderror



                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1" >Brand Image</label>
                            <input type="file" name="brand_image" class="form-control"
                             id="exampleInputEmail1" aria-describedby="emailHelp"
                             value="{{ $brands->brand_name }}">

                             @error('brand_image')
                             <span class="text-danger"> {{ $message }}</span>

                             @enderror
                          </div>


                     <div class="form-group">
                           {{--  <img src ="{{ url($brands->brand_image) }} style="height:60px; width:80px;" alt= " ">  --}}

                           <img src="{{asset($brands->brand_image) }}" style="height:60px; width:80px;" alt=" ">


                          </div>




                        <button type="submit" class="btn btn-primary"> Add </button>
                      </form>





                </div>
            </div>
        </div>



    </div>
</div>

@endsection


