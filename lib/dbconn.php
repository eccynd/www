<?
    $connect=mysql_connect( "localhost", "eccynd", "hjp1630319!") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("eccynd",$connect);
?>
