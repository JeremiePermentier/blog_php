<?php
session_start();

require('../controller/frontend.php');

try
{
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'signup') {
            if ($_POST['pseudo'] == !null && $_POST['email'] == !null && $_POST['password'] == !null) {
                return create_user();
            }
        } else if ($_GET['action'] === 'add_post') {
            if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
                return get_form_post();
            }
            die("Vous n'êtes pas autoriser à ajouter un billet.");
        } else if ($_GET['action'] === 'send_post') {
            return add_post();
        } else if ($_GET['action'] === 'add_comment') {
            if ($_POST['comment'] == !null) {
                return add_comment();
            }
        } else if ($_POST['email'] == !null && $_POST['password'] == !null) {
            return signin_user();
        }
        header('Location: http://localhost/blog/public');
    } else {
        if (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] == !null) {
            get_home();
        } else if (isset($_GET["login"]) && $_GET["login"] === "signup") {
            get_form_signup();
        }  else {
            get_form_signin();
        }
    }
} catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}