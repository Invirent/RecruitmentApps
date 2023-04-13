<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <form method="GET" action="{{ url('/register/create') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form>

                <!-- Name input -->
                <div class="form-outline mb-4">
                  <input type="text" name="user_name" id="user_name" class="form-control form-control-lg"
                    placeholder="Enter a name" required/>
                  <label class="form-label" for="user_name">Name</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" required />
                  <label class="form-label" for="email">Email address</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" name="password" id="password" class="form-control form-control-lg"
                    placeholder="Enter password" required/>
                  <label class="form-label" for="password">New Password</label>
                </div>
                <div class="form-outline mb-3">
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg"
                    placeholder="Enter password" required/>
                  <label class="form-label" for="password_confirmation">Re-type New Password</label>
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <input type="submit" class="btn btn-primary btn-lg" value="Register"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">
                </div>
      
              </form>
            </div>
          </div>
        </div>
      </section>
    </form>
</body>
</html>