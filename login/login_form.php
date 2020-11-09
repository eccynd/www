<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link href="css/login_form.css" rel="stylesheet">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/5bb76f58d6.js" crossorigin="anonymous"></script>  
    
</head>
<body>
  <div id="wrap">
	 <? include "../common/sub_head.html" ?>
  
	<div id="col">
        <form  name="member_form" method="post" action="login.php"> 
		<div id="title">
            <h3>로그인</h3>
		</div>
       
		<div id="login_form">
		     <p>회원님의 아이디와 비밀번호를 입력해주세요</p>

			 <div id="login">
				<div id="id_input_button">
					<div id="id_pw_input">
						<ul>
						<li><input type="text" name="id" class="login_input" placeholder="ID"></li>
						<li><input type="password" name="pass" class="login_input" placeholder="Password"></li>
						</ul>						
					</div>
					<div id="login_button"><input type="submit" value="로그인"></div>
				</div>

				<div id="join_button"><a href="../member/join.html">회원가입</a></div>
			 </div>			 
		</div> <!-- end of form_login -->

	    </form>
	</div> <!-- end of col -->
	 <? include "../common/sub_foot.html" ?>
  </div> <!-- end of content -->    
    
</body>
</html>