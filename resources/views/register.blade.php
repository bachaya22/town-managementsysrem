<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{URL::asset('visitor_assets')}}/css/style.css">
    <link rel="stylesheet" href="{{URL::asset('visitor_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
<div class="container-fluid bg-login padding-top-1 px-4">

<form action="{{ route('register') }}" method="POST">
@csrf
    <div class="row justify-content-center mt-5 mt-md-0">

        <div class="col-md-4 login-form ">
            @if($errors->any())
        @foreach($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
        @endforeach
    @endif
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            <h2 class="pt-2 pb-2 text-white">Register</h2>
            <div class="input-field pt-3">
                <input type="text"  name="name" required>
                <label>Enter your name</label>
              </div>
              <div class="input-field pt-3">
                <input type="text" name="email" required>
                <label>Enter your email</label>
              </div>
              <div class="input-field pt-3">
                <input type="password"  name="password" required>
                <label>Enter your password</label>
              </div>
              <div class="input-field pt-3">
                <input type="password"  name="password_confirmation" required>
                <label>Enter your confirm password</label>
              </div>

              <div class="d-grid btn-login mx-3">
                <button type="submit" class="btn py-2 text-white">Register</button>
              </div>
              <div class="register pt-4">
                <p class="text-white">Already have an account? <a href="{{ route('login') }}">Login</a></p>
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
