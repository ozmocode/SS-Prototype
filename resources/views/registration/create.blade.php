<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="POST" action="/register">
        {{csrf_field()}}
        <h2 class="form-signin-heading">Register</h2>
        <label for="name" class="sr-only">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Name"  autofocus>
        <label for="email" class="sr-only">Email address</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email address"  autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" >
        <label for="password_confirmation" class="sr-only">Password Confirmation</label>
        <input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation"name="password_confirmation">
        {{-- <label for="password_confirmation" class="sr-only">Password confirmation</label>
        <input type="password" id="password_confirmation" name="password_confimation" class="form-control" placeholder="Password Confirmation"  autofocus> --}}
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        @include('errors')
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
