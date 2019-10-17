create database moviepass;
use moviepass;

create table movies(
    id int primary key,
    poster_path varchar(50),
    original_title varchar(50),
    vote_average float,
    overview text
);

create table cinemas(
    id int primary key auto_increment,
    isAvailable TINYINT default 1,
    name varchar (30),
    capacity int,
    address varchar(30),
    price float 
);

create table genres(
    id int primary key,
    name varchar (30)
);

CREATE table genre_by_movie(
    movie_id int,
    genre_id int,
    constraint pk_genre_by_movie primary key (genre_id,movie_id),
    constraint fk_genre_id foreign key (genre_id) references genres(id),
    constraint fk_movie_id foreign key (movie_id) references movies(id)
);

--SIN CREAR--
CREATE table rooms(
    id int primary key auto_increment,
    cinema_id int,
    name varchar(30),
    isAvailable TINYINT default 1,
    constraint fk_cinema_id foreign key (cinema_id) references cinemas (id)
);

--SIN CREAR--
CREATE table functions(
    id int primary key auto_increment,
    room_id int,
    movie_id int,
    day date,
    time string,
    constraint fk_room_id foreign key (room_id) references rooms (id),
    constraint fk_movie_id foreign key (movie_id) references movies (id)
);