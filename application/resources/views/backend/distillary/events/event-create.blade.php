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
                    <h6 class="br-section-label">Events</h6>

                    <form action="{{ route('backend.eventStore') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token"
                               value="{{csrf_token()}}">
                        <div class="form-layout form-layout-1">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-control-label"> Event name:</label>
                                    <input type="text" name="eventname" class="form-control" value="{!! old('eventname') !!}">

                                    @if($errors->first('eventname'))
                                        <div class="text-danger ">   {{$errors->first('eventname')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label"> Background Photo:</label>
                                    <input type="file" name="bg_photo"  class="form-control">
                                    @if($errors->first('bg_photo'))
                                        <div class="text-danger ">   {{$errors->first('bg_photo')  }} </div>
                                    @endif
                                </div>



                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label">  Description:</label>
                                    <textarea name="description" class="form-control "  required rows="3" cols="90"   name="description">{!! old('description') !!}
                 </textarea>

                                    @if($errors->first('description'))
                                        <div class="text-danger ">   {{$errors->first('description')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label"> Address:</label>
                                    <input type="text" name="address"  class="form-control"value="{!! old('address') !!}">
                                    @if($errors->first('address'))
                                        <div class="text-danger ">   {{$errors->first('address')  }} </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label class="form-control-label"> Date:</label>
                                    <input type="date" name="date"  class="form-control"value="{!! old('date') !!}">
                                    @if($errors->first('date'))
                                        <div class="text-danger ">   {{$errors->first('date')  }} </div>
                                    @endif
                                </div>


                                <div class="col-4">
                                    <br>
                                    <label class="form-control-label"> Active Status:</label>
                                    <input type="radio" name="active_status" value="1"  checked>Active
                                    <input type="radio" name="active_status" value="0" >In Active

                                </div>



                                <div class="col-12">
                                    <label class="form-control-label">  Photo:</label>
                                    <input type="file" name="photo"  class="form-control">
                                    @if($errors->first('photo'))
                                        <div class="text-danger ">   {{$errors->first('photo')  }} </div>
                                    @endif
                                </div>



                            </div><!-- row -->
                            <hr>
                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="{{ route('backend.eventList') }}" class="btn btn-warning">Cancel</a>
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
