<html>

<head>
    <title>Movie Search Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Css/viewmovies.css">
</head>

<body>
    <h1>MovieBuff</h1>
    <div class="wrapper">
        <div class="search-container">
            <div class="search-element">

                <!-- end of search container -->
                <h3>Search Movie</h3>
                <input type="text" class="form-control" placeholder="Enter name of the movie title" id="movie-search-box" onkeyup="findMovies()" onclick="findMovies()">
                <div class="search-list" id="search-list">
                </div>
            </div>
        </div>

        <!-- result container -->
        <div class="container">
            <div class="result-container">
                <div class="result-grid" id="result-grid">
                </div>
            </div>
        </div>
    </div>

    <!-- movie app js -->
    <script>
        const movieSearchBox = document.getElementById('movie-search-box');
        const searchList = document.getElementById('search-list');
        const resultGrid = document.getElementById('result-grid');

        // load movies from API
        async function loadMovies(searchTerm) {
            const URL = `https://omdbapi.com/?s=${searchTerm}&page=1&apikey=cf428595`;
            const res = await fetch(`${URL}`);
            const data = await res.json();
            if (data.Response == "True") displayMovieList(data.Search);
        }

        // search list dropdown
        function findMovies() {
            let searchTerm = (movieSearchBox.value).trim();
            if (searchTerm.length > 0) {                      //condition for showing the list of movies matching with the search term
                searchList.classList.remove('hide-search-list');
                loadMovies(searchTerm);
            } else {
                searchList.classList.add('hide-search-list');
            }
        }

        //searched movie details in dropdown
        function displayMovieList(movies) {
            searchList.innerHTML = "";
            for (let idx = 0; idx < movies.length; idx++) {
                let movieListItem = document.createElement('div');
                movieListItem.dataset.id = movies[idx].imdbID; // setting movie id in  data-id
                movieListItem.classList.add('search-list-item');
                if (movies[idx].Poster != "N/A")  //condition for displaying movie poster
                    moviePoster = movies[idx].Poster;
                else
                    moviePoster = "Img/image_not_found.png";

                movieListItem.innerHTML = `
        <div class = "search-item-thumbnail">
            <img src = "${moviePoster}">
        </div>
        <div class = "search-item-info">
            <h3>${movies[idx].Title}</h3>
            <p>${movies[idx].Year}</p>
        </div>
        `;
                searchList.appendChild(movieListItem);
            }
            loadMovieDetails();
        }

        // fetch all matched movie details from API
        function loadMovieDetails() {
            const searchListMovies = searchList.querySelectorAll('.search-list-item');
            searchListMovies.forEach(movie => {
                movie.addEventListener('click', async () => {
                    console.log(movie.dataset.id);
                    searchList.classList.add('hide-search-list');
                    movieSearchBox.value = "";
                    const result = await fetch(`http://www.omdbapi.com/?i=${movie.dataset.id}&apikey=cf428595`);
                    const movieDetails = await result.json();
                    console.log(movieDetails);
                    displayMovieDetails(movieDetails);
                });
            });
        }

        // Display slected movie details
        function displayMovieDetails(details) {
            resultGrid.innerHTML = `
    <div class = "movie-poster">
        <img src = "${(details.Poster != "N/A") ? details.Poster : "Img/image_not_found.png"}" alt = "movie poster">
    </div>
    <div class = "movie-info">
        <p class = "movie-title">${details.Title}</p>
        <ul class = "movie-misc-info">
            <li class = "year">Year:${details.Year}</li>
            <li class = "rated">Ratings:${details.Rated}</li>
            <li class = "released">Released: ${details.Released}</li>
        </ul>
        <p class = "genre"><b>Genre:</b>${details.Genre}</p>
        <p class = "writer"><b>Writer:</b>${details.Writer}</p>
        <p class = "actors"><b>Actors:</b>${details.Actors}</p>
        <p class = "plot"><b>Plot:</b>${details.Plot}</p>
        <p class = "language"><b>Language:</b>${details.Language}</p>
        <p class = "awards"><b>Awards & Nominations:</b>${details.Awards}</p>
    </div>
    `;
        }

        window.addEventListener('click', (event) => {
            if (event.target.className != "form-control") {
                searchList.classList.add('hide-search-list');
            }
        });
    </script>
</body>

</html>
