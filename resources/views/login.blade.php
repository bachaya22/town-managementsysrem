<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{URL::asset('visitor_assets')}}/css/style.css">
    <link rel="stylesheet" href="{{URL::asset('visitor_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="container-fluid bg-login padding-top px-4">


<form action="{{ route('login.store') }}" method="POST">
@csrf
    <div class="row justify-content-center mt-5 mt-md-0">
        <div class="col-md-4 login-form ">
            @if($errors->any())
        @foreach($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
        @endforeach
    @endif
            <h2 class="pt-2 pb-2 text-white">Login</h2>
            <div class="input-field pt-3">
                <input type="email" name="email" required>
                <label>Enter your email</label>

              </div>
              @error('email')
              <div class="text-danger">
                  {{ $message }}
              </div>
          @enderror
              <div class="input-field pt-3 pb-2">
                <input type="password" name="password" required>
                <label>Enter your password</label>
              </div>
              @error('password')
              <div class="text-danger">
                  {{ $message }}
              </div>
          @enderror
              <div class="row">
                  <div class="col-6">

                  </div>
        <div class="col-6 pt-3">
            <a href="{{ route('forgot.password') }}">Forgot password?</a>
        </div>

              </div>
              <div class="d-grid btn-login mt-4 mx-3">
                <button type="submit" class="btn py-2">Login</button>
              </div>
              <div class="register pt-4 pb-2">
                <p class="text-white">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
              </div>
              </div>
        </div>
</form>
</div>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if (Session::has('success'))
<script>
 toastr.options =
 {
     "closeButton" : true,
     "progressBar" : true
 }
    toastr.success("{{ Session::get('success') }}");
</script>

@endif
</body>
</html>
