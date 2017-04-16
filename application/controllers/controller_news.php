<?php

const STATUS_ADMIN = 1;

class Controller_News extends Controller {

    function __construct() {
        parent::__construct();
        $this->model = new Model_News();
    }

    function action_detail($id) {
        // TODO: проверить на существование новости с такой id
        // если нету выкидывать 404

//        pp($this->model->get_new($id));
        $this->view->generate('detail');
    }

    function action_create_news() {
        if (isset($_COOKIE['idUser']) && !empty($_COOKIE['idUser'])) {
            $statusCurUser = $this->model->get_status_user($_COOKIE['idUser']);
            if ($statusCurUser != STATUS_ADMIN) {
                header('Location: http://kefirblog.mvc.ru/auth/');
                return;
            }
        }

        if (isset($_POST) && !empty($_POST)) {
            $_SESSION['msgError'] = '';
            $_SESSION['isError'] = true;
            if (empty($_POST['titleNews'])) {
                $_SESSION['msgError'] = 'Please enter title for news';
            }
            else if (empty($_POST['textNews'])) {
                $_SESSION['msgError'] = 'Please enter text for news';
            }
            else {
                $this->model->create_news($_POST['titleNews'], $_POST['textNews']);
            }
        }

        $this->view->generate('create_news');
    }

    function action_edit_info($id) {
        $this->view->generate('edit_info');
    }
}