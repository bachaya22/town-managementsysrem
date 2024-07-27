<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fogot Pasword</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('visitor_assets')}}/css/style.css">
    <link rel="stylesheet" href="{{URL::asset('visitor_assets')}}/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid bg-login padding-top-1 px-4">
        @if($errors->any())
                @foreach($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
                @endforeach
            @endif
        <form action="{{ route('forgot') }}" method="GET">
            @csrf
            <div class="row justify-content-center mt-5 mt-md-0">

                <div class="col-md-4 login-form">
                    <h2 class="pt-2 pb-2 text-white">Forgot Password</h2>
                    <div class="input-field pt-3">
                      <input type="text" name="email" required>
                      <label>Enter your email</label>
                    </div>

                    <div class="d-grid btn-login mx-3">
                      <button type="submit" class="btn py-2 text-white">Forgot Password</button>
                    </div>
                  </div>
                      </div>
                </div>
        </form>

        </div>
</body>

</html>
