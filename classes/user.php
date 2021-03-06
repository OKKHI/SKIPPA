<?php
	// スーパークラスであるDbDataを利用するため
  	require_once __DIR__ . '/dbdata.php';
  	class User extends DbData{
  		//ログイン認証
  		public function authUser($userId,$password){
  			$sql = "select * from users where userId=? and password=?";
  			$stmt = $this->query($sql, [$userId,$password]);
  			return $stmt->fetch();
  		}
      //ユーザー登録処理
      public function signUp($userId,$userName,$kana,$nickName,$zip,$address,$tel,$license,$password,$tempId){
          $sql = "select * from users where userId=?";
          $stmt = $this->query($sql,[$userId]);
          $result = $stmt->fetch();
          //登録しようとしているユーザーID(Eメール)がすでに登録されているなら
          if($result['userId']){
            return 'この'.$userId.'は既に登録されています。';
          }
          $sql = "insert into users(userId,userName,kana,nickName,zip,address,tel,license,password) values(?,?,?,?,?,?,?,?,?)";
          $result = $this->exec($sql, [$userId,$userName,$kana,$nickName,$zip,$address,$tel,$license,$password]);
          if($result){
            //登録に成功した場合、cart内に保存されている商品があれば登録したユーザーIDに変更する(ログイン時と同じ処理)
            //$this->changeCartUserId($tempId,$userId);
            return "";
          }else{
            //失敗した場合
            return '新規登録できませんでした。管理者にお問い合わせください。';
          }
      }

      public function updateUser($userId,$userName,$kana,$nickName,$zip,$address,$tel,$tempId){
          $sql = "update users set userId=?,userName=?,kana=?,nickName=?,zip=?,address=?,tel=? where userId=?";
          $result=$this->exec($sql,[$userId,$userName,$kana,$nickName,$zip,$address,$tel,$tempId]);
      }
  	}
