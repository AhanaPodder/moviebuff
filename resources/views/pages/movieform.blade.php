<html>

<head>
    <title>Movie Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Css/movieform.css">
</head>

<body>
    <h1>MovieBuff</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form">
                    <div class="card-body">
                        <form action="{{route('movie-form')}}" method="post" class="mt-5 border p-4 bg-light shadow">
                            <h2>Movie Watched</h2>
                            @if(Session::has('success'))
                            <div class="alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert-fail">{{Session::get('fail')}}</div>
                            @endif
                            @csrf

                            <!-- Container to take movie details -->
                            <div class="mt-3">
                                <label for="name">Name of the Movie</label>
                                <input type="text" class="form-control" placeholder="Enter movie name" name="name" value="{{old('name')}}">
                                <span class="text-error">@error('name'){{$message}}@enderror</span>
                            </div>
                            <div class="mt-3">
                                <label for="date">Date Watched</label>
                                <input type="date" class="form-control" placeholder="Enter date you watched" name="date" value="">
                                <span class="text-error">@error('date'){{$message}}@enderror</span>
                            </div>

                            <!-- Star Rating -->
                            <div class="rating">
                                <label>
                                    <input type="radio" name="stars" value="1" />
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="2" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="3" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="4" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="5" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                            </div>
                            <button class="btn btn-primary mt-3 float-end" type="submit">Submit</button>
                        </form>
                        <p class="text-center">To View all the added movies<a href="watchedmovies">Click Here!</a>
                        <p class="text-center">To Search any movies<a href="viewmovies">Click Here!</a>
                    </div>
                </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script>
        $(':radio').change(function() {
            console.log('New star rating: ' + this.value);
        });
    </script> -->

</html>
