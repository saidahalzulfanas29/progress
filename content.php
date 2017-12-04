<?php 
			if ($_GET[page] == 'home' OR $_GET[page] == ''){ 
						$p = mysql_fetch_array(mysql_query("SELECT * FROM tbl_page where id_page='1'"));
						$isi = nl2br($p[isi]);
						echo "<div class='artikel' style='text-align:justify'>
									<h1>$p[judul]</h1>
									$isi
							  </div><br><br>";
			
			}elseif ($_GET[page] == 'profile'){ 
						$p = mysql_fetch_array(mysql_query("SELECT * FROM tbl_page where id_page='2'"));
						$isi = nl2br($p[isi]);
						echo "<div class='artikel' style='text-align:justify'>
									<h1>$p[judul]</h1>
									$isi
							  </div><br><br>";
			}elseif ($_GET[page] == 'infopendaftaran'){ 
						$p = mysql_fetch_array(mysql_query("SELECT * FROM tbl_page where id_page='3'"));
						$isi = nl2br($p[isi]);
						echo "<div class='artikel' style='text-align:justify'>
									<h1>$p[judul]</h1>
									$isi
							  </div><br><br>";
			
			}elseif ($_GET[page] == 'pendaftaran'){ 
						if (isset($_POST[simpan])){
							$dir_gambar = 'foto_siswa/';
								$filename = basename($_FILES['m']['name']);
								$uploadfile = $dir_gambar . $filename;
									if ($filename != ''){
										if (move_uploaded_file($_FILES['m']['tmp_name'], $uploadfile)) {			
											mysql_query("INSERT INTO tbl_siswa (no_induk, password, nm_siswa, alamat, tempat_lahir, tanggal_lahir, jk, agama, foto, sekolah_asal, nm_ortu, pekerjaan, kd_kelas) 			
															VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$filename','$_POST[i]','$_POST[j]','$_POST[k]','$_POST[l]')");
											
											echo "<script>window.alert('Sukses Terdaftar Di Sistem.');
													window.location='index.php?page=login'</script>";
										}else{
											echo "<script>window.alert('gagal Terdaftar Di Sistem.');
													window.location='index.php?page=pendaftaran'</script>";
										}
									}else{
											mysql_query("INSERT INTO tbl_siswa (no_induk, password, nm_siswa, alamat, tempat_lahir, tanggal_lahir, jk, agama, sekolah_asal, nm_ortu, pekerjaan, kd_kelas) 			
															VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$_POST[j]','$_POST[k]','$_POST[l]')");
																		
											echo "<script>window.alert('Sukses Terdaftar Di Sistem .');
													window.location='index.php?page=login'</script>";
									}
						}

						echo "<div class='artikel'>
							  <h1>Tambah Data Siswa</h1>
								  <form action='index.php?page=pendaftaran' method='POST' enctype='multipart/form-data'>
									<fieldset>
										<table width=100%>
											<tr><td width=120>No Induk</td><td><input type='text' name='a'></td></tr>
											<tr><td width=120>Password</td><td><input type='text' name='b'></td></tr>
											<tr><td width=120>Nama Lengkap</td><td><input style='width:60%' type='text' name='c'></td></tr>
											<tr><td width=120 valign=top>Alamat</td><td><textarea style='width:90%; height:60px' name='d'></textarea></td></tr>
											<tr><td width=120>Tempat Lahir</td><td><input style='width:50%' type='text' name='e'></td></tr>
											<tr><td width=120>Tanggal Lahir</td><td><input type='text' name='f'></td></tr>
											<tr><td width=120>Jenis Kelamin</td><td><input type='radio' name='g' value='Laki-laki'> Laki-laki
																					<input type='radio' name='g' value='Perempaun'> Perempuan </td></tr>
											<tr><td width=120>Agama</td><td><select name='h'>
																				<option value='0'>- Pilih -</option>
																				<option value='Islam'>Islam</option>
																				<option value='Kristen'>Kristen</option>
																				<option value='Hindu'>Hindu</option>
																				<option value='Budha'>Budha</option>
																				<option value='Dll'>Dll</option>
																		    </select></td></tr>
											<tr><td width=120>Asal Sekolah</td><td><input type='text' name='i'></td></tr>
											<tr><td width=120>Nama Ortu</td><td><input style='width:40%' type='text' name='j'></td></tr>
											<tr><td width=120>Pekerjaan</td><td><input  style='width:10%' type='text' name='k'></td></tr>
											<tr><td width=120>Kelas</td><td><select name='l'><option value='0' selected>- Pilih -</option>";
																		$kelas = mysql_query("SELECT * FROM tbl_kelas");
																		while ($k = mysql_fetch_array($kelas)){
																				echo "<option value='$k[kd_kelas]'>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";
																		}
																echo "</select></td></tr>
											
											<tr><td width=120>Upload Foto</td><td><input type='file' name='m'></td></tr>	
											<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='simpan' value='Simpan'></td></tr>
										</table>
									</fieldset>
								  </form>
							  </div>";

			}elseif ($_GET[page] == 'login'){ 
				echo "<div class='artikel'>
						<h1>Silahkan Login !</h1>";
							echo "<div style='width:300px; margin : 0 auto;'>";
								include "login.php";
							echo "</div>
					  </div>";
			
			}elseif ($_GET[page] == 'gallery'){ 
				echo "<div class='artikel'>
						<h1>Semua Koleksi Foto</h1>";
				$col = 3;
				$album = mysql_query("SELECT * FROM tbl_gallery order by id_gallery DESC");
				echo "<table width=100%><tr>";
				$hitung = 0;
				while($a = mysql_fetch_array($album)){
					if ($hitung >= $col) {
						 echo "</tr><tr>";
						$hitung = 0;
					}
					$hitung++;
					
				echo "<td><center>
					<div><a href='index.php?page=detailgallery&id=$a[id_gallery]'>$a[judul_foto]</a></div>
						<img width=120px style='background:#fff; padding:7px;' src='foto_gallery/$a[foto]'>
					<br><br>
						 </center></td>";
					}
					echo "</tr></table>";
				echo "</div>";
				
			}elseif ($_GET[page] == 'detailgallery'){ 
				$album = mysql_query("SELECT * FROM tbl_gallery where id_gallery='$_GET[id]'");
				echo "<table width=100%>";
				while($a = mysql_fetch_array($album)){
				$keterangan = nl2br($a['keterangan']);
				echo "<div class='artikel'>
						<h1>$a[judul_foto]</h1>";	
					echo "<tr><td><center>
								<img style='width:500px; background:#fff; padding:7px;' src='foto_gallery/$a[foto]'>
							 </center>
						  </td></tr>
						  <tr><td> $keterangan</td></tr>
					  </div>";
					  
					}
					echo "</tr></table>";
			}elseif ($_GET[page] == 'kelolajadwal'){ 
				include "jadwal.php";	
			}elseif ($_GET[page]=='jadwalguru'){
				include "jadwalguru.php";
			}elseif ($_GET[page]=='datasiswa'){
				include "datasiswa.php";
			}elseif ($_GET[page]=='dataguru'){
				include "dataguru.php";
			}elseif ($_GET[page]=='jadwalsiswa'){
				include "jadwalsiswa.php";
			}elseif ($_GET[page]=='materiajar'){
				include "materiajar.php";
			}elseif ($_GET[page]=='gantipassword'){
				include "gantipasswordsiswa.php";
			}elseif ($_GET[page]=='gantipasswordadmin'){
				include "gantipasswordadmin.php";
			}

			elseif ($_GET[page]=='materiajarguru'){
				include "materiajarguru.php";
			}elseif ($_GET[page]=='kirimtugas'){
				include "kirimtugas.php";
			}elseif ($_GET[page]=='tugas'){
				include "kirimtugassiswa.php";
			}elseif ($_GET[page]=='laporannilai'){
				include "laporannilai.php";
			}elseif ($_GET[page]=='laporannilaisiswa'){
				include "laporannilaisiswa.php";
			}elseif ($_GET[page]=='gantipasswordguru'){
				include "gantipasswordguru.php";
			}elseif ($_GET[page]=='lapjadwalmengajar'){
				include "lapjadwalmengajar.php";
			}elseif ($_GET[page]=='datakepalasekolah'){
				include "datakepalasekolah.php";
			}elseif ($_GET[page]=='gantipasswordkepsek'){
				include "gantipasswordkepsek.php";
			}
			
?>