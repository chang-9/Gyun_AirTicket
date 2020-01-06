<?
   header('Content-Type: text/html; charset=utf-8');
session_start();
	class layout
   {




      public function head(){

				if(!isset($_SESSION['id'])){
					echo '
						<header id="header">
							<div class="top-bar_sub container-fluid">
								<div class="row">
									<div class="col-md-4 top-forms text-left mt-4"  data-aos="fade-up">
										<span>Schedule Killer</span>
										<span class="mx-lg-4 mx-md-2  mx-1">
											<a href="http://webtesting0001.dothome.co.kr/airticket/login.php">
												<i class="fas fa-lock"></i>로그인
											</a>
										</span>
										<span>
											<a href="http://webtesting0001.dothome.co.kr/airticket/register.php">
												<i class="far fa-user"></i>회원가입 
											</a>
										</span>
									</div>
									<div class="col-md-4 logo text-center" data-aos="fade-up">
										<a class="navbar-brand" href="http://webtesting0001.dothome.co.kr/airticket/index.php">
											<i class="fab fa-gitkraken"> Schedule Killer</i></a>
									</div>
								</div>
							</div>
						</header>

						';

				}else{

					echo '
					<header id="header">
						<div class="top-bar_sub container-fluid">
							<div class="row">
								<div class="col-md-4 top-forms text-left mt-4"  data-aos="fade-up">
									<span>Schedule Killer</span>
									<span class="mx-lg-4 mx-md-2  mx-1">
										<a href="http://webtesting0001.dothome.co.kr/airticket/API/logout_ok.php">
										<i class="fas fa-lock"></i> 로그아웃</a>
									</span>
									<span>
										<a href="http://webtesting0001.dothome.co.kr/airticket/mypage.php">
										<i class="far fa-user"></i> 마이페이지</a>
									</span>
								</div>
								<div class="col-md-4 logo text-center" data-aos="fade-up">
									<a class="navbar-brand" href="http://webtesting0001.dothome.co.kr/airticket/index.php">
										<i class="fab fa-gitkraken"></i> Schedule Killer
									</a>
								</div>
							</div>
						</div>
					</header>
					';
				}


      }
	  public function menu(){
		 echo'
			<!--/nav-->
			<div class="header_top" id="home">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<button class="navbar-toggler navbar-toggler-right mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mx-auto">
							<li class="nav-item">
								<a class="nav-link" href="http://webtesting0001.dothome.co.kr/airticket/index.php">Home
									<span class="sr-only">(current)</span>
								</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="http://webtesting0001.dothome.co.kr/airticket/Event.php">특가 정보</a>
							</li>
					
							<li class="nav-item">
								<a class="nav-link" href="http://webtesting0001.dothome.co.kr/airticket/ticketReview.php">예매 후기</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">
									일정표
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#"></a>
									<a class="dropdown-item" href="http://webtesting0001.dothome.co.kr/airticket/get_Schedule.php">나의 일정표</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="http://webtesting0001.dothome.co.kr/airticket/scheduleList.php">일정표 목록</a>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="http://webtesting0001.dothome.co.kr/airticket/Vlog.php">V-log</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
	  ';}

      public function footer()
      {
         echo'

			 <footer>
				<div class="container">
					<div class="row">
						<div class="col-lg-4 footer-grid text-left" data-aos="fade-right">
							<h3>SCHEDULE KILLER</h3>
							<p>여행자들의 스케쥴을 제공하는 사이트입니다.</p>
							<div class="read">
								<a href="http://webtesting0001.dothome.co.kr/airticket/Event.php" class="btn btn-primary read-m">Read More</a>
							</div>
						</div>
						<!-- subscribe -->
						<div class="col-lg-8 subscribe-main footer-grid text-left" data-aos="fade-left">
							<p style="font-size: 28px;">항공 특가서비스를 동시에 제공합니다</p>
							<div class="subscribe-main text-left">
								<div class="subscribe-form">
									<form action="#" method="post" class="subscribe_form">
										<input class="form-control" type="email" placeholder="Enter your email..." required="">
										<button type="submit" class="btn btn-primary submit">Submit</button>
									</form>

								</div>
								<p>We respect your privacy.No spam ever!</p>
						</div>
					</div>
				</div>
			</footer>
         ';
      }
   }
   //$conn = new layout;$conn->menu();$conn->footer();
?>
