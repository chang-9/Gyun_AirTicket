<?php
	header('Content-Type: text/html; charset=utf-8');
	
	class DBC
	{//필드부 
		public $con; //db접속 정보 담을 변수 
		public $query; //쿼리 담을 변수 
		public $result; //쿼리 실행 결과 담을 변수 



		public function DBI() //DB접속 후 정보를 객체의 $db필드에 담기
		{

			$this->con = new mysqli('localhost', 'webtesting0001', 'ccit1234#', 'webtesting0001'); //host, id, pw, database 순서입니다.
			$this->con->query('SET NAMES UTF8'); //$this-> : 객체 자기 자신의 멤버를 접근 하기 위한 명령
			if(mysqli_connect_errno())
			{
				echo "데이터 베이스 연동에 실패했습니다.";
				exit;
			
			}
		}

		public function DBQ() //SQL 실행으로 쿼리 실행 결과는 객체의 $result필드에 담기 (다른 파일에서 쿼리 실행 필요없이 함수만 호출 하면 알아서 해줌)
		{
			$this->result = $this->con->query($this->query);  //result=conn->query(쿼리); 
		}
		public function DBO() //DB끝
		{
			$this->result->free;  //결과 비우기 (질의 결과를 메모리에서 해제)
			$this->con->close(); //db접속 종료 
		}
	}
/*사용법
<?
require_once './dbconn.php';

$conn = new DBC; 객체 생성
$conn->DBI(); 함수 접근 (DB접속)

$conn->query = "select id, pass, permit from exeSmem where id='".$id."' and pass=password('".$pass."')"; 객체의 쿼리 변수에 대입
$conn->DBQ(); 함수 접근 (쿼리 실행)

$num = $conn->result->num_rows; 객체지향 방법 
$data = $conn->result->fetch_row();

$conn->DBO(); 함수 접근 (DB접속 해제)
?>*/
?>