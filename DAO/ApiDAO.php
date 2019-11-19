<?php
    namespace DAO;

    use DAO\IApiDAO as IApiDAO;
    use Models\Movie as Movie;
    use Models\GenreByMovie as GenreByMovie;
    use Models\Genre as Genre;

    class ApiDAO implements IApiDAO
    {

        public function UpdateMovies()
        {
            $nowPlayingURL = BASE_API_URL."movie/now_playing?api_key=ff8c41b01da7a16f7b4ca8af1f16f284&language=es-ES";

            $moviesJSON = file_get_contents($nowPlayingURL);
            $movieArray = json_decode($moviesJSON,true);

            $movieList = $this->transformToMovie($movieArray);

            return $movieList;
        }

        private function transformToMovie($movieArray)
        {
            $movieList = array();

            foreach($movieArray['results'] as $row)
            {
                $movie = new Movie();

                $movie->setPosterPath($row["poster_path"]);
                $movie->setId($row["id"]);
                $movie->setTitle($row["title"]);
                $movie->setVoteAverage($row["vote_average"]);
                $movie->setOverview($row["overview"]);
                $movie->setBackdropPath($row["backdrop_path"]);
                
                $genreList = array();
                foreach($row["genre_ids"] as $id)
                {
                    $genreByMovie = new GenreByMovie();
                    $genreByMovie->setMovieId($row["id"]);
                    $genreByMovie->setGenreId($id);

                    array_push($genreList,$genreByMovie);
                }
                $movie->setGenres($genreList);

                array_push($movieList,$movie);
            }
            return $movieList;
        }

        public function UpdateGenres()
        {
            $genresURL = BASE_API_URL."genre/movie/list?api_key=ff8c41b01da7a16f7b4ca8af1f16f284&language=es-ES";
           
            $genresJSON = file_get_contents($genresURL);
            $genreArray = json_decode($genresJSON,true);

            $genreList = $this->transformToGenre($genreArray);

            return $genreList;
        }

        private function transformToGenre($genreArray)
        {
            $genreList = array();

            foreach($genreArray['genres'] as $row)
            {
                $genre = new Genre();

                $genre->setId($row["id"]);
                $genre->setName($row["name"]);

                array_push($genreList,$genre);
            }
            return $genreList;
        }
    }

?>
