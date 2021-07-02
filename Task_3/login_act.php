<?php
    session_start();
    
    $email = $_POST["email"];
    $pass= $_POST["pass"];

    // DB接続
    include("funcs.php");
    $pdo = db_connect();

    // データ登録SQL作成
    $sql = "SELECT * FROM t_table WHERE email=:email AND pass=:pass";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':pass', $pass);
    $status = $stmt->execute();

    // データ登録処理後
    if ($status==false) {
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        $error = $stmt->errorInfo();
        exit("QueryError:".$error[2]);
    } 

    // 抽出データ数を取得
    $val = $stmt->fetch();  // 1レコードだけ取得

    // SESSIONに値代入
    if ( $val["id"] != "" ){
        $_SESSION["chk_ssid"] = session_id();
        $_SESSION["id"] = $val['id'];
        $_SESSION["name"] = $val['name'];
    
        header("Location: select_recipe.php");
    }else{
        header("Location: login.php");
    }

    exit;

?>