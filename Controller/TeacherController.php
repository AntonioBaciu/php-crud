<?php


class TeacherController {

    public function render(array $GET, array $POST): void
    {

        $pdo = new TeacherLoader();
        $classLoader = new ClassLoader();

        if(!empty($_POST['first_name']) && !empty($_POST['last_name'])){
            if(empty($_POST['id'])){
                $new = new TeacherModel( null, $_POST['first_name'], $_POST['last_name'], $_POST['email']);
                $pdo->insertNewTeacher($new);

                $message= 'New Teacher Added';
            }else{
                $update = new TeacherModel( (int) $_POST['id'], $_POST['first_name'], $_POST['last_name'], $_POST['email']);
                $pdo->updateTeacher($update);

                $message= 'Teacher Updated';

            }

        }
        if(!empty($_POST['delete'])){
            $teacherIdToDelete = (int)$_POST['id'];
            $teacherToDelete = $pdo->getTeacher($teacherIdToDelete);

            $classes = $classLoader->getAllClasses();
            $canDelete = true;
            foreach($classes as $class){
                if ($class->getteacherid() == $teacherIdToDelete) {
                    $canDelete = false;
                    break;
                }
            }

            if ($canDelete == true) {
                $pdo->deleteTeacher($teacherToDelete);

                if (!empty($_GET['run']) && $_GET['run'] === 'detailed') {
                    $_GET['run'] = '';
                }

                $message= 'Teacher Deleted';
            }
            else {
               

                $message= 'Teacher cannot be deleted. Teacher is still linked to a class.';
            }


        }

        if (isset($_GET)) {
            switch ($_GET['run'] ?? '') {
                case 'create':
                    require 'View/teacherCreate.php';
                    break;
                case 'detailed':
                    $studentPdo = new StudentLoader();

                    $teacher = $pdo->getTeacher((int)$_GET['id']); //placeholder
                    $students = $studentPdo->fetchStudentsFromTeacher($teacher->getid());

                    require 'View/teacherDetail.php';
                    break;
                case 'update':
                    $teacher = $pdo->getTeacher((int)$_GET['id']);
                    require 'View/teacherEdit.php';
                    break;

                case 'export':
                    $export = new csvLoader();
                    $file = 'teacherExport.csv';
                    $list = array (
                        array('firstName', 'lastName', 'email')
                    );
                    $teachers = $pdo->getAllTeachers();
                    foreach($teachers as $teacher){
                        array_push($list, array($teacher->getfirst_name(), $teacher->getlast_name(), $teacher->getemail()));
                    }
                    $export->export($list, $file);

                    header('Content-Description: File Transfer');
                    header('Content-Disposition: attachment; filename='.basename($file));
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    header("Content-Type: text/plain");
                    readfile($file);

                    break;

                default:
                    $teachers = $pdo->getAllTeachers();
                    require 'View/teacherOverview.php';
                    break;
            }
        }

    }

}