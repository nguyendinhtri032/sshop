<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template/shop/auth/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('template/shop/auth/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('template/shop/auth/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('template/shop/auth/css/style.css')}}">

    <title>Sshop - Forget Password</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('template/shop/auth/images/login.gif')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Forget Password</h3>
              </div>
              <div>
                <div>
                    <form action="reset-password" method="post" >
                      @include('alert')
                        @csrf
                        <label for="username">Password</label>
                        <div class="form-group last mb-4">
                          <input type="password" class="form-control" id="username" name="password" >
                          
                        </div>
                        <label for="email">Password Confirmation</label>
                        <div class="form-group last mb-4">
                          <input type="password" class="form-control" id="email" name="password_confirmation" >
                        </div>
                        <input type="text" value="{{$token}}" name="token" hidden>
                         <div class="d-flex mb-5 align-items-center">
                          <span class="ml-auto"><a href="login" class="forgot-pass">Login Now</a></span>
                          </div>
                       
                          <input type="submit" value="Reset Password" class="btn btn-block btn-primary">
                      
                        </form>
                </div>
            </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
    <script src="{{asset('template/shop/auth/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('template/shop/auth/js/popper.min.js')}}"></script>
    <script src="{{asset('template/shop/auth/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/shop/auth/js/main.js')}}"></script>
  </body>
</html>