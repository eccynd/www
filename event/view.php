<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];  //첨부파일의 실제이름
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];    //날짜/시간 바뀐이름
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
	
	for ($i=0; $i<3; $i++) //첨부된 이미지 처리를 위한 반복문
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명)
            //    => 배열형태의 리턴값
              // => 파일의 너비와 높이값, 종류
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

        if ($image_width[$i] > 785) //첨부된 이미지의 최대너비를 785지정
				$image_width[$i] = 785;
		}
		else  //업로드된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="css/event.css" rel="stylesheet" type="text/css" media="all">
<link href="../sub4/common/css/sub4common.css" rel="stylesheet">

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
  <div id="header">
    <? include "../common/sub_head.html"; ?>
    
    <? $_GET['num']=1;
      include "common/sub_nav.html"; ?>

  <div id="content">
   
    <h2>보도자료</h2>

	<div id="col2">        

		<div id="view_comment"> &nbsp;</div>
		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
			                      | <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
<?
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid && ($userid==$item_id))
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
<? 
	if($userid)
	{
?>
				<a href="write_form.php?table=<?=$table?>">글쓰기</a>
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
