<html>
<head>
  <title>NGINX->PHP->MYSQL CONNECT TEST</title>
  <style>
    table {border-collapse:collapse;}
    td {border:solid 1px; padding:0.5em;}
  </style>
</head>
<body>
<?php
  #$dbhost = getenv('MYSQL_PORT_3306_TCP_ADDR');
  $dbhost = 'mysql'  #linkname
  $dsn = 'mysql:dbname=test_database;host=' . $dbhost;

  try{
      $dbh = new PDO($dsn, 'user1', 'pass1');

      if ($dbh == null){
          print('connect error<br>');
      }else{
          $stmt = $dbh->query('select * from test_table');

          print('<table>');
          while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
              print('<tr>');
              print('<td>'.$result['id'].'</td>');
              print('<td>'.$result['name'].'</td>');
              print('</tr>');
          }
          print('</table>');
      }

  }catch (PDOException $e){
      print('Error:'.$e->getMessage().'<BR>');
      print('dsn='.$dsn.'<BR>');
      die();
  }
  $dbh = null;
?>
</body>
</html>

