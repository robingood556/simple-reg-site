<?php
session_start();

if($_SESSION['user']){

unset($_SESSION['user']);
}else{

unset($_SESSION['admin']);
};

header('Location: ../index.php');
