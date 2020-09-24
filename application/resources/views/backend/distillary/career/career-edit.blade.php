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
                    <h6 class="br-section-label">Careers</h6>

                    <form action="{{ route('backend.updateCareerDetail',$careerEditDetail->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token"
                               value="{{csrf_token()}}">
                        <div class="form-layout form-layout-1">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-control-label"> Title:</label>
                                    <input type="text" name="title" class="form-control" value="{{$careerEditDetail->title}}">

                                    @if($errors->first('title'))
                                        <div class="text-danger ">   {{$errors->first('title')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label">  Location:</label>
                                    <input type="text" name="location"  class="form-control" value="{{$careerEditDetail->location}}">
                                    @if($errors->first('location'))
                                        <div class="text-danger ">   {{$errors->first('location')  }} </div>
                                    @endif
                                </div>

                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label">  Job Description:</label>
                                    <textarea name="description" class="form-control "  required rows="3" cols="90"   name="description">{!! $careerEditDetail->description!!}
                 </textarea>

                                    @if($errors->first('description'))
                                        <div class="text-danger ">   {{$errors->first('description')  }} </div>
                                    @endif
                                </div>



                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label">  Job Requirement:</label>
                                    <textarea name="requirement" class="form-control "  required rows="3" cols="90"   name="requirement">{!! $careerEditDetail->requirement!!}
                 </textarea>

                                    @if($errors->first('requirement'))
                                        <div class="text-danger ">   {{$errors->first('requirement')  }} </div>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label"> Desired Skills:</label>
                                     <textarea name="skills" class="form-control "  required rows="3" cols="90"   name="skills">{!! $careerEditDetail->skills !!}
                 </textarea>

                                    @if($errors->first('skills'))
                                        <div class="text-danger ">   {{$errors->first('skills')  }} </div>
                                    @endif
                                </div>

                            </div><!-- row -->
                            <hr>
                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('backend.careerList') }}" class="btn btn-warning">Cancel</a>
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
