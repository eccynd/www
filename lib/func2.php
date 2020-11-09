<?
   function latest_article2($table, $loop, $char_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);
        $tnum=1;
       
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
            $tdate=explode("-", $regist_day);
            
			echo " 
                <li>
                   <div class='time'>
                       <b>0$tnum</b>
                       <span>$tdate[0].$tdate[1]</span>
                   </div>
                    
                    <a href='./$table/view.php?table=$table&num=$num'>$subject
                    <i class='fas fa-chevron-right'></i>
                    </a>

                        
                   
                </li>
                ";
            
            
           $tnum++; 
		}
		mysql_close();
   }
?>



