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
                    <h6 class="br-section-label">Gin Edit </h6>

                    <form action="{{ route('backend.updateGinDetail',$ginEditDetail->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token"
                               value="{{csrf_token()}}">
                        <div class="form-layout form-layout-1">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-control-label"> Name:</label>
                                    <input type="text" name="name" class="form-control"value="{{$ginEditDetail->name}}">

                                    @if($errors->first('name'))
                                        <div class="text-danger">  {{$errors->first('name')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label"> Background Photo:</label>
                                    <input type="file" name="gin_photo"  class="form-control">
                                    <img src="{{ asset('uploads/gin-photos/'.$ginEditDetail->gin_photo) }}" alt="" style="width:150px;">  @if($errors->first('gin_photo'))
                                        <div class="text-danger ">   {{$errors->first('gin_photo')  }} </div>
                                    @endif
                                </div>

                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label">  Description:</label>
                                    <textarea name="description" class="form-control "  required rows="3" cols="90"   name="description">{!! $ginEditDetail->description!!}
                 </textarea>

                                    @if($errors->first('description'))
                                        <div class="text-danger ">   {{$errors->first('description')  }} </div>
                                    @endif
                                </div>

                                <hr>
                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label">  About:</label>
                                    <textarea name="about" class="form-control "  required rows="3" cols="90"   name="about">{!! $ginEditDetail->about!!}
                 </textarea>

                                    @if($errors->first('about'))
                                        <div class="text-danger ">   {{$errors->first('about')  }} </div>
                                    @endif

                                    <hr>
                                    <div class="form-layout-footer">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <a href="{{ route('backend.ginList') }}" class="btn btn-warning">Cancel</a>
                                    </div> <!-- form-layout-footer -->
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
