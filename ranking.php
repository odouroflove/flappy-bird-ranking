<?php require 'data/config.php'; 

function timeAgo($time_ago){
  $cur_time 	= time();
  $time_elapsed = $cur_time - $time_ago;
  $seconds 		= $time_elapsed ;
  $minutes 		= round($time_elapsed / 60 );
  $hours 		= round($time_elapsed / 3600);
  $days 		= round($time_elapsed / 86400 );
  $weeks 		= round($time_elapsed / 604800);
  $months 		= round($time_elapsed / 2600640 );
  $years 		= round($time_elapsed / 31207680 );
  // Seconds
  if($seconds <= 60){
	return "$seconds giây trước";
  }
  //Minutes
  else if($minutes <=60){
	if($minutes==1){
	  return "1 phút trước";
	}
	else{
	  return "$minutes phút trước";
	}
  }
  //Hours
  else if($hours <=24){
	if($hours==1){
	  return "1 giờ trước";
	}else{
	  return "$hours giờ trước";
	}
  }
  //Days
  else if($days <= 7){
	if($days==1){
	  return "hôm qua";
	}else{
	  return "$days ngày tước";
	}
  }
  //Weeks
  else if($weeks <= 4.3){
	if($weeks==1){
	  return "1 tuần trước";
	}else{
	  return "$weeks tuần trước";
	}
  }
  //Months
  else if($months <=12){
	if($months==1){
	  return "1 tháng trước";
	}else{
	  return "$months tháng trước";
	}
  }
  //Years
  else{
	if($years==1){
	  return "1 năm trước";
	}else{
	  return "$years năm trước";
	}
  }
}
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_name" content="csrf_test_name">
    <meta name="csrf_hash" content="b4493fc81221e608e1d766ca37358500">
    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="cache-control" content="cache">
    <meta http-equiv="content-language" content="en">
	    
    <title>Ranking – Flappy Bird Game</title>
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//ajax.googleapis.com">
    <link rel="dns-prefetch" href="//graph.facebook.com">
    <link rel="dns-prefetch" href="//scontent.xx.fbcdn.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&amp;subset=vietnamese">
    <link rel="stylesheet" href="assets/css/main.css">
    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .avatar {
      border-radius: 50%;
      width: 40px;
      height: 40px;
    }
    /* fade image in after load */
    .lazyload,
    .lazyloading {
      opacity: 0;
    }
    .lazyloaded {
      opacity: 1;
      transition: opacity 300ms;
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="https://game.nghia.org/flappybird/">Fallpy Bird Game</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="https://game.nghia.org/flappybird/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="ranking">Bảng xếp hạng</a></li>
			</ul>
        </div>
      </div>
    </nav>
    <div class="container w6">

      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Bảng xếp hạng Top 50</h3>
            </div>
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr class="bg-info">
                  <th class="text-center">#</th>
                  <th class="text-center">Tên người chơi</th>
                  <th class="text-center">Điểm</th>
                  <th class="text-center"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Cập nhật gần nhất</th>
                </tr>
              </thead>
              <tbody>
				<?php $query = mysql_query("SELECT * FROM `flappybird` ORDER BY `point` DESC LIMIT 50"); 
				$i = 0; ?>
				<?php while($rank = mysql_fetch_array($query)): ?>
					 <tr>
					  <td class="text-center"><?php $i++; echo $i; ?></td>
					  <td><img class="avatar lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="https://graph.facebook.com/<?php echo $rank['fbid']; ?>/picture?width=40&height=40" alt="Hoàng Lâm" width="40px" height="40px"> <a href="https://www.facebook.com/app_scoped_user_id/<?php echo $rank['fbid']; ?>" target="_blank"><?php echo $rank['name']; ?></a></td>
					  <td class="text-center"><?php echo $rank['point']; ?></td>
					  <td class="text-center timestamp" title="<?php echo timeAgo(strtotime($rank['time_update'])); ?>"><?php echo timeAgo(strtotime($rank['time_update'])); ?></td>
					</tr>
				<?php endwhile; ?>
                </tbody>
            </table>
			</div>
        </div>
      </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/3.0.0/lazysizes.min.js"></script>
  </body>
</html>