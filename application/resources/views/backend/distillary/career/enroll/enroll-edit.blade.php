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
                    <h6 class="br-section-label">Enroll</h6>

                    <form action="{{ route('backend.updateEnrollDetail',$enrollEditDetail->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token"
                               value="{{csrf_token()}}">
                        <div class="form-layout form-layout-1">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-control-label"> Designation:</label>
                                    <input type="text" name="designation" class="form-control" value="{!! $enrollEditDetail->designation !!}">

                                    @if($errors->first('designation'))
                                        <div class="text-danger ">   {{$errors->first('designation')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label"> Name:</label>
                                    <input type="text" name="name" class="form-control" value="{!! $enrollEditDetail->name !!}">

                                    @if($errors->first('name'))
                                        <div class="text-danger ">   {{$errors->first('name')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label">  Phone:</label>
                                    <input type="text" name="phone"  class="form-control"value="{!! $enrollEditDetail->phone !!}">
                                    @if($errors->first('phone'))
                                        <div class="text-danger ">   {{$errors->first('phone')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label"> Address:</label>
                                    <input type="text" name="address"  class="form-control"value="{!! $enrollEditDetail->address !!}">
                                    @if($errors->first('address'))
                                        <div class="text-danger ">   {{$errors->first('address')  }} </div>
                                    @endif
                                </div>


                                <div class="col-12">
                                    <label class="form-control-label"> Email:</label>
                                    <input type="email" name="email"  class="form-control"value="{!! $enrollEditDetail->email !!}">
                                    @if($errors->first('email'))
                                        <div class="text-danger ">   {{$errors->first('email')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label"> Upload your CV:</label>{!! $enrollEditDetail->cv !!}
                                    <input type="file" name="cv"  class="form-control">
                                    <img src="{{ asset('uploads/enroll-photos/'.$enrollEditDetail->cv) }}" alt="" style="width:150px;">
                                    @if($errors->first('cv'))
                                        <div class="text-danger ">   {{$errors->first('cv')  }} </div>
                                    @endif
                                </div>



                                <div class="col-40">
                                    <br>
                                    <label class="form-control-label">  Message:</label>
                                    <textarea name="message" class="form-control "  required rows="30" cols="90"   name="message">{!! $enrollEditDetail->message !!}
                 </textarea>

                                    @if($errors->first('message'))
                                        <div class="text-danger ">   {{$errors->first('message')  }} </div>
                                    @endif
                                </div>









                            </div><!-- row -->
                            <hr>
                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('backend.enrollList') }}" class="btn btn-warning">Cancel</a>
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
