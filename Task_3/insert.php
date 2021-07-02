<?php
    // POSTデータ取得
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass= $_POST["pass"];

    if ( $email == "" || $pass == "" ){
        exit("未入力の項目があります");
    }else{
        // DB接続
        include("funcs.php");
        $pdo = db_connect();

        // データ登録SQL作成
        $stmt = $pdo->prepare("SELECT * FROM t_table WHERE name IN('$name')");
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $status = $stmt->execute();

        if ($status==false){
            $error = $stmt->errorInfo();
            exit("ErrorQuery:".$error[2]);
        }else{
            $result = $stmt->fetch();
            if($result > 0){
                exit("登録済みのユーザー名です");
            }else{
                // データ登録SQL作成
                $stmt = $pdo->prepare("INSERT INTO t_table(id, name, email, pass, indate )VALUES(NULL, :name, :email, :pass, sysdate())");
                $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
                $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
                $status = $stmt->execute();

                // データ登録処理後
                if ($status==false) {
                    $error = $stmt->errorInfo();
                    exit("QueryError:".$error[2]);
                } else {
                    header("Location: login.php");
                    exit;
                }
            }
        }
    }
?>