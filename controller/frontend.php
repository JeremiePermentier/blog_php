<?php

require('../models/frontend.php');

function get_form_signup() {
    require('../view/frontend/form_signup.php');
}

function get_form_signin() {
    require('../view/frontend/form_signin.php');
}

function signup() {
    create_user();
}

function signin() {
    signin_user();
}

function get_home() {
    $posts = get_posts();

    require('../view/frontend/home.php');
}

function get_form_post() {
    require('../view/frontend/form_post.php');
}