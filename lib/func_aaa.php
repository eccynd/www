<?
   function latest_article($table, $loop, $char_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);               
                                                       $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

            //목록 이미지 경로 불러오기
            if($table=='concert'){
			$img_name = $row[file_copied_0]; //첨부된 첫번째 날짜로 된 파일명
            //2020_10_12_13_15_49_0.jpg
			if($img_name){ //삽입된 첫번째 이미지가 있으면
				$img_name = "./$table/data/".$img_name;
			}else{ //삽입된 첫번째 이미지가 없으면
				$img_name = "./$table/data/default.jpg"; 
            }
			}
            
            if($table=='greet'){
                echo "      
				<div class='col1'>
				<a href='./$table/view.php?table=$table&num=$num'>
				$subject</a>
                </div> <div class='col2'>$regist_day</div>
				<div class='clear'></div>
			";
                
            }else if($table=='concert'){


			echo "      
				<div class='col1'>
				<a href='./$table/view.php?table=$table&num=$num'>
				<img src='$img_name' width='80' height='60'>
				$subject</a>
                </div> <div class='col2'>$regist_day</div>
				<div class='clear'></div>
			";
            }
		}
		mysql_close();
   }
?>