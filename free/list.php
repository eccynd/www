<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "free";
	$ripple = "free_ripple";
?>
<!DOCTYPE html>
<html lang="ko">
<head> 
<meta charset="utf-8">
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="css/list.css" rel="stylesheet" type="text/css" media="all">
<link href="../sub5/common/css/sub5common.css" rel="stylesheet">

<script src="../common/js/prefixfree.min.js"></script>
<script src="https://kit.fontawesome.com/5bb76f58d6.js" crossorigin="anonymous"></script>
</head>
<?
	include "../lib/dbconn.php";
	$scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}
		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);
	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
<body>
<div id="wrap">
    <? include "../common/sub_head.html" ?>
    
    <? include "common/sub_nav.html"; ?>

  <div id="content">
	<div class="title_area">
        <div class="lineMap">
            <span><a href="../index.html"><img src="common/images/home_btn.png" alt="Home"></a></span><span>&gt;</span><a href="#"><span>고객지원</span></a><span>&gt;</span><a href="#"><strong>고객센터</strong></a>
        </div>
    </div>
	<div id="col2">       
	 
		<h2>고객센터</h2>

		<form  name="board_form" method="post" action="list.php?mode=search"> 
        <div id="list_top">현재 <span><?= $total_record ?>개</span>의 게시물이 있습니다.</div>
		<div id="list_search">
            <select name="scale" onchange="location.href='list.php?scale='+this.value">
                        <option value=''>보기</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
            </select>
			<div id="list_search1">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select></div>
			<div id="list_search2"><input type="text" name="search"></div>
			<div id="list_search3"><input type="submit" value="찾기"></div>
		</div>
		</form>

		<div id="list_top_title">
			<ul>
				<li id="list_title1">번호</li>
				<li id="list_title2">제목</li>
				<li id="list_title3">글쓴이</li>
				<li id="list_title4">등록일</li>
				<li id="list_title5">조회</li>
			</ul>		
		</div>

		<ul id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);     // 포인터 이동        
      $row = mysql_fetch_array($result); // 하나의 레코드 가져오기	      
      
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	  $sql = "select * from $ripple where parent=$item_num";
	  $result2 = mysql_query($sql, $connect);
	  $num_ripple = mysql_num_rows($result2);

?>
			<li id="list_item">
				<div id="list_item1"><?= $number ?></div>
				<div id="list_item2"><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a>
        <div class="ripple_num">
<?
		if ($num_ripple)
				echo " [$num_ripple]";
?>      </div>
				</div>
				<div id="list_item3"><?= $item_nick ?></div>
				<div id="list_item4"><?= $item_date ?></div>
				<div id="list_item5"><?= $item_hit ?></div>
			</li>
<?
   	   $number--;
   }
?>
        </ul> <!-- end of list content -->
        
        <div id="button">
            <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
            if($userid)
            {
?>
            <a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
            }
?>
        </div>
        <div id="page_button">
            <div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
// 게시판 목록 하단에 페이지 링크 번호 출력
for ($i=1; $i<=$total_page; $i++)
{
    if ($page == $i)     // 현재 페이지 번호 링크 안함
    {
        echo "<b> $i </b>";
    }
    else
    { 
        echo "<a href='list.php?table=$table&page=$i'> $i </a>";
    }      
}
?>			
        &nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
            </div>
        </div> <!-- end of page_button -->

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
  <? include "../common/sub_foot.html" ?>
</div> <!-- end of wrap -->
<script src="../common/js/sub_slide_down.js"></script>

</body>
</html>