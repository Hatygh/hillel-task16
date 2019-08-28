use blog;

create table categories
(
    id       int unsigned auto_increment
        primary key,
    category varchar(60) not null,
    constraint categories_category_uindex
        unique (category)
);

create table tags
(
    id  int unsigned auto_increment
        primary key,
    tag varchar(60) not null,
    constraint tags_tag_uindex
        unique (tag)
);

create table users
(
    id       int unsigned auto_increment
        primary key,
    username varchar(60)  not null,
    email    varchar(320) not null,
    constraint users_email_uindex
        unique (email)
);

create table posts
(
    id          int unsigned auto_increment
        primary key,
    user_id     int unsigned not null,
    category_id int unsigned not null,
    text        varchar(255) null,
    constraint posts_categories_id_fk
        foreign key (category_id) references categories (id)
            on update cascade on delete cascade,
    constraint posts_users_id_fk
        foreign key (user_id) references users (id)
            on update cascade on delete cascade
);

create table post_tags
(
    post_id int unsigned not null,
    tag_id  int unsigned not null,
    constraint post_tags_posts_id_fk
        foreign key (post_id) references posts (id)
            on update cascade on delete cascade,
    constraint post_tags_tags_id_fk
        foreign key (tag_id) references tags (id)
            on update cascade on delete cascade
);

insert into users values
    (1, 'Michael', 'michael@gmail.com'),
    (2, 'John', 'john@gmail.com'),
    (3, 'Jessica', 'jessica@gmail.com');

insert into categories values
    (1, 'HTML'),
    (2, 'CSS'),
    (3, 'PHP'),
    (4, 'MYSQL');

insert into tags values
    (1, 'useful notes'),
    (2, 'hot news'),
    (3, 'official channel'),
    (4, 'blablabla'),
    (5, 'longstory');

insert into posts values
    (1, 1, 2, 'Once upon a time'),
    (2, 1, 1, 'little-little girl'),
    (3, 2, 4, 'went to the deep dark forest'),
    (4, 3, 4, 'And her name was Albert Einstein');

insert into blog.post_tags values
    (1, 1),
    (1, 3),
    (1, 5),
    (2, 5),
    (2, 3),
    (3, 1),
    (3, 2),
    (3, 4),
    (4, 1),
    (4, 3),
    (4, 4);


