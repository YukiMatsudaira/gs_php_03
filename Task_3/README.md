# gs_php_03
7回目講義課題「php登録、表示、更新、削除」



# 課題内容  
＊卒業制作予定「わんこ飯」.  
＊犬のご飯のレシピを紹介する動画サイト.    
＊先週の状態からの変更点.  
-　仮のUIデザイン作成（スマホ推奨のデザインです）.  
-　「セレクト画面」削除.  
-　「レシピ選択画面」「マイページ画面」「編集画面」を追加.  


＊画面説明.  
・new.php=新規登録画面.  
<img src="https://user-images.githubusercontent.com/70464329/124278132-d9204680-db80-11eb-9c76-91cdc30bfc2e.png" width="20%">.  
 「ユーザー名」「Email」「パスワード」を登録.  
 全ての項目が入力されていないと登録できないようにし、エラーメッセージを表示.  
 同一ユーザー名は登録できないようにし、エラーメッセージを表示.  
 
 
・login.php=ログイン画面.  
<img src="https://user-images.githubusercontent.com/70464329/124278843-bd697000-db81-11eb-826c-ee9ae85441ea.png" width="20%">.  
 「Email」「パスワード」でログイン.  


・select_recipe.php=レシピ選択画面.  
<img src="https://user-images.githubusercontent.com/70464329/124279373-631cdf00-db82-11eb-9028-5f21896a9c0e.png" width="20%">.  
右上のアイコンのみ有効でクリックするとマイページ画面に遷移.  
その他のアイコンは未実装.  
レコメンド機能を持たせておすすめのレシピのサムネイルを画面中央に表示予定.  
サムネイルをフリック操作、もしくはアイコン選択で、「OK」「NG」できるようにする予定.  
「OK」の場合にレシピ動画を再生させる予定.  



・mypage.php=マイページ画面.  
<img src="https://user-images.githubusercontent.com/70464329/124280091-3b7a4680-db83-11eb-9512-50d87f415fd6.png" width="20%">.   
ユーザー情報をクリックすると編集画面に遷移.  
ログアウトをクリックするとログアウトし、ログイン画面に遷移.  
退会をクリックするとDBからユーザー情報を削除し、ログイン画面に遷移   



・edit_user.php=編集画面.  
<img src="https://user-images.githubusercontent.com/70464329/124280642-e428a600-db83-11eb-9ae3-960542d41767.png" width="20%">.  
仕様は新規登録画面と同じ.  



# 工夫した点/こだわった点.  
認証処理の仕組みを実装.   
SESSIONチェックの仕組みを実装.  
SESSIONリジェネレイトの仕組みを実装.  


