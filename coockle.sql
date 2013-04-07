DROP database coockle;
CREATE database coockle;
use coockle;
/**
* @table users
**/
CREATE TABLE users (
id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(20) NOT NULL,
password VARCHAR(50) NOT NULL,
status INT NOT NULL
);

CREATE TABLE profile (
id_user INT NOT NULL,
name VARCHAR(50) NOT NULL,
last_name VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
FOREIGN KEY (id_user) REFERENCES users(id_user)
);

INSERT INTO users (username,password,status) VALUE ("lindosekai","22346e840ea5c5a00abed7fcb5f4f469a0f78873",1);
INSERT INTO profile (id_user,name,last_name,email) VALUE (1,"Agustin","Ramos Escalante","lindosekai@gmail.com");

CREATE TABLE ingredient_types (
    id_ingredient_type INT NOT NULL auto_increment PRIMARY KEY,
    ingredient_type_name VARCHAR(30) NOT NULL,
    ingredient_type_description VARCHAR(800) NOT NULL
);

CREATE TABLE ingredients_galeries (
id_ingredient_galery INT NOT NULL auto_increment PRIMARY KEY,
id_user INT NOT NULL,
ingredient_galery_date_creation DATETIME,
ingredient_galery_title VARCHAR(800) NOT NULL,
ingredient_galery_description VARCHAR(500) NOT NULL,
FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE ingredients_followers (
id_ingredient_followers INT NOT NULL auto_increment PRIMARY KEY
);

CREATE TABLE ingredients_votes (
id_ingredient_vote INT NOT NULL auto_increment PRIMARY KEY
);

CREATE TABLE ingredients_comments_groups (
id_ingredient_comments_group INT NOT NULL auto_increment PRIMARY KEY
);

CREATE TABLE ingredients_qa (
id_ingredient_qa INT NOT NULL auto_increment PRIMARY KEY
);

CREATE TABLE ingredients(
id_ingredient INT NOT NULL auto_increment PRIMARY KEY,
id_user INT NOT NULL,
ingredient_name VARCHAR(30) NOT NULL,
ingredient_description VARCHAR(800) NOT NULL,
id_ingredient_type INT NOT NULL,
id_ingredient_galery INT NOT NULL,
id_ingredient_followers INT NOT NULL,
id_ingredient_vote INT NOT NULL,
id_ingredient_comments_group INT NOT NULL,
id_ingredient_qa INT NOT NULL,
FOREIGN KEY (id_user) REFERENCES users(id_user),
FOREIGN KEY (id_ingredient_type) REFERENCES ingredient_types(id_ingredient_type),
FOREIGN KEY (id_ingredient_galery) REFERENCES ingredients_galeries(id_ingredient_galery),
FOREIGN KEY (id_ingredient_followers) REFERENCES ingredients_followers(id_ingredient_followers),
FOREIGN KEY (id_ingredient_vote) REFERENCES ingredients_votes(id_ingredient_vote),
FOREIGN KEY (id_ingredient_comments_group) REFERENCES ingredients_comments_groups(id_ingredient_comments_group),
FOREIGN KEY (id_ingredient_qa) REFERENCES ingredients_qa(id_ingredient_qa)
);

CREATE TABLE ingredient_galery_comments_group(
id_ingredient_galery_comments_group INT NOT NULL auto_increment PRIMARY KEY
);

CREATE TABLE ingredient_single_galery (
id_ingredient_single_galery INT NOT NULL auto_increment PRIMARY KEY,
id_ingredient_galery INT NOT NULL,
id_user INT NOT NULL,
ingredient_single_galery_date_creation DATETIME,
ingredient_single_galery_title VARCHAR(800) NOT NULL,
ingredient_single_galery_description VARCHAR(500) NOT NULL,
id_ingredient_galery_comments_group INT NOT NULL,
FOREIGN KEY (id_user) REFERENCES users(id_user),
FOREIGN KEY (id_ingredient_galery) REFERENCES ingredients_galeries(id_ingredient_galery),
FOREIGN KEY (id_ingredient_galery_comments_group) REFERENCES ingredient_galery_comments_group(id_ingredient_galery_comments_group)
);

CREATE TABLE ingredient_single_galery_image_comments_group(
id_ingredient_single_galery_comments_group INT NOT NULL auto_increment PRIMARY KEY
);

CREATE TABLE ingredient_single_galery_image_likes_group(
id_ingredient_single_galery_likes_group INT NOT NULL auto_increment PRIMARY KEY
);


CREATE TABLE ingredient_single_galery_image(
id_ingredient_single_galery_image INT NOT NULL auto_increment PRIMARY KEY,
id_ingredient_single_galery INT NOT NULL,
id_user INT NOT NULL,
ingredient_single_galery_image_name VARCHAR(300) NOT NULL,
ingredient_single_galery_image_description VARCHAR(300) NOT NULL,
ingredient_single_galery_image_date_creation DATETIME,
id_ingredient_single_galery_comments_group INT NOT NULL,
id_ingredient_single_galery_likes_group INT NOT NULL,
FOREIGN KEY (id_user) REFERENCES users(id_user),
FOREIGN KEY (id_ingredient_single_galery) REFERENCES ingredient_single_galery(id_ingredient_single_galery),
FOREIGN KEY (id_ingredient_single_galery_comments_group) REFERENCES ingredient_single_galery_image_comments_group(id_ingredient_single_galery_comments_group),
FOREIGN KEY (id_ingredient_single_galery_likes_group) REFERENCES ingredient_single_galery_image_likes_group(id_ingredient_single_galery_likes_group)
);

CREATE TABLE ingredients_single_followers (
id_follower INT NOT NULL,
follower_date_start DATETIME,
id_ingredient_followers INT NOT NULL,
FOREIGN KEY (id_follower) REFERENCES users(id_user),
FOREIGN KEY (id_ingredient_followers) REFERENCES ingredients_followers(id_ingredient_followers)
);

CREATE TABLE ingredient_comment(
id_ingredient_comment INT NOT NULL auto_increment PRIMARY KEY,
id_ingredient_comments_group INT NOT NULL,
id_user INT NOT NULL,
time INT NOT NULL,
comment_text VARCHAR(500) NOT NULL,
FOREIGN KEY (id_user) REFERENCES users(id_user),
FOREIGN KEY (id_ingredient_comments_group) REFERENCES ingredients_comments_groups(id_ingredient_comments_group)
);
CREATE TABLE recipes(
id_recipe INT NOT NULL auto_increment PRIMARY KEY,
id_user INT NOT NULL,
recipe_name VARCHAR(300) NOT NULL,
recipe_description VARCHAR(800) NOT NULL,
recipe_portions INT NOT NULL,
id_recipe_ingredients_list INT NOT NULL,
id_recipe_steps_group INT NOT NULL,
id_recipe_price INT NOT NULL,
id_recipe_request INT NOT NULL,
id_recipe_serv INT NOT NULL,/* if its lunch, breakfast, eat, dinner, etc*/
id_recipe_comments_group INT NOT NULL,
id_recipe_gallery INT NOT NULL,
id_recipe_followers INT NOT NULL,
id_recipe_tags INT NOT NULL,
id_recipe_votes INT NOT NULL,
id_recipe_qa INT NOT NULL,
id_recipe_permisions INT NOT NULL,
id_recipe_dificult INT NOT NULL,
id_recipe_category INT NOT NULL,
id_recipe_food_nation INT NOT NULL,
id_recipe_stores INT NOT NULL,
);

CREATE TABLE friend_lists(
    id_friend_list INT NOT NULL auto_increment PRIMARY KEY
);

CREATE TABLE friend_single_list(
    id_friend_single_list INT NOT NULL auto_increment PRIMARY KEY,
    friend_list_name VARCHAR(100) NOT NULL,
    time INT NOT NULL,
    id_friend_list INT NOT NULL,
    FOREIGN KEY (id_friend_list) REFERENCES friend_lists(id_friend_list) 
);

CREATE TABLE friends(
    id_friend INT NOT NULL,
    id_friend_single_list INT NOT NULL,
    FOREIGN KEY (id_friend) REFERENCES users(id_user),
    FOREIGN KEY (id_friend_single_list) REFERENCES single_friend_list(id_friend_single_list)
);

