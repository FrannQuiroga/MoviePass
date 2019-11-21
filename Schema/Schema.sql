create database moviepass;
use moviepass;

create table movies(
    id int primary key,
    poster_path varchar(50),
    original_title varchar(50),
    vote_average float,
    overview text,
    backdrop_path varchar (50),
    isAvailable TINYINT default 1
); --Agrega campo isAvailable para persistir info de peli una vez sacada de cartelera

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

CREATE table rooms(
    id int primary key auto_increment,
    cinema_id int,
    name varchar(30),
    isAvailable TINYINT default 1,
    constraint fk_cinema_id foreign key (cinema_id) references cinemas (id)
);


CREATE table functions(
    id int primary key auto_increment,
    day date,
    time varchar(5),
    movie_id int,
    room_id int,
    isAvailable TINYINT default 1,
    constraint fk_room_id foreign key (room_id) references rooms (id),
    constraint fk_movie_id foreign key (movie_id) references movies (id)
);

create table user_profiles(
    id int primary key auto_increment,
    name varchar(30),
    surname varchar(30),
    document int
);

CREATE table users(
    id int primary key auto_increment,
    email varchar(30),
    password varchar(30),
    isAdmin TINYINT default 0, 
    isAvailable TINYINT default 1,
    user_profile_id int,
    constraint fk_user_profile_id foreign key (user_profile_id) references user_profiles (id)
);

--Para crear administrador!
INSERT INTO user_profiles (id,name,surname,document) VALUES (0,'Admin','Istrador',1);
INSERT INTO users (email,password,isAdmin,user_profile_id) VALUES ('admin@admin.com','admin',1,0);

CREATE table tickets(
    id int primary key auto_increment,
    seat_number int,
    function_id int,
    user_id int default 0,
    constraint fk_function_id foreign key (function_id) references functions (id),
    constraint fk_user_id foreign key (user_id) references users (id)
);
