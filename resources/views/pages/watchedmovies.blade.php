<html>

<head>
    <title>Watched Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Css/watchedmovies.css">
</head>

<body>
    <h1>MovieBuff</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="list">
                    <div class="card-body">
                        <form class="mt-5 border p-4 bg-light shadow">
                            <h2 class="mb-4 text-secondary">Movies Watched</h2>
                            @csrf
                             <!-- Container to display watched movie details -->
                            <div class="mt-5">
                                @if($movies>0)
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Name of the Movie</th>
                                        <th>Watched On</th>
                                        <th>Rating</th>
                                    </thead>
                                    <tbody>
                                        @foreach($movies as $value)
                                        <tr>
                                            <td>{{$value['movie_name']}}</td>
                                            <td>{{$value['watched_on']}}</td>
                                            <td>{{$value['rating']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <h3 class="text-center">No Post From Selected Range</h3>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</html>