@extends('master-layouts.backend.master-layouts')

@section('main-content')

    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('dashboard') }}">Home</a>
                <span class="breadcrumb-item active">Welcome</span>
            </nav>
        </div>
        <div class="br-pagetitle">
            <div class="br-pagebody">
                <div class="br-section-wrapper">
                    <h6 class="br-section-label">HOME PAGE</h6>

                    <form action="{{ route('backend.homepageStore') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token"
                               value="{{csrf_token()}}">
                        <div class="form-layout form-layout-1">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-control-label"> Name:</label>
                                    <input type="text" name="name" class="form-control">

                                    @if($errors->first('name'))
                                        <div class="text-danger ">   {{$errors->first('name')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label">  Photo:</label>
                                    <input type="file" name="bg_photo"  class="form-control">
                                    @if($errors->first('bg_photo'))
                                        <div class="text-danger ">   {{$errors->first('bg_photo')  }} </div>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label"> Description:</label>
                                    <input type="text" name="description"  class="form-control">
                                    @if($errors->first('description'))
                                        <div class="text-danger ">   {{$errors->first('description')  }} </div>
                                    @endif
                                </div>



                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label"> Active Status:</label>
                                    <input type="radio" name="active_status" value="1"  checked>Active
                                    <input type="radio" name="active_status" value="0" >In Active

                                </div>

                            </div><!-- row -->
                            <hr>
                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('backend.homepageList') }}" class="btn btn-warning">Cancel</a>
                            </div><!-- form-layout-footer -->
                        </div><!-- form-layout -->
                    </form>


                </div><!-- br-section-wrapper -->
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
