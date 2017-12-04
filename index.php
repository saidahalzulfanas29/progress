<?php 
error_reporting(0);
session_start();
include "koneksi.php";
include "fungsi_kalender.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Learning </title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
		function myFunction() {
		    $(".sembunyikan").hide();
		}
	</script>
	<script>
		$(document).ready(function(){
			$(".tombol").click(function(){
				$("#hide").toggle(1000);
			});
		});

		$(document).ready(function(){
			$(".tombol1").click(function(){
				$("#hide1").toggle(1000);
			});
		});
	</script>
	
</head>
<body onLoad="myFunction()">
<div id='container'>
<div class ="container">
<div class ="container-fluid">	
	<div id='header'>
		<img class='header' width='1080px' src='images/lh.jpg'>
		<ul id='menu'>
			<?php if ($_SESSION[level]=='admin'){ ?>
				<li><a href='index.php?page=edit&id=1'>Beranda </a></li>
				<li><a href='index.php?page=edit&id=2'>Kelola Profile</a></li>
				<li><a href='index.php?page=kelolasiswa'>Kelola Siswa</a></li>
				<li><a href='index.php?page=kelolaguru'>Kelola Guru</a></li>
				<li><a href='logout.php'>Logout</a></li>
				
			<?php }elseif ($_SESSION[level]=='siswa'){ ?>
				<li><a href='index.php?page=home'>Home </a></li>
				<li><a href='index.php?page=profile'>Profile</a></li>
				<li><a href='index.php?page=materiajar'>Materi Ajar</a></li>
				<li><a href='index.php?page=tugas'>Tugas</a></li>
				<li><a href='index.php?page=laporannilaisiswa'>Laporan Nilai</a></li>
				<li><a href='logout.php'>Logout</a></li>

			<?php }elseif ($_SESSION[level]=='guru'){ ?>
				<li><a href='index.php?page=home'>Home </a></li>
				<li><a href='index.php?page=profile'>Profile</a></li>
				<li><a href='index.php?page=materiajarguru'>Upload Materi</a></li>
				<li><a href='index.php?page=kirimtugas'>Kirim Tugas</a></li>
				<li><a href='index.php?page=laporannilai'>Laporan Nilai</a></li>
				<li><a href='logout.php'>Logout</a></li>

			<?php }else{ ?>
				<li><a href='index.php?page=home'>HOME </a></li>
				<li><a href='index.php?page=profile'>PROFILE</a></li>
				<li><a href='index.php?page=pendaftaran'>SIGN UP</a></li>
				<li><a href='index.php?page=login'>SIGN IN</a></li>
			<?php } ?>
		</ul>
	</div>
	<div id='contentt'>
		<?php 
			include "content.php";
			include "content-admin.php";
		?>
	</div>

	<br><div id='sidebar'>
		<div class='sidebar'>
			<?php include "sidebar-left.php"; ?> 
		</div>
	</div>
	
	<div style='clear:both'></div><br>
	<div id='footer'>
	<center style='margin-top:10px'>
	  Copyright &copy; 2017
	</center>
	</div>
</div>
</div>
</div>
</body>
</html>