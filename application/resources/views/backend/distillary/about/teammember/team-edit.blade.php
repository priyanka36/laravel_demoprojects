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
                    <h6 class="br-section-label">HomePage Edit </h6>

                    <form action="{{ route('backend.updateTeamDetail',$teamEditDetail->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token"
                               value="{{csrf_token()}}">
                        <div class="form-layout form-layout-1">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-control-label">Name:</label>
                                    <input type="text" name="name" class="form-control"value="{{$teamEditDetail->name}}">

                                    @if($errors->first('name'))
                                        <div class="text-danger">  {{$errors->first('name')  }} </div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label class="form-control-label">Designation:</label>
                                    <input type="text" name="designation" class="form-control"value="{{$teamEditDetail->designation}}">

                                    @if($errors->first('designation'))
                                        <div class="text-danger">  {{$errors->first('designation')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label">  Photo:</label>
                                    <input type="file" name="member_photo"  class="form-control">
                                    <img src="{{ asset('uploads/team-photos/'.$teamEditDetail->member_photo) }}" alt="" style="width:150px;">

                                </div>
                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label"> Description:</label>
                                     <textarea name="description" class="form-control "  required rows="20" cols="20"   name="description">{{$teamEditDetail->description}}
                 </textarea>

                                    @if($errors->first('description'))
                                        <div class="text-danger ">   {{$errors->first('description')  }} </div>
                                    @endif


                                </div><!-- row -->

                                <hr>
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="{{ route('backend.teamList') }}" class="btn btn-warning">Cancel</a>
                                </div><!-- form-layout-footer -->
                            </div><!-- form-layout -->
                        </div></form>


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
