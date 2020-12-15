<!-- URL: http://localhost/Source/Eng001_database.php -->
<!-- URL: http://program-basic.com/php/source/database/waverlife_Eng001_database.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
<MEAT chaeset="UTF-8">
<title> PHP </title>
</head>
<body>
  <header>
	<h1>PHPの教科書</h1>
	<style type="text/css">
	 h2{color:red;}
	 .sub_comment{ color:blue ; }
	</style>
  </header>
  
  <main>
    <h2> PHP ソース　</h2>
    <dev class="sub_comment">
   <?php
   $dsn = 'mysql:dbname=waverlife_eng001;host=localhost:3306';
   $user = 'waver_waverlife';
   $password = 'WaverLife001';
   $username = htmlspecialchars($_REQUEST['my_name'], ENT_QUOTES);
   $tablename = '顧客マスタ' ;
   
   try{
       $dbh = new PDO($dsn, $user, $password
		,  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
	);

    $sql = 'select * from ' . $tablename;
    print ( "SQL文" . $sql );
    print ( "顧客名" . $username );
    print('<br />');

    foreach ($dbh->query($sql) as $row) {
        if ( $username == "" ) {
  	print($row['顧客番号']."\t");
	print($row['顧客名']."\t");
        	print($row['郵便番号']."\t");
        	print($row['住所']."\t");
        	print($row['電話番号']);
        	print('<br />');
        } else {
              if ( $username == $row['顧客名'] ) {
	print($row['顧客番号']."\t");
	print($row['顧客名']."\t");
        	print($row['郵便番号']."\t");
        	print($row['住所']."\t");
        	print($row['電話番号']);
        	print('<br />');
            }
        }
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?> 

    </dev>
  </main>

  <footer>
  </footer>
</body>
</html>