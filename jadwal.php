<?php 
if ($_GET[aksi]==''){
echo "<div class='artikel'>
					<h1>Semua Data Jadwal Pelajaran</h1>";
					
				echo "<form style='float:right' action='' method='POST'>
							Cari <select name='kls'>
											  <option value='0'>- Pilih Kelas -</option>";
													$kelas = mysql_query("SELECT * FROM tbl_kelas ORDER BY nm_kelas ASC");
													while ($m = mysql_fetch_array($kelas)){
														echo "<option value='$m[kd_kelas]'>Kelas $m[nm_kelas]</option>";
													}
							echo "</select>
							<input type='submit' value='Ok'>
					  </form>

";

			echo "<form action='index.php?page=kelolajadwal' method='GET'>
			<input type='hidden' name='page' value='kelolajadwal'>
Cari <select name='kelas'><option value='0' selected>- Pilih Kelas -</option>";
	$kelas = mysql_query("SELECT * FROM tbl_kelas");
		while ($k = mysql_fetch_array($kelas)){
			if ($_GET[kelas]==$k[kd_kelas]){
				echo "<option value='$k[kd_kelas]' selected>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";										
			}else{
				echo "<option value='$k[kd_kelas]'>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";
			}
		}
echo "</select>
<input type='Submit' name='cari' value='Cari'> &nbsp; ";
			if ($_GET[kelas]==''){
				echo "<a target='BLANK' href='print-jadwal-all.php'><input type='button' value='Print Laporan'></a> ";
			}else{
				echo "<a target='BLANK' href='print-jadwal.php?kelas=$_GET[kelas]'><input type='button' value='Print Laporan'></a> ";
			}
echo "</form>";
			


					  
				echo "<a href='index.php?page=kelolajadwal&aksi=tambah'><input type='button' value='Tambahkan Jadwal Baru'></a>
				<table width=100% border=1>
							<tr>
								<th>No</th>
								<th>Nama Mata Pelajaran</th>
								<th>Kelas</th>
								<th>Guru</th>
								<th>Hari</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
								<th>Action</th>
							</tr>";
				if (isset($_POST[kls])){
				$mapel = mysql_query("SELECT * FROM tbl_jadwal_pelajaran a JOIN tbl_kelas b ON a.kd_kelas=b.kd_kelas
																			JOIN tbl_mata_pelajaran c ON a.kd_pelajaran=c.kd_pelajaran
																				JOIN tbl_guru d ON a.nip=d.nip where a.kd_kelas='$_POST[kls]' ORDER BY a.hari DESC, a.jam_mulai");
				}elseif (isset($_GET[kelas])){
				$mapel = mysql_query("SELECT * FROM tbl_jadwal_pelajaran a JOIN tbl_kelas b ON a.kd_kelas=b.kd_kelas
																			JOIN tbl_mata_pelajaran c ON a.kd_pelajaran=c.kd_pelajaran
																				JOIN tbl_guru d ON a.nip=d.nip where a.kd_kelas='$_GET[kelas]' ORDER BY a.hari DESC, a.jam_mulai");
				}else{
				$mapel = mysql_query("SELECT * FROM tbl_jadwal_pelajaran a JOIN tbl_kelas b ON a.kd_kelas=b.kd_kelas
																			JOIN tbl_mata_pelajaran c ON a.kd_pelajaran=c.kd_pelajaran
																				JOIN tbl_guru d ON a.nip=d.nip ORDER BY a.hari DESC, a.jam_mulai");
				}
				$no = 1;
				while ($k = mysql_fetch_array($mapel)){
						echo "<tr>
								<td>$no</td>
								<td>$k[nm_mapel]</td>
								<td>Kelas $k[nm_kelas]</td>
								<td>$k[nm_guru]</td>
								<td>$k[hari]</td>
								<td>$k[jam_mulai]</td>
								<td>$k[jam_selesai]</td>
								<td><a href='index.php?page=kelolajadwal&aksi=edit&id=$k[id_jadwal_pelajaran]'>Edit</a> | 
									<a href='index.php?page=kelolajadwal&aksi=hapus&id=$k[id_jadwal_pelajaran]'>Hapus</a></td>
							  </tr>";
					$no++;
				}	
echo "</table></div>";	

}elseif ($_GET[aksi]=='hapus'){
		mysql_query("DELETE FROM tbl_jadwal_pelajaran where id_jadwal_pelajaran='$_GET[id]'");
	echo "<script>window.alert('Sukses Hapus Jadwal.');
								window.location='index.php?page=kelolajadwal'</script>";
}elseif ($_GET[aksi]=='tambah'){
if (isset($_POST[simpanjadwal])){
	$cek = mysql_num_rows(mysql_query("SELECT * FROM tbl_jadwal_pelajaran where nip='$_POST[guru]' AND hari='$_POST[hari]' AND jam_mulai='$_POST[mulai]'"));
	if ($cek >= 1){
		echo "<script>window.alert('Maaf Guru Terpilih sudah ada jadwal Pada Hari $_POST[hari], Jam $_POST[mulai] sampai $_POST[selesai].');
								window.location='index.php?page=kelolajadwal'</script>";
	}else{
		mysql_query("INSERT INTO tbl_jadwal_pelajaran (kd_kelas, kd_pelajaran, nip, hari, jam_mulai, jam_selesai)
										   VALUES ('$_POST[kelas]','$_POST[mapel]','$_POST[guru]','$_POST[hari]','$_POST[mulai]','$_POST[selesai]')");
		echo "<script>window.alert('Sukses Tambahkan Jadwal Baru.');
								window.location='index.php?page=kelolajadwal'</script>";
	}
 }
	echo "<div class='artikel'>
					<h1>Tambahkan Jadwal Pelajaran</h1>
	
	<form action='' method='POST'>
		<table width=100%>
			<tr><td width=130px>Mata Pelajaan</td><td><select name='mapel'>
											  <option value='0'>- Pilih Mata Pelajaran -</option>";
													$mapel = mysql_query("SELECT * FROM tbl_mata_pelajaran");
													while ($m = mysql_fetch_array($mapel)){
														echo "<option value='$m[kd_pelajaran]'>$m[nm_mapel]</option>";
													}
										  echo "</select></td></tr>
			<tr><td width=130px>Guru</td><td><select name='guru'>
											  <option value='0'>- Pilih Guru -</option>";
													$mapel = mysql_query("SELECT * FROM tbl_guru");
													while ($m = mysql_fetch_array($mapel)){
														echo "<option value='$m[nip]'>$m[nm_guru]</option>";
													}
										  echo "</select></td></tr>
			<tr><td>Nama Kelas</td><td><select name='kelas'>
											  <option value='0'>- Pilih Kelas -</option>";
													$kelas = mysql_query("SELECT * FROM tbl_kelas ORDER BY nm_kelas ASC");
													while ($m = mysql_fetch_array($kelas)){
														echo "<option value='$m[kd_kelas]'>$m[nm_kelas]</option>";
													}
										  echo "</select></td></tr>
			<tr><td>Hari</td><td><select name='hari'>
											  <option value='0'>- Pilih Hari -</option>
											  <option value='Senin'>Senin</option>
											  <option value='Selesa'>Selasa</option>
											  <option value='Rabu'>Rabu</option>
											  <option value='Kamis'>Kamis</option>
											  <option value='Jumat'>Jumat</option>
											  <option value='Sabtu'>Sabtu</option>
											  </select></td></tr>
			<tr><td>Jam Mulai</td><td><input type='text' name='mulai'></td></tr>
			<tr><td>Jam Selesai</td><td><input type='text' name='selesai'></td></tr>
			<tr><td></td><td><input type='Submit' name='simpanjadwal' value='Simpan'></td></tr>
		</table>
	</form>
	</div>";
	
	
}elseif ($_GET[aksi]=='edit'){
$j = mysql_fetch_array(mysql_query("SELECT * FROM tbl_jadwal_pelajaran where id_jadwal_pelajaran='$_GET[id]'"));
if (isset($_POST[editjadwal])){
	mysql_query("UPDATE tbl_jadwal_pelajaran SET kd_kelas		= '$_POST[kelas]',	
												 kd_pelajaran	= '$_POST[mapel]',
												 nip			= '$_POST[guru]',
												 hari			= '$_POST[hari]',
												 jam_mulai		= '$_POST[mulai]',
												 jam_selesai	= '$_POST[selesai]' where id_jadwal_pelajaran='$_GET[id]'");
	echo "<script>window.alert('Sukses Update Jadwal.');
								window.location='index.php?page=kelolajadwal'</script>";
 }
	echo "<div class='artikel'>
					<h1>Edit Jadwal Pelajaran</h1>
	
	<form action='' method='POST'>
		<table width=100%>
			<tr><td width=130px>Mata Pelajaan</td><td><select name='mapel'>
											  <option value='0'>- Pilih Mata Pelajaran -</option>";
													$mapel = mysql_query("SELECT * FROM tbl_mata_pelajaran");
													while ($m = mysql_fetch_array($mapel)){
														if ($j[kd_pelajaran]==$m[kd_pelajaran]){
															echo "<option value='$m[kd_pelajaran]' selected>$m[nm_mapel]</option>";
														}else{
															echo "<option value='$m[kd_pelajaran]'>$m[nm_mapel]</option>";
														}
													}
										  echo "</select></td></tr>
			<tr><td width=130px>Guru</td><td><select name='guru'>
											  <option value='0'>- Pilih Guru -</option>";
													$mapel = mysql_query("SELECT * FROM tbl_guru");
													while ($m = mysql_fetch_array($mapel)){
														if ($j[nip]==$m[nip]){
															echo "<option value='$m[nip]' selected>$m[nm_guru]</option>";
														}else{
															echo "<option value='$m[nip]'>$m[nm_guru]</option>";
														}
													}
										  echo "</select></td></tr>
			<tr><td>Nama Kelas</td><td><select name='kelas'>
											  <option value='0'>- Pilih Kelas -</option>";
													$kelas = mysql_query("SELECT * FROM tbl_kelas ORDER BY nm_kelas ASC");
													while ($m = mysql_fetch_array($kelas)){
														if ($j[kd_kelas]==$m[kd_kelas]){
															echo "<option value='$m[kd_kelas]' selected>$m[nm_kelas]</option>";
														}else{
															echo "<option value='$m[kd_kelas]'>$m[nm_kelas]</option>";
														}
													}
										  echo "</select></td></tr>
			<tr><td>Hari</td><td><select name='hari'>
											  <option value='$j[hari]'>$j[hari]</option>
											  <option value='Senin'>Senin</option>
											  <option value='Selesa'>Selasa</option>
											  <option value='Rabu'>Rabu</option>
											  <option value='Kamis'>Kamis</option>
											  <option value='Jumat'>Jumat</option>
											  <option value='Sabtu'>Sabtu</option>
											  </select></td></tr>
			<tr><td>Jam Mulai</td><td><input type='text' name='mulai' value='$j[jam_mulai]'></td></tr>
			<tr><td>Jam Selesai</td><td><input type='text' name='selesai' value='$j[jam_selesai]'></td></tr>
			<tr><td></td><td><input type='Submit' name='editjadwal' value='Update'></td></tr>
		</table>
	</form>
	</div>";
}
?>