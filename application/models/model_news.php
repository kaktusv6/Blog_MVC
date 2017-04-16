<?php
class Model_News extends Model {

    function get_new($id) {
        $query = "CALL getNew($id)";
        return $this->pdo->query($query)->fetch(PDO::FETCH_OBJ);
    }
    
    function create_news($title, $text) {
        $data = date("Y-m-d");
    }
}