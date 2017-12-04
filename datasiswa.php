<?php 
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_siswa where no_induk='$_SESSION[no_induk]'"));
	if (isset($_POST[update])){
		$dir_gambar = 'foto_siswa/';
			$filename = basename($_FILES['m']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['m']['tmp_name'], $uploadfile)) {			
						mysql_query("UPDATE tbl_siswa SET no_induk 			=	'$_POST[a]',
															nm_siswa		=	'$_POST[c]',
															alamat			=	'$_POST[d]',
															tempat_lahir	=	'$_POST[e]',
															tanggal_lahir	=	'$_POST[f]',
															jk 				=	'$_POST[g]',
															agama			=	'$_POST[h]',
															foto			=	'$filename',
															sekolah_asal	=	'$_POST[i]',
															nm_ortu			=	'$_POST[j]',
															pekerjaan		=	'$_POST[k]',
															kd_kelas 		= 	'$_POST[l]' where no_induk = '$_POST[id]'");
						
						echo "<script>window.alert('Sukses Edit Data Siswa.');
								window.location='index.php?page=datasiswa'</script>";
					}else{
						echo "<script>window.alert('Gagal Edit Data Siswa.');
								window.location='index.php?page=datasiswa'</script>";
					}
				}else{
						   mysql_query("UPDATE tbl_siswa SET no_induk 			=	'$_POST[a]',
															nm_siswa		=	'$_POST[c]',
															alamat			=	'$_POST[d]',
															tempat_lahir	=	'$_POST[e]',
															tanggal_lahir	=	'$_POST[f]',
															jk 				=	'$_POST[g]',
															agama			=	'$_POST[h]',
															sekolah_asal	=	'$_POST[i]',
															nm_ortu			=	'$_POST[j]',
															pekerjaan		=	'$_POST[k]',
															kd_kelas 		= 	'$_POST[l]' where no_induk = '$_POST[id]'");
														
						echo "<script>window.alert('Sukses Edit Data Siswa .');
								window.location='index.php?page=datasiswa'</script>";
				}
	}
if ($_GET[aksi]=='edit'){
echo "<div class='artikel'>
	  <h1>Edit data Anda - $r[nm_siswa]</h1>
		  <form action='' method='POST' enctype='multipart/form-data'>
				<table width=100%>
				<input type='hidden' value='$r[no_induk]' name='id'>
					<tr><td width=120>No Induk</td><td><input type='text' name='a' value='$r[no_induk]'></td></tr>
					<tr><td width=120>Nama Lengkap</td><td><input style='width:60%' type='text' name='c' value='$r[nm_siswa]'></td></tr>
					<tr><td width=120 valign=top>Alamat</td><td><textarea style='width:90%; height:60px' name='d'>$r[alamat]</textarea></td></tr>
					<tr><td width=120>Tempat Lahir</td><td><input style='width:50%' type='text' name='e' value='$r[tempat_lahir]'></td></tr>
					<tr><td width=120>Tanggal Lahir</td><td><input type='text' name='f' value='$r[tanggal_lahir]'></td></tr>
					<tr><td width=120>Jenis Kelamin</td><td>";
														if ($r[jk]=='Laki-laki'){
															echo "<input type='radio' name='g' value='Laki-laki' checked> Laki-laki
															<input type='radio' name='g' value='Perempaun'> Perempaun";
														}else{
															echo "<input type='radio' name='g' value='Laki-laki'> Laki-laki
															<input type='radio' name='g' value='Perempaun' checked> Perempaun";
														}
														echo "</td></tr>
					<tr><td width=120>Agama</td><td><select name='h'>
														<option value='$r[agama]'>$r[agama]</option>
														<option value='Islam'>Islam</option>
														<option value='Kristen'>Kristen</option>
														<option value='Hindu'>Hindu</option>
														<option value='Budha'>Budha</option>
														<option value='Dll'>Dll</option>
												    </select></td></tr>
					<tr><td width=120>Asal Sekolah</td><td><input type='text' name='i' value='$r[sekolah_asal]'></td></tr>
					<tr><td width=120>Nama Ortu</td><td><input style='width:40%' type='text' name='j' value='$r[nm_ortu]'></td></tr>
					<tr><td width=120>Pekerjaan</td><td><input  style='width:10%' type='text' name='k' value='$r[pekerjaan]'></td></tr>
					<tr><td width=120>Kelas</td><td><select name='l'><option value='0' selected>- Pilih -</option>";
												$kelas = mysql_query("SELECT * FROM tbl_kelas");
												while ($k = mysql_fetch_array($kelas)){
													if ($k[kd_kelas] == $r[kd_kelas]){
														echo "<option value='$k[kd_kelas]' selected>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";
													}else{
														echo "<option value='$k[kd_kelas]'>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";
													}
													
												}
										echo "</select></td></tr>
					
					<tr><td width=120>Ganti Foto</td><td><input type='file' name='m'></td></tr>	
					<tr><td width=120>Foto</td><td><img width='110px' src='foto_siswa/$r[foto]'</td></tr>	

					<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='update' value='Update Data'></td></tr>
				</table>
		  </form>
	  </div>";
}else{
echo "<div class='artikel'>
	  <h1>Berikut Detail data Anda - $r[nm_siswa] <a style='float:right' href='index.php?page=datasiswa&aksi=edit'><input type='button' value='Edit Data'></a></h1>
				<table width=100%>
					<tr><td width=120>No Induk</td>				<td> : $r[no_induk]</td></tr>
					<tr><td width=120>Nama Lengkap</td>			<td> : $r[nm_siswa]</td></tr>
					<tr><td width=120 valign=top>Alamat</td>	<td> : $r[alamat]</td></tr>
					<tr><td width=120>Tempat Lahir</td>			<td> : $r[tempat_lahir]</td></tr>
					<tr><td width=120>Tanggal Lahir</td>		<td> : $r[tanggal_lahir]</td></tr>
					<tr><td width=120>Jenis Kelamin</td>		<td> : $r[jk]</td></tr>
					<tr><td width=120>Agama</td>				<td> : $r[agama]</td></tr>
					<tr><td width=120>Asal Sekolah</td>			<td> : $r[sekolah_asal]</td></tr>
					<tr><td width=120>Nama Ortu</td>			<td> : $r[nm_ortu]</td></tr>
					<tr><td width=120>Pekerjaan</td>			<td> : $r[pekerjaan]</td></tr>
					<tr><td width=120>Kelas</td><td> : ";
												$kelas = mysql_query("SELECT * FROM tbl_kelas");
												while ($k = mysql_fetch_array($kelas)){
													if ($k[kd_kelas] == $r[kd_kelas]){
														echo "$k[kd_kelas] - Kelas $k[nm_kelas]";
													}
												}
										echo "</td></tr>
					
					<tr><td width=120 valign=top>Foto</td><td valign=top> : <img width='110px' src='foto_siswa/$r[foto]'</td></tr>	

				</table>
	  </div>";	
}
?>