<?php
class Controller_Main extends Controller {
    
    function __construct() {
        parent::__construct();
        $this->model = new Model_Main();
    }

    function action_index() {
        $this->view->generate(null, $this->model->get_news());
    }
}