<?php
class Model {
	public $pdo;
//	public $mysql;
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/

	function  __construct() {
		$this->pdo = new PDO('mysql:host=127.0.0.1;dbname=blog', 'root', '');
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//		$this->pdo->exec("set names utf8");
//		$this->mysql = new mysqli('127.0.0.1', 'root', '', 'blog', '3306');
	}
	
	// метод выборки данных
	public function get_data() {
		// todo
	}

	public function get_status_user($id) {
        $query = "SELECT `getStatusUser`($id) AS `getStatusUser`";
        $res = $this->pdo->query($query)->fetch(PDO::FETCH_ASSOC);
        return $res['getStatusUser'];
    }

	function __destruct() {
		$this->pdo = null;
	}

	public function upload_img($path, $img)
	{
		if (empty($img)) {
			return '';
		}

		$targetFile = 'upload/img/' . $path . '/' . basename($img['name']);
		$imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
		$isImage = $imageFileType == "jpg"
			|| $imageFileType == "png"
			|| $imageFileType == "jpeg"
			|| $imageFileType == "gif";

		$_SESSION['msgError'] = '';
		$_SESSION['isError'] = true;

		if (file_exists($targetFile)) {
			return '/'.$targetFile;
		}

		if ($img["size"] > 500000) {
			$_SESSION['msgError'] = "Sorry, your file is too large";
			return '';
		}

		if (!$isImage) {
			$_SESSION['msgError'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
			return '';
		}

		move_uploaded_file($img["tmp_name"], $targetFile);
		$_SESSION['msgError'] = '';
		$_SESSION['isError'] = false;

		return '/'.$targetFile;
	}
}