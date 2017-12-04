<?php
if ($_GET[aksi] == ''){
	if ($_GET[aksii]==''){
			

				echo "<div class='artikel'>
							<h1>Laporan Semua Data Nilai Tugas</h1>
						<table width=100% border=1>
									<tr bgcolor=#cecece>
										<th width='50px'>No</th>
										<th>Mata Pelajaran</th>
										<th width='150px'>Tugas</th>
										<th>Nilai Tugas</th>
									</tr>";
						$mapel = mysql_query("SELECT * FROM tbl_tugas a JOIN tbl_mata_pelajaran b ON a.kd_pelajaran=b.kd_pelajaran where a.kd_kelas='$_SESSION[kd_kelas]' ORDER BY a.kd_pelajaran");
						$no = 1;
						while ($k = mysql_fetch_array($mapel)){
							$n = mysql_fetch_array(mysql_query("SELECT * FROM tbl_nilai_tugas where id_tugas='$k[id_tugas]' AND no_induk='$_SESSION[no_induk]'"));
							$nob = mysql_fetch_array(mysql_query("SELECT count(*) as benar FROM `tbl_jawaban_objektif` a JOIN tbl_pertanyaan_objektif b ON a.id_pertanyaan_objektif=b.id_pertanyaan_objektif where a.no_induk='$_SESSION[no_induk]' AND b.id_tugas='$k[id_tugas]' AND a.jawaban=b.kunci_jawaban"));
							$noj = mysql_fetch_array(mysql_query("SELECT count(*) as jumlah FROM `tbl_jawaban_objektif` a JOIN tbl_pertanyaan_objektif b ON a.id_pertanyaan_objektif=b.id_pertanyaan_objektif where a.no_induk='$_SESSION[no_induk]' AND b.id_tugas='$k[id_tugas]'"));	
							$hasil = (((100 / $noj[jumlah])*$nob[benar])+$n[nilai_tugas])/2;
								echo "<tr>
										<td>$no</td>
										<td>$k[nm_mapel]</td>
										<td>Tugas ke $k[id_tugas]</td>
										<td align=center style='width:110px'>$hasil</td>
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
		echo "<div class='artikel'>
						<h1>Semua Data Pertanyaan Untuk Tugas $_GET[id]</h1>
						<a href='index.php?page=kirimtugas&aksii=pertanyaan&proses=tambah&id=$_GET[id]'><input style='float:right' type='button' value='Tambahkan Pertanyaan'></a> 
					<hr>
					<table width=100% border=1>";
							if ($_GET[proses]=='tambah'){
								if (isset($_POST[b])){
									mysql_query("INSERT INTO tbl_pertanyaan (id_tugas, pertanyaan) VALUES('$_GET[id]','$_POST[a]')");
									echo "<script>window.alert('Sukses Menambahkan Pertanyaan.');
											window.location='index.php?page=kirimtugas&aksii=pertanyaan&id=$_GET[id]'</script>";
								}
								echo "
								<form action='' method='POST'>
								<tr>
									<td></td>
									<td><input type='text' style='width:100%' name='a' placeholder='Tulis Pertanyaan disini ...'></td>
									<td style='width:60px'><input type='submit' value='Simpan' name='b'></td>
								</tr>
								</form>";
							}elseif ($_GET[proses]=='hapus'){
								mysql_query("DELETE FROM tbl_pertanyaan where id_pertanyaan='$_GET[idp]'");
								echo "<script>window.alert('Sukses Hapus Pertanyaan.');
											window.location='index.php?page=kirimtugas&aksii=pertanyaan&id=$_GET[id]'</script>";
							}
								echo "<tr bgcolor=#cecece>
									<th>No</th>
									<th>Pertanyaan</th>
									<th colspan=2>Action</th>
								</tr>";
					$mapel = mysql_query("SELECT * FROM `tbl_pertanyaan` where id_tugas='$_GET[id]' ORDER BY id_pertanyaan DESC");
					$no = 1;
					while ($k = mysql_fetch_array($mapel)){
							echo "<tr>
									<td>$no</td>
									<td>$k[pertanyaan]</td>
									<td style='width:60px' align=center><a href='index.php?page=kirimtugas&aksii=pertanyaan&proses=hapus&idp=$k[id_pertanyaan]&id=$_GET[id]'>Hapus</a></td>
									</tr>";
						$no++;
					}	
		echo "</table></div>";	


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