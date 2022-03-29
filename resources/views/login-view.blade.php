<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/login.css') }}">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
  rel="stylesheet"
/>
    <title>Login</title>
    <style>
.gradient-custom {
  /* fallback for old browsers */
  background: #6a11cb;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
    </style>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <div class="alert alert-primary" role="alert">
                        Server 1
                      </div>
                  <div class="mb-md-5 mt-md-4 pb-5">

                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-5">Please enter your data!</p>
                <form action="api/v1/login" method="POST">
                    @csrf
                <div class="mb-4" style="text-align: left">
                    <div class="form-outline form-white">
                      <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" required/>
                      <label class="form-label" for="typeEmailX">Email</label>
                    </div>
                    <span style="color:red;">@error('email')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="mb-4" style="text-align: left">
                    <div class="form-outline form-white">
                      <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" required/>
                      <label class="form-label" for="typePasswordX" >Password</label>
                    </div>
                    <span style="color:red;">@error('password')
                        {{$message}}
                        @enderror
                    </span>
                </div>


                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                </form>
                  </div>

                  <div>
                    <p class="mb-0">Don't have an account? <a href="register" class="text-white-50 fw-bold">Sign Up</a></p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
></script>
</body>
</html>
