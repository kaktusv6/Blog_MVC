<?php
class Model_Auth extends Model {
    
    function get_id_user($email) {
        $query = "SELECT `getUserId`('$email') AS `getUserId`";
        $res = $this->pdo->query($query)->fetch();
        return $res['getUserId'];
    }

    function get_name_user($id) {
        $query = "SELECT `getNameUser`('$id') AS `getNameUser`";
        $res = $this->pdo->query($query)->fetch();
        return $res['getNameUser'];
    }
    
    function get_pas_user($email) {
        $query = "SELECT `getPasUser`('$email') AS `getPasUser`";
        $res = $this->pdo->query($query)->fetch();
        return $res['getPasUser'];
    }

    function get_email_user($id) {
        $query = "SELECT `getEmailUser`('$id') AS `getEmailUser`";
        $res = $this->pdo->query($query)->fetch();
        return $res['getEmailUser'];
    }

    function get_birthday_user($id) {
        $query = "SELECT `getBirthdayUser`('$id') AS `getBirthdayUser`";
        $res = $this->pdo->query($query)->fetch();
        return $res['getBirthdayUser'];
    }

    function get_status_user($id) {
        $query = "SELECT `getStatusUser`('$id') AS `getStatusUser`";
        $res = $this->pdo->query($query)->fetch();
        return $res['getStatusUser'];
    }
    
    function get_url_image_user($id) {
        $query = "SELECT `getUrlImgUser`('$id') AS `getUrlImgUser`";
        $res = $this->pdo->query($query)->fetch();
        return $res['getUrlImgUser'];
    }
    
    function get_data_user($id) {
        $query = "SELECT name, email, status, birthday, url_image FROM users WHERE id = ".$id;
        $res  = $this->pdo->query($query)->fetch();

        return array(
            'name' => $res['name'],
            'email' => $res['email'],
            'status' => $res['status'],
            'birthday' => $res['birthday'],
            'urlImage' => $res['url_image']
        );
    }
    
    function is_user_register($email) {
        $query = "SELECT `isRegisterNewUser`('$email') AS `isRegisterNewUser`";
        $res = $this->pdo->query($query)->fetch();
        return $res['isRegisterNewUser'];
    }

    function reg_user($userInfo) {
        $defaultUrlImage = '/upload/img/avatars/default.png';
        $query = "INSERT INTO users (name, email, birthday, password, url_image)
                  VALUES (
                    '".$userInfo['name']."',
                    '".$userInfo['email']."',
                    '".$userInfo['birthday']."',
                    '".md5($userInfo['pas'])."',
                    '$defaultUrlImage'
                  )";
        $this->pdo->query($query);
    }
    
    function check_pas($email, $pas) {
        $pasOrig = $this->get_pas_user($email);
        $pas = md5($pas);
        
        return $pas === $pasOrig;
    }
    
    function set_avatar_user($id, $file) {
        $targetFile = 'upload/img/avatars/'.basename($file['name']);
        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
        $isImage = $imageFileType != "jpg"
                && $imageFileType != "png"
                && $imageFileType != "jpeg"
                && $imageFileType != "gif";

        $_SESSION['isError'] = true;
        if (file_exists($targetFile)) {
            $targetFile = '/'.$targetFile;
            $query = "CALL `setUrlImgUser`($id, '$targetFile')";
            $this->pdo->query($query);
        }
        else if ($file["size"] > 500000) {
            $_SESSION['msgError'] = "Sorry, your file is too large";
        }
        else if ($isImage) {
            $_SESSION['msgError'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
        }
        else {
            move_uploaded_file($file["tmp_name"], $targetFile);
            $_SESSION['isError'] = false;

            $targetFile = '/'.$targetFile;
            $query = "CALL `setUrlImgUser`($id, '$targetFile')";
            $this->pdo->query($query);
        }
    }

    function set_name_user($id, $name) {
        $query = "CALL `setNameUser`($id, '$name')";
        $this->pdo->query($query);
    }

    function set_email_user($id, $email) {
        $query = "CALL `setEmailUser`($id, '$email')";
        $this->pdo->query($query);
    }

    function set_birthday_user($id, $birthday) {
        $query = "CALL `setBirthdayUser`($id, '$birthday')";
        $this->pdo->query($query);
    }
}