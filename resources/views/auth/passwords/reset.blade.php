@extends('layouts.welcome')

@section('content')

<div class="wrapper-page">

    <div class="m-t-40 account-pages">
        <div class="text-center account-logo-box">
            <h2 class="text-uppercase">
                <a href="index.html" class="text-success">
                    <span><img src="assets/images/logo.png" alt="" height="36"></span>
                </a>
            </h2>
            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
        </div>
        <div class="account-content">
            <div class="text-center m-b-20">
                <p class="text-muted m-b-0 font-13">Enter your email address and we'll send you an email with instructions to reset your password.  </p>
            </div>
            <form class="form-horizontal" action="#">

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" required=""
                               placeholder="Enter email">
                    </div>
                </div>

                <div class="form-group account-btn text-center m-t-10">
                    <div class="col-xs-12">
                        <button class="btn w-md btn-bordered btn-danger waves-effect waves-light"
                                type="submit">Send Email
                        </button>
                    </div>
                </div>

            </form>

            <div class="clearfix"></div>

        </div>
    </div>
    <!-- end card-box-->


    <div class="row m-t-50">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Already have account?<a href="page-login.html" class="text-primary m-l-5"><b>Sign In</b></a></p>
        </div>
    </div>

</div>

@endsection
