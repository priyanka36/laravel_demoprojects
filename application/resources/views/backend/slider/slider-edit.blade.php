@extends('master-layouts.backend.master-layouts')

@section('main-content')

    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('dashboard') }}">Home</a>
                <span class="breadcrumb-item active">Slider</span>
            </nav>
        </div>
        <div class="br-pagetitle">
            <div class="br-pagebody">
                <div class="br-section-wrapper">
                    <h6 class="br-section-label">Edit Slider</h6>

                    <form action="{{ route('backend.updateSliderDetail',$sliderEditDetail->id) }}" method="post"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-layout form-layout-1">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-control-label"> Title:</label>
                                    <input type="text" name="title" class="form-control" value="{{$sliderEditDetail->title}}">  @if($errors->first('title'))
                                        <div class="text-danger ">   {{$errors->first('title')  }} </div>
                                    @endif


                                </div>

                                <div class="col-12">
                                    <label class="form-control-label"> Photo:</label>
                                    <input type="file" name="photo"  class="form-control" >
                                    <img src="{{ asset('uploads/slider-photos/'.$sliderEditDetail->photo) }}" alt="" style="width:150px;">  @if($errors->first('photo'))
                                        <div class="text-danger ">   {{$errors->first('photo')  }} </div>
                                    @endif

                                </div>
                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label"> Active Status:</label>
                                    <input type="radio" name="active_status" value="1" {{ $sliderEditDetail->active_status == "1"?'checked':''}}>Active
                                    <input type="radio" name="active_status" value="0" {{ $sliderEditDetail->active_status == "0"?'checked':''}}>InActive

                                </div>



                            </div><!-- row -->

                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info">Save</button>
                                <a href="{{ route('backend.sliderList') }}" class="btn btn-danger">Cancel</a>
                            </div><!-- form-layout-footer -->
                        </div>
                    </form>


                </div>
                <!-- br-section-wrapper -->
            </div>
        </div>

        <div class="br-pagebody">


        </div>

    </div>
@endsection
@section('additional-js')
    <script src="{{asset('assets/backend/ckeditor/ckeditor.js')}}"></script>


    <script>
        CKEDITOR.replace( '.ckeditor' );
    </script>


@endsection