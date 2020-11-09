<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "event";    //해당 게시판에 테이블명
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<link href="../common/css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="css/event.css" rel="stylesheet" type="text/css" media="all">
<link href="common/css/sub4common.css" rel="stylesheet">

<script src="../common/js/prefixfree.min.js"></script>
<script src="https://kit.fontawesome.com/5bb76f58d6.js" crossorigin="anonymous"></script>

</head>
<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=8;			// 한 화면에 표시되는 글 수

    
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
    
    <? $_GET['num']=1;
      include "common/sub_nav.html"; ?>

  <div id="content">
      <div class="title_area">
            <div class="lineMap">
                <span><a href="../index.html"><img src="common/images/home_btn.png" alt="Home"></a></span><span>&gt;</span><a href="#"><span>홍보센터</span></a><span>&gt;</span><a href="#"><strong>DSME Today</strong></a>
            </div>
        </div>
                
        <h2>DSME Today</h2>
        
        <div class="tabs">     
               <h3><a href="#" class="tab tab1">이벤트1</a></h3>     
                <div class="contlist">
                    <div class="mid_top">  
                        <div class="visual_text">
                                <p class="visual_title">제2회
                                <br>대우조선해양
                                <br>해양 안전 공모전</p>
                                <p class="visual_comment">대해양시대를 선도해 나갈 DSME의 신 제품, 신 기술 
                                <br>
                                <br>/인재 채용에 대한 대학생 여러분들의 톡톡 튀는 아이디어를 펼쳐 보세요.</p>
                        </div> 
                        <img class="mid_visual" src="../sub4/images/content1/sub4_1_mid1_visual.jpg" alt="">
                    </div>
               </div>
               <h3><a href="#" class="tab tab2">이벤트2</a></h3>
               <div class="contlist">
                   <div class="mid_top">  
                        <div class="visual_text">
                                <p class="visual_title">대우조선해양, 수출입 안전관리 최고 등급 AAA 취득</p>
                                <p class="visual_comment"> - 지난해 AA등급 취득 후 불과 1년 만에 AAA 최고 등급 상향에 성공
                                <br>대표이사 이성근이 관세청이 주관하는 수출입 안전관리 우수 공인업체 인증심사에서 최고 등급인 AAA를 취득했다고 24일 밝혔다.</p>
                        </div> 
                        <img class="mid_visual" src="../sub4/images/content1/sub4_1_mid2_visual.jpg" alt="">
                    </div>        
               </div>
               <h3><a href="#" class="tab tab3">이벤트3</a></h3>
               <div class="contlist"> 
                   <div class="mid_top">  
                        <div class="visual_text">
                                <p class="visual_title">해피니스홀영화관,
                                <br>‘시간이탈자’ 상영 </p>
                                <p class="visual_comment">
                                ▶ 상영날짜: 05/14~05/15(토,일)
                                <br>05/21~05/22(토,일)
                                <br>▶ 상영시간: 1시, 4시, 7시
                                <br>▶ 매표·문의: ☎734-8870
                                <br>
                                <br>※주말, 당일 상영작에 한해 현장 매표 원칙 (10명 이상~50명 이하 단체, 전화 예매 가능)</p>
                        </div> 
                        <img class="mid_visual" src="../sub4/images/content1/sub4_1_mid3_visual.jpg" alt="">
                    </div>                
               </div>
         </div> 
         <div id="col1">
           
            <h3>보도자료</h3>
           
            <form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
            <div id="list_search">
                <select name="scale" onchange="location.href='list.php?scale='+this.value">
                            <option value=''>보기</option>
                            <option value='1'>10</option>
                            <option value='2'>15</option>
                            <option value='3'>20</option>
                            <option value='4'>30</option>
                </select>
                <div id="list_search1">
                    <select name="find">
                        <option value='subject'>제목</option>
                        <option value='content'>내용</option>
                        <option value='nick'>별명</option>
                        <option value='name'>이름</option>
                    </select>
                </div>
                <div id="list_search2"><input type="text" name="search"></div>
                <div id="list_search3"><input type="submit"></div>
            </div>
            </form>


            <div id="list_content">
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
          $item_content     = $row[content];
          $item_date    = $row[regist_day];
          $item_date = substr($item_date, 0, 10);  
          $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

          if($row[file_copied_0]){    //첫번째 첨부이미지가 있으면..
            $item_img = './data/'.$row[file_copied_0];  //./data/2020_10_12_10_41_01_0.jpg
          }else{    //첨부된 이미지가 없으면...
            $item_img = './data/default.jpg'  ;
          }

    ?>
                <div id="list_item">
                    <div id="list_item2"><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">

                    <img src="<?=$item_img?>" alt="" width="230"
                     height="130">
                    <div id="list_name"><?= $item_subject ?></div></a></div>
                    <div id="list_item3"><?= $item_date ?></div>
                </div>
    <?
           $number--;
       }
    ?>
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

              if($mode=="search"){
                 echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
              }else{    

                  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
               }


            }      
       }
    ?>			
                &nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
                    </div>
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
                </div> <!-- end of page_button -->		
            </div> <!-- end of list content -->
            <div class="clear"></div>

        </div> <!-- end of col1 -->

  </div> <!-- end of content -->
  <? include "../common/sub_foot.html" ?>
</div> <!-- end of wrap -->
<script src="../common/js/sub_slide_down.js"></script>
<script src="../sub4/js/tab.js"></script>

</body>
</html>
