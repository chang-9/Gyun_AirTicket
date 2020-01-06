<?
	header('Content-Type: text/html; charset=UTF-8');
	//header('Content-Type: application/json; charset=UTF-8');

	include_once '../crawling/Snoopy.class.php';
	require_once './dbconn.php';

	$con = new DBC();//객체 생성
	$con->DBI(); //db접속
	$date = date('Y-m-d'); // 현재 날짜정보를 저장
	$refresh_time="600";

	$snoopy = new snoopy;
	$snoopy -> fetch("https://flyasiana.com/C/KR/KO/event/index?menuId=CM201802220000728483");

 	$result = $snoopy->results;
	$buff = Array();
	$pattern='/<div class="list_thumb_type01">(.*?)<\/div>/is';
	preg_match($pattern, $result, $all_text);

	$pattern = '/<a [^<>]*>/is';
	preg_match_all($pattern, $all_text[1],$arr_next);

	foreach($arr_next[0] as $value) { 
		$content = $value; 

		if(eregi("[:space:]*(href)[:space:]*=[:space:]*([^ >;]+)",$content,$regs)) { 
			$regs[2] = str_replace(Array("'",'"'),"",$regs[2]); 
			$next[] = $regs[2]; 
		}
	} 

	$pattern = '/<img [^<>]*>/is';
	preg_match_all($pattern, $all_text[1],$arr_src);
	foreach($arr_src[0] as $value) { 
		$content = $value; 

		if(eregi("[:space:]*(src)[:space:]*=[:space:]*([^ >;]+)",$content,$regs)) { 
			$regs[2] = str_replace(Array("'",'"'),"",$regs[2]); 
			$src[] = $regs[2]; 
		} 
	}

	$pattern = "/<em class=\"title\">(.*?)<\/em>/";
	preg_match_all($pattern, $all_text[1],$arr_title, PREG_SET_ORDER);
	$pattern = '/<span class="date">(.*?)<\/span>/is';
	preg_match_all($pattern, $all_text[1],$arr_date, PREG_SET_ORDER);


    //print_r($src);
	//echo $src[0]; 이미지 경로
	//echo $next[0]; 다음 페이지 경로
	//echo $arr_title[0][0]; 제목
	//echo $arr_date[0][0]; 날짜 - 일단은 필요 없음

	/*$con = new DBC();
	$con->DBI(); 
	$con->query = "insert into a_Event(a_nextpage, a_eventImage, a_eventTitle, a_eventDate, a_nick) 
	values('test','test','test',1,'test')";    
	$con->DBQ();*/

	for($i=0; $i<=23;$i++ ){
		$con->query = "insert into a_Event(a_nextpage, a_eventImage, a_eventTitle, a_eventDate, a_nick) 
		values ('".$next[$i]."', '".$src[$i]."', '".$arr_title[$i][0]."','".$date."','관리자')";
		$con->DBQ(); //쿼리 실행
		//$in = $con->conn->affected_rows;
		//echo $src[$i]; 
		//echo $next[$i];
		//echo $arr_title[$i][0];
		//echo $arr_date[$i][0];
	}
?>