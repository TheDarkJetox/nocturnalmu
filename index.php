<?php
session_start();
include('random.config.php');

$tacc = $game_connect->query('SELECT COUNT(*) FROM MEMB_INFO')->fetchColumn();
$tchar = $game_connect->query('SELECT COUNT(*) FROM Character')->fetchColumn();
$guilds = $game_connect->query('SELECT COUNT(*) FROM Guild')->fetchColumn();
$online = $game_connect->query('SELECT * FROM MEMB_STAT WHERE ConnectStat = 1')->fetchAll(PDO::FETCH_NUM);
$numOnline = count($online);

$news_system = $connect->query('SELECT Title,Content,Publisher,tDate,NewsID FROM news_system ORDER BY tDate desc, Title asc')->fetchAll(PDO::FETCH_ASSOC);
$numNews = count($news_system);

//$_SESSION['username'] = 'TheDarkJetox';
//$_SESSION['user_id'] = 'random';
//$numNews = $connect->query('SELECT COUNT(*) FROM news_system')->fetchColumn();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<title>News| <?php echo($random['info']['title']);?></title>
	<meta name="DESCRIPTION" content="MU Online Private Server Season 9 Episode 1, 500x, Stats Stay, Bugless, Hardcore Castle Siege, No F.O. donors." />
	<meta name="KEYWORDS" content="nonamemu, noname mu, mu online 500x, 500x, mu online season 9, muonline season 9, mu season 9 episode 1, mu season 9 ep1, mu servers season 9, mu server season 9, mu online season 9, mu online season 9 private server, mu online private server season 9, mu private server, muonline private server, mu s9 ep1 500x, mu online s9 server, castle siege" />
	<link rel="icon" href="img/favicon.ico" type="image/gif" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<link rel="stylesheet" href="../css/main.css" type="text/css" />
	<link rel="shortcut icon" href="" type="image/x-icon" />
	
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand" href="../">Nocturnal MU</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item btn-dark">
					<a class="nav-link active" href="../">News</a>
				</li>
				<!--
				<li class="nav-item btn-dark">
					<a class="nav-link" href="../about.php">About</a>
				</li>
			-->
			
			<li class="nav-item btn-dark">
				<a class="nav-link" href="../rankings.php">Rankings</a>
			</li>
			<li class="nav-item btn-dark">
				<a class="nav-link" href="../downloads.php">Downloads</a>
			</li>
			<li class="nav-item btn-dark">
				<a class="nav-link" href="../staff.php">Staff List</a>
			</li>
			<li class="nav-item btn-dark">
				<a class="nav-link" href="../forum.php">Forums</a>
			</li>
			<li class="nav-item dropdown btn-dark">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Account
				</a>
				<?php if(isset($_SESSION['username'])&&isset($_SESSION['user_id'])){ ?>
					<div class="dropdown-menu dropdown-menu-right col-sm-12" aria-labelledby="navbarDropdown">
						<form action="../account/login.php" class="container">
							<div class="text">Logged in as: <?=$_SESSION['username'] ?></div>
							<div class="btn btn-dark"><a class="text-white" href="../account">Settings</a></div>
							<div class="btn btn-dark"><a class="text-white" href="../account/logout.php">Logout</a></div>
						</form>
					</div>
				<?php }else{ ?>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<form method="post" action="../account/login.php" class="container">
							<div class="textbg">
								Please login or <a href="../account/register.php" class="text-white">register</a>!
							</div>
							<div class="form-group">
								<!--<label for="inputUsername" class="textbg">Username</label>-->
								<input type="text" name="username" id="inputUsername" placeholder="Username">
							</div>
							<div class="form-group">
								<!--<label for="inputPassword">Password</label>-->
								<input type="password" name="password" id="inputPassword" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-success">Login</button>
							<div class="btn btn-dark"><a href="../account/register.php" class="text-white">Register</a></div>
						</form>
					</div>
				<?php } ?>
			</li>
		</ul>
	</div>
</nav>

<div class="container">
	<div class="text">	
		<div class="row">
			<div class="col-sm-8 border border-dark textbg">
				<h1>
					<center><a href="../"><img src="../img/logo.png" width="50%" /></a></center>
				</h1>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-3 border border-dark textbg">
				<h2>Server Information:</h2> <br>
				<span style='float:left;'>Version:</span> <span style='float:right;'><font color="yellowgreen"><?php echo ($random['misc']['version']); ?></font></span><br>

				<span style='float:left;'>Experience:</span> <span style='float:right;'><font color="yellowgreen"><?php echo ($random['misc']['exp']); ?></font></span><br>

				<span style='float:left;'>Item Drop:</span> <span style='float:right;'><font color="yellowgreen"><?php echo ($random['misc']['drop']); ?></font></span><br><br>

				<h2>Server Statistics:</h2> <br>
				<span style='float:left;'>Total Accounts:</span> <span style='float:right;'><font color="yellowgreen"><?=$tacc; ?></font></span><br>

				<span style='float:left;'>Total Characters:</span> <span style='float:right;'><font color="yellowgreen"><?=$tchar?></font></span><br>

				<span style='float:left;'>Total Guilds:</span> <span style='float:right;'><font color="yellowgreen"><?=$guilds?></font></span><br>
				<span style='float:left;'><a class="text-white" href="../online.php">Connected:</span> <span style='float:right;'><font color="yellowgreen"><?=$numOnline?></font></a></span><br>
				<span style='float:left;'>Server Status:</span> <span style='float:right;'><?php echo($status); ?></span><br>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 border border-dark textbg">
				<h1>News:</h1><br>
				<?php for ($i=0; $i < $numNews; $i++) { ?>
					<?php $newDate = date("d-m-Y", strtotime($news_system[$i]['tDate'])); 
					if(isset($_SESSION['username'])&&isset($_SESSION['admin_lvl'])){ ?>
					<div class="row">
					<div class="col-sm-10 border">
					<?php }else{ ?>
					<div class="col-sm-12 border">
					<?php } ?>
						<h3><?=$news_system[$i]['Title'] ?> :</h3>
						<?=$news_system[$i]['Content'] ?>
						<br><br>Posted by <?php echo "<a class='text-white' href='../account/profile.php?user=".$news_system[$i]['Publisher']."'>".$news_system[$i]['Publisher']."</a>"; ?>, on <?=$newDate ?>
					</div>
					<?php if(isset($_SESSION['username']) == 'TheDarkJetox'){ ?> 
					<div class="col-sm-2 border text-white">
						<center><div class="btn btn-dark text-white">Edit</div>
						<div class="btn btn-dark text-white">Delete</div></center>
					</div></div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<div class="footer">
	© Copyright <a class="text-white" href="https://www.thedarkjetox.com/about.php">TheDarkJetox Co.</a> <?php 
	if(date("Y")== $random['info']['startYear']){
		echo $random['info']['startYear'];
	}else{
		echo $random['info']['startYear']."-".date("Y")."";
	} ?>. All rights reserved.
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/clock.js" />
</body>
</html>