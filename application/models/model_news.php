<?php
class Model_News extends Model {

    function get_news($id) {
        $query = "CALL getNew($id)";
        return $this->pdo->query($query)->fetch(PDO::FETCH_OBJ);
    }
    
    function create_news($title, $text, $urlImg, $countChars = 100) {
        $data = date("Y-m-d");
        $query = "CALL addNews('$title', '$data', '$text', '$urlImg', $countChars)";
        $this->pdo->query($query);
        $_SESSION['successfulText'] = 'Successful add news';
    }
}