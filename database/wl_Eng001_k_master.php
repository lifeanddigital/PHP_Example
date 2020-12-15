<!-- https://program-basic.com/php/source/database/wl_Eng001_k_master.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
	<MEAT chaeset="UTF-8">
	<title>PHP Sample</title>
	<style type="text/css">
		 h2{color:red;}
		 .sub_comment{ color:blue ; }
		 .sub_sql { color:green ; }
	</style>
</head>

<body>
<header>
	<h1>データベース検索サンプルプログラム</h1>
</header>
<main>
<?php
	// 変数の設定
	$dsn = 'mysql:dbname=waverlife_eng001;host=localhost';
	$tablename = '顧客マスタ' ;
	$username = file_get_contents('user.txt');
	// $username = '**********' ;
	$password = file_get_contents('password.txt');
	// $password = '***********' ;
	// データベース接続
	try {
		$dbh = new PDO($dsn, $username, $password,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
	);

	// SQL文の作成
	$sql = 'select * from ' . $tablename;

	// SQL実行
	$res = $dbh->query($sql);

	// エラー処理
	} catch (PDOException $e){
    		print('Error:'.$e->getMessage()); die();
    	}

	// インスタンスクリア
	$dbh = null;
?> 
<h2>顧客マスタ検索</h2>

//SQL文の表示
<dev class="sub_sql">
    <?php  print("SQL文 : ".$sql); print('<br>');  ?>　
</dev>

// テーブル表示
<dev class="sub_comment">
   <table  border="1">
   <?php  foreach ($res as $row)   :  ?>
	<td>
	<td> <?php print( htmlspecialchars( $row['顧客番号'])); ?></td> 
	<td> <?php print( htmlspecialchars( $row['顧客名'])); ?></td>
	<td> <?php print( htmlspecialchars( $row['郵便番号'])); ?></td>
	<td> <?php print( htmlspecialchars( $row['住所'])); ?></td>
	<td> <?php print( htmlspecialchars( $row['電話番号']));?></td> 
	</tr>
  <?php endforeach ?> 
  </table>
  </dev>
  </main>

<footer> </footer>
</body>
</html>