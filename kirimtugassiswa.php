<?php
if ($_GET[aksi] == ''){
	if ($_GET[aksii]==''){
		$kel = mysql_fetch_array(mysql_query("SELECT * FROM tbl_kelas where kd_kelas='$_SESSION[kd_kelas]'"));
		echo "<div class='artikel'>
							<h1>Semua Data Tugas Untuk Kelas $kel[nm_kelas]</h1>
						<table width=100% border=1>
									<tr bgcolor=#cecece>
										<th>No</th>
										<th>Mata Pelajaran</th>
										<th>Untuk Kelas</th>
										<th>Batas Waktu</th>
										<th>Action</th>
									</tr>";
						$mapel = mysql_query("SELECT a.*, b.*, d.nm_kelas FROM `tbl_tugas` a JOIN tbl_mata_pelajaran b ON a.kd_pelajaran=b.kd_pelajaran JOIN tbl_kelas d ON a.kd_kelas=d.kd_kelas where a.kd_kelas='$_SESSION[kd_kelas]' ORDER BY a.kd_pelajaran ASC");
						$no = 1;
						while ($k = mysql_fetch_array($mapel)){
								echo "<tr>
										<td>Tugas $k[id_tugas]</td>
										<td>$k[nm_mapel]</td>
										<td>Kelas $k[nm_kelas]</td>
										<td>$k[batas_waktu]</td>
										<td width='80px'><a href='index.php?page=tugas&aksii=pertanyaan&id=$k[id_tugas]'>Lihat Tugas</a></td>
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
					<h1>Semua Data Siswa Kelas $kel[nm_kelas] - $sis[nm_siswa]</h1>
					<table width=100% border=1>
								<tr bgcolor=#cecece>
									<th>No</th>
									<th>Pertanyaan</th>
									<th>Jawaban</th>
								</tr>";
					$mapel = mysql_query("SELECT * FROM `tbl_pertanyaan` a LEFT JOIN tbl_jawaban_tugas b ON a.id_pertanyaan=b.id_pertanyaan where a.id_tugas='$_GET[id]' AND b.no_induk='$_GET[nis]' ORDER BY a.id_pertanyaan DESC");
					$no = 1;
					while ($k = mysql_fetch_array($mapel)){
							$jawaban = nl2br($k[jawaban_tugas]);
							echo "<tr>
									<td valign=top>$no</td>
									<td valign=top>$k[pertanyaan]</td>
									<td valign=top>$jawaban</td>
									</tr>";
						$no++;
					}	

		echo "</table></div>";	
		if (isset($_POST[b])){
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
		echo "<form style='float:right' action='' method='POST'>
			  <br><table>
				 <tr>
					 <td>Berikan Nilai</td>
					 <td><input style='text-align:center' type='text' value='$nli[nilai_tugas]' name='a'></td>
					 <td><input type='submit' name='b' value='Submit'></td>
				 </tr>
			  </table>
			  </form>";

	}elseif ($_GET[aksii]=='pertanyaan'){
		$jml = mysql_fetch_array(mysql_query("SELECT count(*) as jmlp FROM `tbl_pertanyaan_objektif` where id_tugas='$_GET[id]'"));
		if (isset($_POST['simpanobjektif'])){
		   $n = $jml[jmlp];
		   for ($i=0; $i<=$n; $i++){
		     if (isset($_POST['a'.$i])){
		       $jawab = $_POST['a'.$i];
		       $pertanyaan = $_POST['b'.$i];
		        $cek = mysql_fetch_array(mysql_query("SELECT count(*) as tot FROM tbl_jawaban_objektif where no_induk='$_SESSION[no_induk]' AND id_pertanyaan_objektif='$pertanyaan'"));
		       	if ($cek[tot] >= 1){
		       		mysql_query("UPDATE tbl_jawaban_objektif SET jawaban='$jawab' where id_pertanyaan_objektif='$pertanyaan'");
		       	}else{
		       		mysql_query("INSERT INTO tbl_jawaban_objektif (no_induk, id_pertanyaan_objektif, jawaban) VALUES('$_SESSION[no_induk]','$pertanyaan','$jawab')");
		     	}
		     }
		   }
		   echo "<script>window.alert('Sukses Simpan Jawaban Objektif.');
								window.location='index.php?page=tugas&aksii=pertanyaan&id=$_GET[id]'</script>";
		}

		echo "<div class='artikel'>
						<h1>Semua Data Pertanyaan Untuk Tugas $_GET[id]</h1>
				<form action='index.php?page=tugas&aksii=pertanyaan&id=$_GET[id]' method='POST'>
						<table width=100% border=1>";
								echo "<tr bgcolor=#cecece>
									<th width=30px>No</th>
									<th>Pertanyaan Objektif</th>
								</tr>";
					$objektif = mysql_query("SELECT * FROM `tbl_pertanyaan_objektif` where id_tugas='$_GET[id]' ORDER BY id_pertanyaan_objektif DESC");
					$noo = 1;
					while ($ko = mysql_fetch_array($objektif)){
						$ce = mysql_fetch_array(mysql_query("SELECT * FROM tbl_jawaban_objektif where id_pertanyaan_objektif='$ko[id_pertanyaan_objektif]'"));
							echo "<tr>
									<td valign=top>$noo</td>
									<td><b style='color:blue'>$ko[pertanyaan_objektif] <input type='hidden' value='$ko[id_pertanyaan_objektif]' name='b".$noo."'></b>
									 <div style='background:#f4f4f4'>";
										 if ($ce[jawaban]=='a'){
										 	if (trim($ko[jawab_a])!=''){ echo "<input type='radio' name='a".$noo."' value='a' checked> a. $ko[jawab_a] <br>"; }
										 }else{
										 	if (trim($ko[jawab_a])!=''){ echo "<input type='radio' name='a".$noo."' value='a'> a. $ko[jawab_a] <br>"; }
										 }

										 if ($ce[jawaban]=='b'){
										 	if (trim($ko[jawab_b])!=''){ echo "<input type='radio' name='a".$noo."' value='b' checked> b. $ko[jawab_b] <br>"; }
										 }else{
										 	if (trim($ko[jawab_b])!=''){ echo "<input type='radio' name='a".$noo."' value='b'> b. $ko[jawab_b] <br>"; }
										 }

										 if ($ce[jawaban]=='c'){
										 	if (trim($ko[jawab_c])!=''){ echo "<input type='radio' name='a".$noo."' value='c' checked> c. $ko[jawab_c] <br>"; }
										 }else{
										 	if (trim($ko[jawab_c])!=''){ echo "<input type='radio' name='a".$noo."' value='c'> c. $ko[jawab_c] <br>"; }
										 }

										 if ($ce[jawaban]=='d'){
										 	if (trim($ko[jawab_d])!=''){ echo "<input type='radio' name='a".$noo."' value='d' checked> d. $ko[jawab_d] <br>"; }
										 }else{
										 	if (trim($ko[jawab_d])!=''){ echo "<input type='radio' name='a".$noo."' value='d'> d. $ko[jawab_d] <br>"; }
										 }

										 if ($ce[jawaban]=='e'){
										 	if (trim($ko[jawab_e])!=''){ echo "<input type='radio' name='a".$noo."' value='e' checked> e. $ko[jawab_e]"; }
										 }else{
										 	if (trim($ko[jawab_e])!=''){ echo "<input type='radio' name='a".$noo."' value='e'> e. $ko[jawab_e]"; }
										 }		
									echo "</div>
									</td>
								  </tr>";
						$noo++;
					}	
		echo "</table>
			<input style='margin-top:3px; float:right' name='simpanobjektif' type='Submit' value='Simpan Jawaban Objektif'>
			  </form><br><br>

							<table width=100% border=1>
								<tr bgcolor=#cecece>
									<th width=30px>No</th>
									<th>Pertanyaan Essai</th>
									<th>Status</th>
									<th colspan=2>Action</th>
								</tr>";
					$mapel = mysql_query("SELECT * FROM `tbl_pertanyaan` where id_tugas='$_GET[id]' ORDER BY id_pertanyaan DESC");
					$no = 1;
					while ($k = mysql_fetch_array($mapel)){
						$cekl = mysql_num_rows(mysql_query("SELECT * FROM tbl_jawaban_tugas where id_pertanyaan='$k[id_pertanyaan]' AND no_induk='$_SESSION[no_induk]'"));
						if ($cekl >= 1){
							$status = '<i style="color:green">Sudah Dijawab</i>';
						}else{
							$status = '<i style="color:red">Belum Dijawab</i>';
						}	
							echo "<tr>
									<td>$no</td>
									<td>$k[pertanyaan]</td>
									<td>$status</td>";
									if ($cekl >= 1){
										echo "<td style='width:60px' align=center><a href=''><input type='button' value='Jawab' disabled></a></td>";
									}else{
										echo "<td style='width:60px' align=center><a href='index.php?page=tugas&aksii=jawabpertanyaan&idp=$k[id_pertanyaan]&id=$_GET[id]'><input type='button' value='Jawab'></a></td>";
									
									}
									echo "</tr>";
						$no++;
					}	
		echo "</table></div>";	

	}elseif ($_GET[aksii]=='jawabpertanyaan'){
		$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_pertanyaan where id_pertanyaan='$_GET[idp]'"));
		if (isset($_POST[jawab])){
			mysql_query("INSERT INTO tbl_jawaban_tugas (no_induk, id_pertanyaan, jawaban_tugas)
												VALUES ('$_SESSION[no_induk]','$_GET[idp]','$_POST[a]')");
			echo "<script>window.alert('Sukses Memberikan Jawaban.');
												window.location='index.php?page=tugas&aksii=pertanyaan&id=$_GET[id]'</script>";
		}
		echo "<div class='artikel'>
				<h1>Jawablah Pertanyaan Berikut ini : </h1>
				<form action='' method='POST'>
				  <table width=100% border=0>
				  	<tr bgcolor=#e3e3e3><td width=140px><b>Pertanyaan</b></td> <td>$r[pertanyaan]</td></tr>
				  	<tr><td><b>Tulis Jawaban</b></td> <td><textarea style='width:100%; height:160px' name='a'></textarea></td></tr>
				  	<tr><td></td> <td><input style='float:right' type='submit' name='jawab' value='Kirim Jawaban'></td></tr>
				  </table>
				</form>
			  </div>";
	}

}elseif ($_GET[aksi] == 'tambah'){
	if (isset($_POST[tambah])){
						mysql_query("INSERT INTO tbl_tugas (nip, kd_kelas, kd_pelajaran,  batas_waktu)
														  VALUES ('$_SESSION[nip]','$_POST[b]','$_POST[a]','$_POST[c]')");
						
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
					<tr><td width=120>Batas Waktu</td><td><input type='text' value='$skrg' name='c'> --> Format : YYYY-MM-DD H:i:s</td></tr>
					<tr><td width=120></td><td><hr><input type='submit' name='tambah' value='Submit Tugas'></td></tr>	
		</table></form>";
}

elseif ($_GET[aksi] == 'hapus'){
	mysql_query("DELETE FROM tbl_materi_ajar where id_materi_ajar='$_GET[id]'");
	echo "<script>window.alert('Sukses Hapus Materi Ajar');
								window.location='index.php?page=materiajarguru'</script>";
}
?>