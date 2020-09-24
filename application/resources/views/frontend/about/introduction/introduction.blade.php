@extends('master-layouts.frontend.master-layouts.master-layout')
@section('main-content')

<section class="inner-page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-page-top">
                    @foreach($introductions as $introduction)
                    <header class="inner-page-title">

                        <h4>
                         {{$introduction->title}}
                        </h4>
                    </header>
                    <section class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Library</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data</li>
                            </ol>
                        </nav>
                    </section>                </div>
            </div>
            <!-- about content top / overview-->
            <div class="col-lg-12">
                <div class="global-header-in">
                    <h4>
                        Overview
                    </h4>
                </div>
                <div class="global-par-in">
                    <p>
                        {{$introduction->description}}
                    </p>
                    <p>
                        {{$introduction->description}}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row align-items-center row-divider">
            <div class="col-lg-5 pr-lg-0">
                <div class="note-image-wrap img-full">
                    <img src="{{asset($introductionImagePath.$introduction->bg_photo)}}" alt="">
                </div>
            </div>
            <div class="col-lg-7 pl-lg-0">
                <div class="key-note-body">
                    <div class="global-header-in">
                        <h4 class="text-white">
                            Key notes
                        </h4>
                    </div>
                    <p>
                        $introduction->img_description                    </p>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection