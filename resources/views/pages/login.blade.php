<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Css/loginandregistration.css">
</head>

<body>
    <h1>MovieBuff</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-7 offset-md-3">
                <div class="login">
                    <div class="card-body">
                        <form action="{{route('login-user')}}" method="post" class="mt-5 border p-4 bg-light shadow">
                            <h2 class="mb-4 text-secondary">Login</h2>
                            <!--if condition for user session-->
                            @if(Session::has('success'))                       
                            <div class="alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert-fail">{{Session::get('fail')}}</div>
                            @endif

                            @csrf  <!-- secure token for user session -->

                            <!-- Container to take login details -->
                            <div class="mt-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{old('email')}}">
                                <span class="text-error">@error('email'){{$message}}@enderror</span> <!-- to highlight and display error message -->
                            </div>
                            <div class="mt-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="password" value="">
                                <span class="text-error">@error('password'){{$message}}@enderror</span>
                            </div>
                                <button class="btn btn-primary mt-3" type="submit">Login</button>
                        </form>
                        <p class="text-center">New User?<a href="registration">Register Here!</a>  <!-- Link to move to registration page -->
                    </div>
                </div>
            </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
