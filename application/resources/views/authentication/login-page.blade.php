<!DOCTYPE html>
<html lang="en">

<head>


    <title>Capital Admin</title>
    @include('master-layouts.backend.partials.top')

    <style>
        span.label.label-danger {
            color: red;
        }
    </style>
</head>

<body>
<div class="d-flex align-items-center justify-content-center ht-100v">
    <img src="#" class="wd-100p ht-100p object-fit-cover" alt="">
    <div class="overlay-body bg-black-6 d-flex align-items-center justify-content-center">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bd bg-black-7">
            <div class="signin-logo tx-center tx-28 tx-bold tx-white">
                <span class="tx-normal"> <img src="#" class="nav-logo" alt=""></span>
            </div>
            <div class="tx-white-5 tx-center mg-b-30"></div>
            <form method="post" action="{{ route('verify-login')}}">
                {{csrf_field()}}
                @if ($message = Session::get('success'))

                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="form-group">
                    <input type="text" name="email" class="form-control fc-outline-llt" placeholder="Enter your username">
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" name="password"  class="form-control fc-outline-llt" placeholder="Enter your password">
                </div><!-- form-group -->
                <a href="#" data-toggle="modal" data-target="#deleteModal" class="tx-info tx-12 d-block mg-t-10 mg-b-15 anc-cst">Forgot password?</a>
                <button type="submit" class="btn btn-info btn-block btn-sn">Sign In</button>
            </form>




        </div><!-- login-wrapper -->
    </div><!-- overlay-body -->
</div><!-- d-flex -->


@include('master-layouts.backend.partials.script')
</body>

</html>
