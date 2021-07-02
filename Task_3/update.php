<?php
    session_start();
    include("funcs.php");
    loginCheck();

    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $id = $_POST["id"];

    if ( $name == "" || $email == "" || $pass == "" ){
        exit("未入力の項目があります");
    }else{
        try {
            $pdo = new PDO('mysql:dbname=dog_db;charset=utf8;host=localhost', 'root', 'root');
        } catch (PDOException $e) {
            exit('DbConnectError:'.$e->getMessage());
        }

        $stmt = $pdo->prepare("UPDATE t_table SET name=:name, email=:email, pass=:pass WHERE id=:id");
        $stmt->bindValue(':name', $name, PDO::PARAM_STR); 
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $status = $stmt->execute();

        if ($status==false) {
            $error = $stmt->errorInfo();
            exit("QueryError:".$error[2]);
        } else {

            $result = $stmt->fetch();
            if($result > 0){
                exit("登録済みのユーザー名です");
            }else{
                header("Location: mypage.php");
                exit;
            }
        }
    }
?>