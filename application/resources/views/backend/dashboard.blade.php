@extends('master-layouts.backend.master-layouts')


@section('additional-css')

@endsection
@section('main-content')

    {{--<div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>Dashboard</h4>
                <p class="mg-b-0"></p>
                <div class="col-12">
                    --}}{{--<label class="form-control-label">File Manager</label>--}}{{--
                    <div class="input-group">
                               <span class="input-group-btn">
                                 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info"
                                    style="color: #fff"> File Manager
                                 </a>
                               </span>

                    </div>

                </div>
            </div>
        </div>

    </div>--}}
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('dashboard') }}">Home</a>
                <span class="breadcrumb-item active">Dashboard</span>
            </nav>
        </div>


    </div>
@endsection

@section('additional-js')

@endsection
