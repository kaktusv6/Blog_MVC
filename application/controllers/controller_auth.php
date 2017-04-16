<?php

const SIZE_NAME = 3;
const SIZE_PAS = 6;
const DAY = 86400;
const HOUR = 3600;

class Controller_Auth extends Controller {

    function __construct() {
        parent::__construct();
        $this->model = new Model_Auth();
    }

    function action_index() {
        $_SESSION['msgError'] = '';
        $_SESSION['isError'] = false;
        
        if (isset($_COOKIE['idUser']) && !empty($_COOKIE['idUser'])) {
            $_SESSION['idUser'] = $_COOKIE['idUser'];
            header("Location: http://kefirblog.mvc.ru/auth/personal_area/");
        }

        if (isset($_POST) && !empty($_POST)) {
            if (!$this->model->is_user_register($_POST['email'])) {
                $_SESSION['msgError'] = 'This user is not registered';
            }
            elseif (!$this->model->check_pas($_POST['email'], $_POST['pas'])) {
                $_SESSION['msgError'] = 'Incorrect password';
            }
            else {
                $_SESSION['idUser'] = $this->model->get_id_user($_POST['email']);
                setcookie('idUser', $_SESSION['idUser'], time() + DAY);
                header("Location: http://kefirblog.mvc.ru/auth/personal_area/");
            }
            $_SESSION['isError'] = true;
        }

        $this->view->generate();
    }

    function action_sign_up() {
        $_SESSION['msgError'] = '';
        $_SESSION['isError'] = false;

        if (isset($_COOKIE['idUser']) && !empty($_COOKIE['idUser'])) {
            $_SESSION['idUser'] = $_COOKIE['idUser'];
            header("Location: http://kefirblog.mvc.ru/auth/personal_area/");
        }

        if (isset($_POST) && !empty($_POST)) {
            if (strlen($_POST['name']) < SIZE_NAME) {
                $_SESSION['msgError'] = 'Small name';
            }
            elseif (strlen($_POST['pas']) < SIZE_PAS) {
                $_SESSION['msgError'] = 'Small password';
            }
            elseif ($_POST['pas'] !== $_POST['pas_con']) {
                $_SESSION['msgError'] = 'Incorrect confirm password';
            }
            elseif ($this->model->is_user_register($_POST['email'])) {
                $_SESSION['msgError'] = 'This user is already registered';
            }
            else {
                $this->model->reg_user($_POST);
                $_SESSION['idUser'] = $this->model->get_id_user($_POST['email']);
                setcookie('idUser', $_SESSION['idUser'], time() + DAY);
                header("Location: http://kefirblog.mvc.ru/auth/personal_area/");
            }
            $_SESSION['isError'] = true;
        }

        $this->view->generate('sign_up');
    }

    function action_personal_area() {
        if (!isset($_COOKIE['idUser']) || empty($_COOKIE['idUser'])) {
            header("Location: http://kefirblog.mvc.ru/auth/");
            return;
        }
        
        if(isset($_GET['logout'])) {
            setcookie('idUser', '', time() - HOUR, '/auth');
            header("Location: http://kefirblog.mvc.ru/auth/");
            return;
        }

        if(isset($_FILES['urlImg']) && !empty($_FILES['urlImg'])) {
            $this->model->set_avatar_user($_SESSION['idUser'], $_FILES['urlImg']);
            header("Location: http://kefirblog.mvc.ru/auth/personal_area/");
            return;
        }

        if (isset($_GET['change_info'])) {
            header('Location: http://kefirblog.mvc.ru/auth/edit_info/');
            return;
        }

        $this->view->generate('personal_area', $this->model->get_data_user($_COOKIE['idUser']));
    }

    function action_edit_info() {
        if (!isset($_COOKIE['idUser']) || empty($_COOKIE['idUser'])) {
            header("Location: http://kefirblog.mvc.ru/auth/");
            return;
        }

        if(isset($_POST) && !empty($_POST)) {
            $_SESSION['msgError'] = '';
            $_SESSION['isError'] = false;

            if (strlen($_POST['name']) < SIZE_NAME) {
                $_SESSION['msgError'] = 'Small name';
            }
            else {
                $this->model->set_name_user($_COOKIE['idUser'], $_POST['name']);
                $this->model->set_email_user($_COOKIE['idUser'], $_POST['email']);
                $this->model->set_birthday_user($_COOKIE['idUser'], $_POST['birthday']);
                header("Location: http://kefirblog.mvc.ru/auth/personal_area/");
                return;
            }
            $_SESSION['isError'] = true;
        }

        $this->view->generate('edit_info', $this->model->get_data_user($_COOKIE['idUser']));
    }
    
    function action_successful_registration() {
        $this->view->generate('successful_registration');
    }
}