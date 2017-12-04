<?php
if ($_GET[aksi] == ''){
echo "<div class='artikel'>
					<h1>Semua Data Materi Pelajaran yang anda Upload</h1>
					<a href='index.php?page=materiajarguru&aksi=tambah'><input style='float:right' type='button' value='Tambahkan Bahan Baru'></a> &nbsp;
					<a href='index.php?page=jadwalguru'><input style='float:right; margin-right:5px' type='button' value='Lihat Jadwal Mengajar'></a> &nbsp;
				<hr>
				<table width=100% border=1>
							<tr bgcolor=#cecece>
								<th>No</th>
								<th>Mata Pelajaran</th>
								<th>Untuk Kelas</th>
								<th>Keterangan</th>
								<th>File</th>
								<th>Action</th>
							</tr>";
				$mapel = mysql_query("SELECT a.*, b.*, c.nm_guru, d.nm_kelas FROM `tbl_materi_ajar` a JOIN tbl_mata_pelajaran b ON a.kd_pelajaran=b.kd_pelajaran JOIN tbl_guru c ON a.nip=c.nip JOIN tbl_kelas d ON a.kd_kelas=d.kd_kelas where c.nip='$_SESSION[nip]' ORDER BY a.id_materi_ajar DESC");
				$no = 1;
				while ($k = mysql_fetch_array($mapel)){
						echo "<tr>
								<td>$no</td>
								<td>$k[nm_mapel]</td>
								<td>Kelas $k[nm_kelas]</td>
								<td>$k[keterangan]</td>
								<td><a href='downlot.php?file=$k[file_materi_ajar]'>Download File</a></td>
								<td><a href='index.php?page=materiajarguru&aksi=hapus&id=$k[id_materi_ajar]'>Hapus</a></td>
								</tr>";
					$no++;
				}	
echo "</table></div>";	

}elseif ($_GET[aksi] == 'tambah'){
	if (isset($_POST[tambah])){
		$dir_gambar = 'files/';
			$filename = basename($_FILES['d']['name']);
			$uploadfile = $dir_gambar . $filename;
					if (move_uploaded_file($_FILES['d']['tmp_name'], $uploadfile)) {
						$sekarangg = date("Y-m-d");
						mysql_query("INSERT INTO tbl_materi_ajar (kd_pelajaran, kd_kelas, nip, keterangan, file_materi_ajar, tanggal)
														  VALUES ('$_POST[a]','$_POST[b]','$_SESSION[nip]','$_POST[c]','$filename','$sekarangg')");
						
						echo "<script>window.alert('Sukses Upload Materi Baru.');
								window.location='index.php?page=materiajarguru'</script>";
					}else{
						echo "<script>window.alert('Gagal Upload Materi.');
								window.location='index.php?page=materiajarguru'</script>";
					}
	}
	
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
					<tr><td width=120>Keterangan</td><td><textarea style='width:90%; height:60px' name='c'></textarea></td></tr>
					<tr><td width=120>Materi Upload</td><td><input type='file' name='d'></td></tr>	
					<tr><td width=120></td><td><hr><input type='submit' name='tambah' value='Upload Materi'></td></tr>	
		</table></form>";
}

elseif ($_GET[aksi] == 'hapus'){
	mysql_query("DELETE FROM tbl_materi_ajar where id_materi_ajar='$_GET[id]'");
	echo "<script>window.alert('Sukses Hapus Materi Ajar');
								window.location='index.php?page=materiajarguru'</script>";
}
?>