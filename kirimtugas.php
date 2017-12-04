<?php
if ($_GET[aksi] == ''){
	if ($_GET[aksii]==''){
		echo "<div class='artikel'>
							<h1>Semua Data Tugas</h1>
							<a href='index.php?page=kirimtugas&aksi=tambah'><input style='float:right' type='button' value='Tambahkan Tugas Baru'></a> 
						<hr>
						<table width=100% border=1>
									<tr bgcolor=#cecece>
										<th>No</th>
										<th>Mata Pelajaran</th>
										<th>Untuk Kelas</th>
										<th>Batas Waktu</th>
										<th colspan=3>Action</th>
									</tr>";
						$mapel = mysql_query("SELECT a.*, b.*, d.nm_kelas FROM `tbl_tugas` a JOIN tbl_mata_pelajaran b ON a.kd_pelajaran=b.kd_pelajaran JOIN tbl_kelas d ON a.kd_kelas=d.kd_kelas where a.nip='$_SESSION[nip]' ORDER BY a.id_tugas ASC");
						$no = 1;
						while ($k = mysql_fetch_array($mapel)){
								echo "<tr>
										<td>Tugas $k[id_tugas]</td>
										<td>$k[nm_mapel]</td>
										<td>Kelas $k[nm_kelas]</td>
										<td>$k[batas_waktu]</td>
										<td width='80px'><a href='index.php?page=kirimtugas&aksii=pertanyaan&id=$k[id_tugas]'>Pertanyaan</a></td>
										<td width='80px'><a href='index.php?page=kirimtugas&aksii=jawaban&id=$k[id_tugas]'>Jawaban</a></td>
										<td><a href='index.php?page=kirimtugas&aksi=hapus&id=$k[id_tugas]'>Hapus</a></td>
										</tr>";
							$no++;
						}	
		echo "</table></div>";	
	}elseif ($_GET[aksii]=='jawaban'){
			$kel = mysql_fetch_array(mysql_query("SELECT * FROM tbl_tugas a JOIN tbl_kelas b ON a.kd_kelas=b.kd_kelas where id_tugas='$_GET[id]'"));

				echo "<div class='artikel'>
							<h1>Semua Data Siswa Kelas $kel[nm_kelas]</h1>
						<table width=100% border=1>
									<tr bgcolor=#cecece>
										<th width='50px'>No</th>
										<th width='100px'>No Induk</th>
										<th>Nama Lengkap</th>
										<th>Action</th>
									</tr>";
						$mapel = mysql_query("SELECT * FROM tbl_siswa where kd_kelas='$kel[kd_kelas]' ORDER BY no_induk DESC");
						$no = 1;
						while ($k = mysql_fetch_array($mapel)){
								echo "<tr>
										<td>$no</td>
										<td>$k[no_induk]</td>
										<td>$k[nm_siswa]</td>
										<td style='width:110px'><a href='index.php?page=kirimtugas&aksii=lihatjawaban&id=$_GET[id]&nis=$k[no_induk]'>Lihat Jawaban</a></td>
										</tr>";
							$no++;
						}	
		echo "</table></div>";	

	}elseif ($_GET[aksii]=='lihatjawaban'){	
		$kel = mysql_fetch_array(mysql_query("SELECT * FROM tbl_tugas a JOIN tbl_kelas b ON a.kd_kelas=b.kd_kelas where id_tugas='$_GET[id]'"));
		$sis = mysql_fetch_array(mysql_query("SELECT * FROM tbl_siswa where no_induk='$_GET[nis]'"));
		echo "<div class='artikel'>
					<h1>Jawaban Tugas Siswa Kelas $kel[nm_kelas] - $sis[nm_siswa]</h1>

					<table width=100% border=1>";
								echo "<tr bgcolor=#cecece>
									<th width=30px>No</th>
									<th>Pertanyaan Objektif</th>
								</tr>";
					$objektif = mysql_query("SELECT * FROM `tbl_pertanyaan_objektif` where id_tugas='$_GET[id]' ORDER BY id_pertanyaan_objektif DESC");
					$total = mysql_num_rows($objektif);
					$nilai = 100 / $total;
					$to = mysql_fetch_array(mysql_query("SELECT count(*) as total FROM `tbl_jawaban_objektif` a JOIN tbl_pertanyaan_objektif b ON a.id_pertanyaan_objektif=b.id_pertanyaan_objektif where a.jawaban=b.kunci_jawaban AND a.no_induk='$_GET[nis]' AND b.id_tugas='$_GET[id]'"));
					$hasil = $nilai * $to[total];
					$noo = 1;
					while ($ko = mysql_fetch_array($objektif)){
						$ce = mysql_fetch_array(mysql_query("SELECT * FROM tbl_jawaban_objektif where id_pertanyaan_objektif='$ko[id_pertanyaan_objektif]' AND no_induk='$_GET[nis]'"));
							if ($ko[kunci_jawaban]==$ce[jawaban]){
								$jawaban = '<span style="float:right; color:green; font-weight:bold">Benar</span>';
							}else{
								$jawaban = '<span style="float:right; color:red; font-weight:bold">Salah</span>';
							}

							echo "<tr>
									<td valign=top>$noo</td>
									<td><b style='color:blue'>$ko[pertanyaan_objektif]</b>
									 <div style='background:#f4f4f4'>";
										 if ($ce[jawaban]=='a'){
										 	if (trim($ko[jawab_a])!=''){ echo "a. $ko[jawab_a] <br>"; }
										 }
										 if ($ce[jawaban]=='b'){
										 	if (trim($ko[jawab_b])!=''){ echo "b. $ko[jawab_b] <br>"; }
										 }
										 if ($ce[jawaban]=='c'){
										 	if (trim($ko[jawab_c])!=''){ echo "c. $ko[jawab_c] <br>"; }
										 }
										 if ($ce[jawaban]=='d'){
										 	if (trim($ko[jawab_d])!=''){ echo "d. $ko[jawab_d] <br>"; }
										 }
										 if ($ce[jawaban]=='e'){
										 	if (trim($ko[jawab_e])!=''){ echo "e. $ko[jawab_e]"; }
										 }	
									echo " $jawaban</div>
									</td>
								  </tr>";
						$noo++;
					}	
		echo "</table>
			  <form style='float:right' action='' method='POST'>
			  <table>
				 <tr>
					 <td>Nilai Objektif</td>
					 <td><input style='text-align:center; background:#e3e3e3;' type='text' value='$hasil' name='a' readonly='on'></td>
				 </tr>
			  </table>
			  </form><br>

					<table width=100% border=1>
								<tr bgcolor=#cecece>
									<th width=30px>No</th>
									<th>Pertanyaan Essai</th>
								</tr>";
					$mapel = mysql_query("SELECT * FROM `tbl_pertanyaan` a LEFT JOIN tbl_jawaban_tugas b ON a.id_pertanyaan=b.id_pertanyaan where a.id_tugas='$_GET[id]' AND b.no_induk='$_GET[nis]' ORDER BY a.id_pertanyaan DESC");
					$no = 1;
					while ($k = mysql_fetch_array($mapel)){
							$jawaban = nl2br($k[jawaban_tugas]);
							echo "<tr>
									<td valign=top>$no</td>
									<td valign=top><b style='color:blue'>$k[pertanyaan]</b> <br>
										<div style='background:#f4f4f4'><b>Jawaban</b> : $jawaban</td></div>
									</tr>";
						$no++;
					}	

		echo "</table></div>";	
		if (isset($_POST[a])){
			$cek = mysql_num_rows(mysql_query("SELECT * FROM tbl_nilai_tugas where no_induk='$_GET[nis]' AND id_tugas='$_GET[id]'"));
			if ($cek >= 1){
				mysql_query("UPDATE tbl_nilai_tugas SET nilai_tugas='$_POST[a]' where where no_induk='$_GET[nis]' AND id_tugas='$_GET[id]'");
				echo "<script>window.alert('Sukses Update Nilai Tugas untuk $sis[nm_siswa].');
												window.location='index.php?page=kirimtugas&aksii=lihatjawaban&id=$_GET[id]&nis=$_GET[nis]'</script>";
			}else{
				mysql_query("INSERT INTO tbl_nilai_tugas (id_tugas, no_induk, nilai_tugas) VALUES ('$_GET[id]','$_GET[nis]','$_POST[a]')");
				echo "<script>window.alert('Sukses Update Nilai Tugas untuk $sis[nm_siswa].');
												window.location='index.php?page=kirimtugas&aksii=lihatjawaban&id=$_GET[id]&nis=$_GET[nis]'</script>";
			}
		}

		$nli = mysql_fetch_array(mysql_query("SELECT * FROM tbl_nilai_tugas where no_induk='$_GET[nis]' AND id_tugas='$_GET[id]'"));
		if ($nli[nilai_tugas]==''){ $nilaiessai = '0'; }else{ $nilaiessai = $nli[nilai_tugas]; }
		$akhir = ($nilaiessai + $hasil) / 2;
		
		echo "<form style='float:right' action='' method='POST'>
			  <table>
				 <tr>
					 <td>Nilai Essai</td>
					 <td><input style='text-align:center; background:#e3e3e3;' type='text' value='$nilaiessai' name='a'></td>
				 </tr>
				 <tr>
					 <td>Nilai Akhir</td>
					 <td><input style='text-align:center; background:lightgreen;' type='text' value='($nilaiessai + $hasil) : 2 = $akhir' name='a'></td>
				 </tr>
			  </table>
			  </form>";

	}elseif ($_GET[aksii]=='pertanyaan'){
		echo "<div class='artikel'>
				<table width=100% border=1>
					<h1>Semua Data Pertanyaan Untuk Tugas $_GET[id]</h1>
					<button style='float:right' class='tombol'>Tambah Soal Essai</button> 
					<hr style='clear:both'>"; 

								if (isset($_POST[tambaha])){
									mysql_query("INSERT INTO tbl_pertanyaan (id_tugas, pertanyaan) VALUES('$_GET[id]','$_POST[a]')");
									echo "<script>window.alert('Sukses Menambahkan Pertanyaan.');
											window.location='index.php?page=kirimtugas&aksii=pertanyaan&id=$_GET[id]'</script>";
								}	
							if ($_GET[proses]=='hapus'){
								mysql_query("DELETE FROM tbl_pertanyaan where id_pertanyaan='$_GET[idp]'");
								echo "<script>window.alert('Sukses Hapus Pertanyaan Essai.');
											window.location='index.php?page=kirimtugas&aksii=pertanyaan&id=$_GET[id]'</script>";
							}elseif ($_GET[proses]=='hapuso'){
								mysql_query("DELETE FROM tbl_pertanyaan_objektif where id_pertanyaan_objektif='$_GET[idp]'");
								echo "<script>window.alert('Sukses Hapus Pertanyaan Objektif.');
											window.location='index.php?page=kirimtugas&aksii=pertanyaan&id=$_GET[id]'</script>";
							}
								
								echo "<form action='' method='POST' >
								<tr id='hide' class='sembunyikan'>
									<td></td>
									<td><input type='text' style='width:100%; background:lightgreen' name='a' placeholder='Tulis Pertanyaan disini ...'></td>
									<td style='width:60px'><input type='submit' value='Simpan' name='tambaha'></td>
								</tr>
								</form>";

								echo "<tr bgcolor=#cecece>
									<th>No</th>
									<th>Pertanyaan Essai</th>
									<th colspan=2>Action</th>
								</tr>";
					$mapel = mysql_query("SELECT * FROM 'tbl_pertanyaan` where id_tugas='$_GET[id]' ORDER BY id_pertanyaan DESC");
					$no = 1;
					while ($k = mysql_fetch_array($mapel)){
							echo "<tr>
									<td>$no</td>
									<td><b style='color:red'>$k[pertanyaan]</b></td>
									<td style='width:60px' align=center><a href='index.php?page=kirimtugas&aksii=pertanyaan&proses=hapus&idp=$k[id_pertanyaan]&id=$_GET[id]'>Hapus</a></td>
									</tr>";
						$no++;
					}	
		echo "</table><br>
					<button style='float:right' class='tombol1'>Tambah Soal Objektif</button>
					<hr style='clear:both'>
					<table width=100% border=1>";
					

								echo "<tr bgcolor=#cecece>
									<th>No</th>
									<th>Pertanyaan Objektif</th>
									<th colspan=2>Action</th>
								</tr>";
					$objektif = mysql_query("SELECT * FROM `tbl_pertanyaan_objektif` where id_tugas='$_GET[id]' ORDER BY id_pertanyaan_objektif DESC");
					$noo = 1;
					while ($ko = mysql_fetch_array($objektif)){
							echo "<tr>
									<td valign=top>$noo</td>
									<td><b style='color:red'>$ko[pertanyaan_objektif]</b>
									 <div style='background:#f4f4f4'>";
									 	if (trim($ko[jawab_a])!=''){ echo "<input type='radio' name='$noo'> a. $ko[jawab_a] <br>"; }
										if (trim($ko[jawab_b])!=''){ echo "<input type='radio' name='$noo'> b. $ko[jawab_b] <br>"; }
										if (trim($ko[jawab_c])!=''){ echo "<input type='radio' name='$noo'> c. $ko[jawab_c] <br>"; }
										if (trim($ko[jawab_d])!=''){ echo "<input type='radio' name='$noo'> d. $ko[jawab_d] <br>"; }
										if (trim($ko[jawab_e])!=''){ echo "<input type='radio' name='$noo'> e. $ko[jawab_e]"; }
									echo "<p style='background:lightblue;'>Kunci Jawaban : <b>$ko[kunci_jawaban]</b></p></div>
									</td>
									<td valign=top style='width:60px' align=center><a href='index.php?page=kirimtugas&aksii=pertanyaan&proses=hapuso&idp=$ko[id_pertanyaan_objektif]&id=$_GET[id]'>Hapus</a></td>
									</tr>";
						$noo++;
					}	
		echo "</table></div>";	
	}

}elseif ($_GET[aksi] == 'tambah'){
	if (isset($_POST[tambah])){
		if(function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
		$waktu = date("Y-m-d H:i:s");
		$date = date_create($waktu);
		$tjam = date_add($date, date_interval_create_from_date_string("$_POST[d] minutes"));
		$hasil = date_format($tjam, 'Y-m-d H:i:s');

						mysql_query("INSERT INTO tbl_tugas (nip, kd_kelas, kd_pelajaran,  batas_waktu)
														  VALUES ('$_SESSION[nip]','$_POST[b]','$_POST[a]','$hasil')");
						
						echo "<script>window.alert('Sukses Menambahkan Tugas Baru.');
								window.location='index.php?page=kirimtugas'</script>";

	}
	$skrg = date("Y-m-d H:i:s");
	echo "<h1>Tambahkan / Upload Bahan Ajar Baru</h1>";
	echo "<form action='' method='POST' enctype='multipart/form-data'>
		  <table width=100%><tr><td width=120>Mata Pelajaran</td><td><select name='a'><option value='0' selected>- Pilih -</option>";
												$mapel = mysql_query("SELECT * FROM tbl_mata_pelajaran a JOIN tbl_jadwal_pelajaran b ON a.kd_pelajaran=b.kd_pelajaran where b.nip='$_SESSION[nip]'");
												while ($k = mysql_fetch_array($mapel)){
														echo "<option value='$k[kd_pelajaran]'>$k[kd_pelajaran] - $k[nm_mapel]</option>";
												}
										echo "</select></td></tr>
					<tr><td width=120>Kelas</td><td><select name='b'><option value='0' selected>- Pilih -</option>";
												$kelas = mysql_query("SELECT * FROM tbl_jadwal_pelajaran a JOIN tbl_kelas c ON a.kd_kelas=c.kd_kelas where a.nip='$_SESSION[nip]'");
												while ($k = mysql_fetch_array($kelas)){
														echo "<option value='$k[kd_kelas]'>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";
												}
										echo "</select></td></tr>
					<input type='hidden' value='$skrg' name='c'>
					<tr><td width=120>Batas Waktu</td><td><input style='width:50px' type='text' value='0' name='d'> Menit</td></tr>
					<tr><td width=120></td><td><hr><input type='submit' name='tambah' value='Submit Tugas'></td></tr>	
		</table></form>";
}

elseif ($_GET[aksi] == 'hapus'){
	mysql_query("DELETE FROM tbl_tugas where id_tugas='$_GET[id]'");
	echo "<script>window.alert('Sukses Hapus Data Tugas');
								window.location='index.php?page=kirimtugas'</script>";
}
?>