<?php
class Model_Main extends Model {

    function get_news() {
        $query = "CALL getNews()";
        return $this->pdo->query($query)->fetch(PDO::FETCH_OBJ);
    }
}