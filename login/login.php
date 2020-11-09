<?
           session_start();
?>    
    <meta charset="UTF-8">

<?
   @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 
  
// $id    (post방식으로)
// $pass  (post방식으로)
  

   if(!$id) {   
     echo("
           <script>
             window.alert('아이디를 입력하세요');
             history.go(-1);
           </script>
         ");
         exit;
   }

   if(!$pass) {
     echo("
           <script>
             window.alert('패스워드를 입력하세요');
             history.go(-1);
           </script>
         ");
         exit;
   }

 

   include "../lib/dbconn.php";

   $sql = "select * from member where id='$id'";  // aaa
   $result = mysql_query($sql, $connect);  //있으면 1 없으면 null

   $num_match = mysql_num_rows($result);  //1 null

   if(!$num_match)  // 검색 레코드가 없으면
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다');
             history.go(-1);
           </script>
         ");
    }
    else    // 검색 레코드가 있으면
    {
		 $row = mysql_fetch_array($result); 
          //$row[id] ,.... $row[level]
         $sql ="select * from member where id='$id' and pass=password('$pass')";
         $result = mysql_query($sql, $connect);
         $num_match = mysql_num_rows($result); 
     
  

        if(!$num_match)  
        {
           echo("
              <script>
                window.alert('패스워드가 일치하지 않습니다.');
                history.go(-1);
              </script>
           ");

           exit;
        }
        else    //아이디와 패드워드가 모두 일치한다면 
        {
           $userid = $row[id];
		   $username = $row[name];
		   $usernick = $row[nick];
		   $userlevel = $row[level];
  
            
           // 필요한 세션 변수를 생성한다 (가장 중요)
           $_SESSION['userid'] = $userid;//$_SESSION['userid'] = $row[id];
           $_SESSION['username'] = $username;//$_SESSION['username'] = $row[name];
           $_SESSION['usernick'] = $usernick;//$_SESSION['usernick'] = $row[nick];
           $_SESSION['userlevel'] = $userlevel;//$_SESSION['userlevel'] = $row[level];

           echo("
              <script>
			    alert('로그인이 되었습니다');
                location.href = '../index.html';
              </script>
           ");
        }
   }          
?>
