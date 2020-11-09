<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="css/list.css" rel="stylesheet" type="text/css" media="all">
<link href="../sub5/common/css/sub5common.css" rel="stylesheet">

<script src="../common/js/prefixfree.min.js"></script>
<script src="https://kit.fontawesome.com/5bb76f58d6.js" crossorigin="anonymous"></script>
</head>

<body>
<div id="wrap">
    <? include "../common/sub_head.html" ?>
    
    <? $_GET['num']=1;
      include "common/sub_nav.html"; ?>
      
  <div id="content">
   
    <h2>고객센터</h2>
    
	<div id="col2">        

		<div id="write_form_title">
			글쓰기
		</div>

		<form  name="board_form" method="post" action="insert.php"> 
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1"> 닉네임 </div>
				<div class="col2"><?=$usernick?></div>
				<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject"></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button"><input type="submit" value="등록">&nbsp;
								<a href="list.php?page=<?=$page?>">나가기</a>
		</div>
		</form>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
    <? include "../common/sub_foot.html" ?>
</div> <!-- end of wrap -->
<script src="../common/js/sub_slide_down.js"></script>

</body>
</html>