<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="{{URL::asset('visitor_assets')}}/css/style.css">
    <link rel="stylesheet" href="{{URL::asset('visitor_assets')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="container-fluid bg-login padding-top-1 px-4">
        @if($errors->any())
                @foreach($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
                @endforeach
            @endif
        <form action="{{route('verifyOTP')}}" method="get">
            @csrf
            <div class="row justify-content-center mt-5 mt-md-0">

                  <div class="col-md-4 login-form ">
                    <h2 class="pt-2 pb-2 text-white">Verify OTP</h2>
                    <div class="input-field pt-3">
                      <input type="text" name="otp" required>
                      <label>Enter OTP</label>
                    </div>

                    <div class="d-grid btn-login mx-3">
                      <button type="submit" class="btn py-2 text-white">Verify OTP</button>
                    </div>
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
