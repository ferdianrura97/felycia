<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href=" {{ asset('assets/img/logo/logo.png') }} " rel="icon">
  <title>{{ env("APP_NAME") }} - Login</title>
  <link href=" {{ asset('assets/vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet" type="text/css">
  <link href=" {{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css">
  <link href=" {{ asset('assets/css/ruang-admin.min.css') }} " rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-8 col-md-8">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <img style="width:200px; height:200px;border-radius : 20%;"  src="{{ asset('assets/img/logo') .'/' . \Helper::getLogo()  }}" alt="Matmix Logo" style="width: 100%;">
                    <h1 class="h4 text-gray-900 mb-4 mt-4">{{ \Helper::getNamaProfil() }}</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control" name="email"
                        placeholder="Enter Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="Password">

                      @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" href="index.html" class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src=" {{ asset('assets/vendor/jquery/jquery.min.js') }} "></script>
  <script src=" {{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
  <script src=" {{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }} "></script>
  <script src=" {{ asset('assets/js/ruang-admin.min.js') }} "></script>
</body>

</html>