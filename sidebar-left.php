<div class='sidebar'>	
			<?php 
			 if ($_SESSION[level]=='admin'){ 
			 	echo "<h2>Menu Administrator</h2>";
				echo "<a href='index.php?page=kelolakelas'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Kelola Kelas'></a>
						  <a href='index.php?page=kelolamapel'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Kelola Mata Pelajaran'></a>
						  <a href='index.php?page=kelolajadwal'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Kelola Jadwal Menagajar'></a>
						  <a href='index.php?page=gantipasswordadmin'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Ganti Password'></a><br><br>";
			 		echo "<h2>Kalender</h2>";
					  $tgl_skrg=date("d");
					  $bln_skrg=date("n");
					  $thn_skrg=date("Y");
					echo buatkalender($tgl_skrg,$bln_skrg,$thn_skrg); 

			 }elseif($_SESSION[level]=='guru'){ 
				$g = mysql_fetch_array(mysql_query("SELECT * FROM tbl_guru where nip='$_SESSION[nip]'"));
				echo "<center>
							<div style='height:230px; overflow:hidden;'><img style=' border-radius:5px; border:2px solid #cecece; width:200px;' src='foto_guru/$g[foto]'></div>
							Selamat Datang !<br> <b style='color:red; margin-bottom:10px'>$_SESSION[nm_guru]</b> </center>
						  <br>
						  <a href='index.php?page=dataguru'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Data Guru'></a>
						  <a href='index.php?page=gantipasswordguru'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Ganti Password'></a>";
			 }elseif($_SESSION[level]=='siswa'){ 
				$g = mysql_fetch_array(mysql_query("SELECT * FROM tbl_siswa where no_induk='$_SESSION[no_induk]'"));
				echo "<center>
							<div style='height:230px; overflow:hidden;'><img style=' border-radius:5px; border:2px solid #cecece; width:200px;' src='foto_siswa/$g[foto]'></div>
							Selamat Datang !<br> <b style='color:red; margin-bottom:10px'>$g[nm_siswa] (Siswa)</b> </center>
						  <br>
						  <a href='index.php?page=datasiswa'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Data Siswa'></a>
						  <a href='index.php?page=jadwalsiswa'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Jadwal Mata Pelajaran'></a>
						  <a href='index.php?page=gantipassword'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Ganti Password'></a>
						  <a href='logout.php'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Logout'></a>";
			 }
			
			if($_SESSION[level]==''){ 
				echo "<div style='clear:both'></div>
				<h2><b>Apa itu E-Learning?</b></h2>
					  <div style='padding:10px; text-align:justify;'>	
					  	E-learning merupakan singkatan dari Elektronic Learning, merupakan cara baru dalam proses belajar mengajar yang menggunakan media elektronik khususnya internet sebagai sistem pembelajarannya. 
					  </div>
				<h2><b>Kalender</b></h2>";
					  $tgl_skrg=date("d");
					  $bln_skrg=date("n");
					  $thn_skrg=date("Y");
					  echo buatkalender($tgl_skrg,$bln_skrg,$thn_skrg); 
			}
			?>
		</div>