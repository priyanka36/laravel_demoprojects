<!-- top info bar -->
<section class="top-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="top-right">
                    <ul>
                        <li>
                            <a href=""> <i class="fa fa-phone"></i> +977 909 015 345</a>
                        </li>
                        <li>
                            <a href=""> <i class="fa fa-envelope-open"></i>info@sunnydistillary.com.np</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 text-md-right">
                <div class="top-left">
                    <ul>
                        <li>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href=""> <i class="fab fa-google-plus-g"></i></a>
                        </li>
                        <li>
                            <a href=""> <i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href=""> <i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main navigation bar -->
<section class="main-nav">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/frontend/assets/images/logo-sunny.png" class="nav-logo" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    About Us
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="about-page.php">Introduction</a>
                                    <a class="dropdown-item" href="bod.php">BOD</a>
                                    <a class="dropdown-item" href="archive-team.php">Team Member</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Products
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('frontend.Whisky') }}">Whiskey</a>
                                    <a class="dropdown-item" href="{{ route('frontend.Vodka') }}">Vodka</a>
                                    <a class="dropdown-item" href="{{ route('frontend.Gin') }}">Gin</a>
                                    <a class="dropdown-item" href="{{ route('frontend.Rum') }}">Rum</a>
                                </div>
                            </li>
                            <li class="nav-item  nav-fancy">
                                <a class="nav-link" href="career.php">Career</a>
                            </li>
                            <li class="nav-item  nav-fancy">
                                <a class="nav-link" href="archive-event.php">Events</a>
                            </li>
                            <li class="nav-item  nav-fancy">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>