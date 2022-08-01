<html>

<head>
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Css/loginandregistration.css">
</head>

<body>
<h1>MovieBuff</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-7 offset-md-3">
                <div class="register">
                    <div class="card-body">
                        <form action="{{route('register-user')}}" method="post" class="mt-5 border p-4 bg-light shadow">
                            <h2 class="mb-4 text-secondary">Register</h2>
                            @if(Session::has('success'))
                            <div class="alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert-fail">{{Session::get('fail')}}</div>
                            @endif
                            @csrf

                            <!-- Container to take user input details for registration -->
                            <div class="mt-3">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="{{old('name')}}">
                                <span class="text-error">@error('name'){{$message}}@enderror</span>
                            </div>
                            <div class="mt-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{old('email')}}">
                                <span class="text-error">@error('email'){{$message}}@enderror</span>
                            </div>
                            <div class="mt-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="password" value="">
                                <span class="text-error">@error('password'){{$message}}@enderror</span>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Register</button>
                        </form>
                        <p class="text-center">Already have account?<a href="login">Login!</a>   <!-- Link to move to login page if user is registered -->
                    </div>
                </div>
            </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
