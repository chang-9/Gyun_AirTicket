<meta http-equiv="content-type" content="text/html; charset=UTF-8"> <!--인코딩-->

<?
// 스누피 인클루드 (경로 주의 하세요)
	include_once '../crawling/Snoopy.class.php';
	require_once './dbconn.php';
	$con = new DBC();//객체 생성
	$con->DBI(); //db접속

	$date = date('Y-m-d'); // 현재 날짜정보를 저장
	$refresh_time="600";
	$snoopy = new snoopy;// 스누피 객체 생성
	

	$src = Array();
	$next = Array();
	$snoopy -> fetch("https://flyasiana.com/C/KR/KO/event/index?menuId=CM201802220000728482");// fetch를 이용하여 스누피 객체에 빗썸 API의 모든 내용 담기
	$result = $snoopy->results;

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
//print_r($next); 
//print_r($src); 


//preg_match("/<em class="title">(.*?)<\/em>/", $text[1], $file_path, PREG_SET_ORDER);
//preg_match('/<li>(.*?)<\/li>/is' ,$text[1], $match);

/*$query = "INSERT INTO a_Event (a_nick, image src, title, date) VALUES (관리자,'".$a_eventImage."','".$a_eventTitle."', '".$a_eventDate."')";
$con->DBQ();
$num = $con->result->num_rows;*/
//str_replace ('/<em class="title">(.*?)</em>/is',"",$content)
//preg_match('/<li>(.*?)<\/li>/is',$snoopy->results, $content)
//preg_replace('/<div class="list_thumb_type01">(.*?)<\/div>/is','' , $text);
//str_replace('<ul>', 'http://blog.naver.com', $text );
//preg_match_all("|<img src\"=\"(.*)\"|U", $result, $file_path, PREG_SET_ORDER);

//preg_match('/<span class="thumb">(.*?)<\/span>/is', $snoopy->results, $text);
//preg_match_all("|closing_price\":\"(.*)\",\"min_price|U", $result, $name, PREG_SET_ORDER);
//preg_match($total, $snoopy->results, $result);
//preg_match($pattern, $snoopy->results, $total);

//$arr_data[1] = li class 출력
//$arr_data[2] = span 첫번째 내용 출력
//$arr_data[3] = span 두번째 내용 출력

//print_r($arr_title);

for($i=0; $i<=22;$i++ ){
		$con->query = "insert into a_Event(a_nextpage, a_eventImage, a_eventTitle, a_eventDate, a_nick,a_eventContent) 
		values ('".$next[$i]."', '".$src[$i]."', '".$arr_title[$i][0]."','".$date."','관리자','".$arr_date[$i][0]."')";
		$con->DBQ(); //쿼리 실행
		//$in = $con->conn->affected_rows;
		echo $src[$i]; 
		echo $next[$i];
		echo $arr_title[$i][0];
		echo $arr_date[$i][0];
	}
				
//$snoopy->cookies["SessionID"]='VeXfq2VBap6P8nXny0QaDugBto7y1E7kbxV1skHqkaxMEYHl0hVtWD7ZU24veQmr.eJAWAS3_servlet_ibe1' ;
//$snoopy->referer = "https://kr.koreanair.com/korea/ko.html";
//$snoopy -> fetch("https://kr.koreanair.com/korea/ko/detailDiscountTicket.html#step1");
//$t=explode("<ul>",$snoopy->results); 
//$r=explode("<ul>",$t[0]);
//$total ='/<div class="list_thumb_type01">(.*?)<\/div>/is';
//$result = iconv("euc-kr","UTF-8",$result);

				
	//echo $arr_next[$i][0];
	//echo $arr_src[$i][0];
	//echo $arr_title[$i][0];
	//echo $arr_date[$i][0];


//echo $r[0];
//echo $total[2];
//print $text[0];
//echo $pattern[1];
//echo $content[0];


/*
$date = date('Y-m-d'); // 현재 날짜정보를 저장

$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "./EventImages/".$filename;
move_uploaded_file($tmpfile,$folder);

$sql = mq("insert into a_Event(a_nick,a_eventTitle,a_eventContent,a_eventDate,a_eventImage) values('".$_POST['a_nick']."','".$_POST['a_eventTitle']."','".$_POST['a_eventContent']."','".$date."','".$o_name."')");
// a_Event 테이블에 이름, 제목, 내용, 날짜를 입력*/


?>
