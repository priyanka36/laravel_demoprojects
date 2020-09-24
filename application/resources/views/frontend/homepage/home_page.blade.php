@extends('master-layouts.frontend.master-layouts.master-layout')

@section('main-content')
    <section class="banner-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="55555">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach($sliders as $slider)
                                <div class="carousel-item  {{$loop->first?'active':''}}">
                                    <img class="d-block w-100" src="{{asset($sliderImagePath.$slider->photo)}}"
                                         alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4></h4>
                                        <p>{{$slider->title}} </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>;
    <section class="content-product-wrapper page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <header class="page-header">
                        <h4>
                            Discover Our
                        </h4>
                        <p>
                            <i class="fas fa-beer"></i>
                        </p>
                        <h2>
                            Wine Collection
                        </h2>
                    </header>
                </div>
            </div>


                <clas class="row">
                    @foreach($homepages as $homepage)
                    <div class="col-lg-6">
                    <div class="product-box">
                        <div class="product-box-image">
                            <img src="{{asset($homepageImagePath.$homepage->bg_photo)}}" alt="">
                        </div>
                        <div class="product-box-desc item-box">

                            <h3>
                                {{$homepage->name}}
                            </h3>
                            <p>
                                {{$homepage->description}}
                            </p>

                        </div>
                        <a href="single-product.php" class="div-anchor"></a>
                    </div>
                </div>
            @endforeach
                </div>



            </div>
        </div>
    </section>
@endsection