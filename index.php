<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//Model
require 'Model/DataBase.php';
require 'Model/ClassLoader.php';
require 'Model/TeacherModel.php';
require 'Model/TeacherLoader.php';
require 'Model/StudentModel.php';
require 'Model/StudentLoader.php';
require 'Model/SearchModel.php';
require 'Model/SearchLoader.php';
require 'Model/csvLoader.php';


//Controller
require 'Controller/HomepageController.php';
require 'Controller/ClassController.php';
require 'Controller/StudentController.php';
require 'Controller/TeacherController.php';
require 'Controller/SearchController.php';

$page = $_GET['page'] ?? '';

$controller = new StudentController();

if (!empty($_POST['search']))
{
    $controller = new SearchController();
}
elseif (isset($_GET['page']))
{
    switch ($_GET['page']) {
        case 'class':
            $controller = new ClassController();
            break;
        case 'teacher':
            $controller = new TeacherController();
            break;
        case 'student':
            $controller = new StudentController();
            break;

    }
}


$controller->render($_GET, $_POST);