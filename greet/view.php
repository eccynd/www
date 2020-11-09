<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	
    if ($is_html=="y"){
        $item_content = str_replace("&lt;","<", $item_content);
        $item_content = str_replace("&gt;",">", $item_content);
    }
    
	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="css/list.css" rel="stylesheet" type="text/css" media="all">
<link href="../sub5/common/css/sub5common.css" rel="stylesheet">

<script src="../common/js/prefixfree.min.js"></script>
<script src="https://kit.fontawesome.com/5bb76f58d6.js" crossorigin="anonymous"></script>
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>

<body>
<div id="wrap">
    <? include "../common/sub_head.html" ?>
    
    <? $_GET['num']=1;
      include "common/sub_nav.html"; ?>
  
  <div id="content">

    <h2>고객센터</h2>
    
	<div id="col2">

		<div id="view_comment"> &nbsp;</div>

		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
			                      | <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	{
?>
				<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
<? 
	if($userid )  //로인인이 되면 글쓰기
	{
?>
				<a href="write_form.php">글쓰기</a>
<?
	}
?>
		</div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
    <? include "../common/sub_foot.html" ?>
</div> <!-- end of wrap -->
<script src="../common/js/sub_slide_down.js"></script>

</body>
</html>
