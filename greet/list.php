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
<link href="../sub5/css/content2.css" rel="stylesheet">

<script src="../common/js/prefixfree.min.js"></script>
<script src="https://kit.fontawesome.com/5bb76f58d6.js" crossorigin="anonymous"></script>

</head>
<?
	include "../lib/dbconn.php";

	
  if (!$scale)
    $scale=4;			// 한 화면에 표시되는 글 수

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

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
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
        
		<h2>채용안내</h2>
                <div class="content_top">
                   <ul>
                       <li><span>1</span>
                          <i class="fas fa-pencil-alt"></i>
                           <h3>서류전형</h3>
                           <p>직무에 맞는 대상자를
                           <br>선정합니다.</p>
                       </li>
                       <li><span>2</span>
                          <i class="far fa-clipboard"></i>
                           <h3>인성검사</h3>
                           <p>개인 성향 및 조직 적합성을
                           <br>파악합니다.</p>
                       </li>
                       <li><span>3</span>
                          <i class="fas fa-user-tie"></i>
                           <h3>면접전형</h3>
                           <p>직무수행능력 및
                           <br>성장 가능성을 평가합니다.</p>
                       </li>
                       <li><span>4</span>
                          <i class="far fa-heart"></i>
                           <h3>건강검진</h3>
                           <p>건강 상태를 확인하여
                           <br>업무 수행에 지장이 없는지
                           <br>확인합니다.</p>
                       </li>
                       <li><span>5</span>
                          <i class="fas fa-medal"></i>
                           <h3>최종합격</h3>
                           <p>최종 합격자에게
                           <br>개별적으로 안내됩니다.</p>
                       </li>
                   </ul>
                </div>

		<form  name="board_form" method="post" action="list.php?mode=search"> 
        <div id="list_top">현재 <span><?= $total_record ?>건</span>의 채용공고가 있습니다.</div>
		</form>
		
		<ul id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 7);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

?>
			<li id="list_item">
				
				<div class="time">
                    <div id="list_item1">0<?= $number ?></div>
                    <div id="list_item2"><?= $item_date ?></div>
				</div>
				<div id="list_item3"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
				<i class="fas fa-chevron-right"></i>
			</li>
<?
   	   $number--;
   }
?>
        </ul> <!-- end of list content -->
		
        <div id="button">
            <a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
                if($userid)
                {
?>
            <a href="write_form.php">글쓰기</a>
<?
                }
?>
        </div>
        <div id="page_button">
            <div id="page_num">이전&nbsp;&nbsp;&nbsp;&nbsp; 
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
       if($mode=="search"){
         echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
        }else{    

          echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
       }
    }      
}
?>			
        &nbsp;&nbsp;&nbsp;&nbsp;다음
            </div>

        </div> <!-- end of page_button -->

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
  <? include "../common/sub_foot.html" ?>
</div> <!-- end of wrap -->
<script src="../common/js/sub_slide_down.js"></script>

</body>
</html>
