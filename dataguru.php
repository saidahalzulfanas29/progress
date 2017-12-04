<?php 
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_guru where nip='$_SESSION[nip]'"));

	if (isset($_POST[update])){
		$dir_gambar = 'foto_guru/';
			$filename = basename($_FILES['m']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['m']['tmp_name'], $uploadfile)) {
						
						mysql_query("UPDATE tbl_guru SET nip 			=	'$_POST[a]',
														nm_guru			=	'$_POST[c]',
														alamat			=	'$_POST[d]',
														tempat_lahir	=	'$_POST[e]',
														tanggal_lahir	=	'$_POST[f]',
														jenis_kelamin 	=	'$_POST[g]',
														foto			=	'$filename',
														telpon			=	'$_POST[h]',
														agama			=	'$_POST[i]',
														jabatan			=	'$_POST[j]',
														gol				=	'$_POST[k]',
														tamatan 		= 	'$_POST[l]' where nip = '$_POST[id]'");
						
						echo "<script>window.alert('Sukses Edit Data Guru.');
								window.location='index.php?page=dataguru'</script>";
					}else{
						echo "<script>window.alert('Gagal Edit Data Guru.');
								window.location='index.php?page=dataguru'</script>";
					}
				}else{
						mysql_query("UPDATE tbl_guru SET nip 			=	'$_POST[a]',
														nm_guru			=	'$_POST[c]',
														alamat			=	'$_POST[d]',
														tempat_lahir	=	'$_POST[e]',
														tanggal_lahir	=	'$_POST[f]',
														jenis_kelamin 	=	'$_POST[g]',
														telpon			=	'$_POST[h]',
														agama			=	'$_POST[i]',
														jabatan			=	'$_POST[j]',
														gol				=	'$_POST[k]',
														tamatan 		= 	'$_POST[l]' where nip = '$_POST[id]'");
														
						echo "<script>window.alert('Sukses Edit Data Guru.');
								window.location='index.php?page=dataguru'</script>";
				}
	}

if ($_GET[aksi]=='edit'){
	echo "<div class='artikel'>
		  <h1>Edit Data Anda - $r[nm_guru]</h1>
			  <form action='' method='POST' enctype='multipart/form-data'>
					<table width=100%>
					<input type='hidden' value='$r[nip]' name='id'>
						<tr><td width=120>Nip</td><td><input type='text' name='a' value='$r[nip]'></td></tr>
						<tr><td width=120>Nama Lengkap</td><td><input style='width:60%' type='text' name='c' value='$r[nm_guru]'></td></tr>
						<tr><td width=120 valign=top>Alamat</td><td><textarea style='width:90%; height:60px' name='d'>$r[alamat]</textarea></td></tr>
						<tr><td width=120>Tempat Lahir</td><td><input style='width:50%' type='text' name='e' value='$r[tempat_lahir]'></td></tr>
						<tr><td width=120>Tanggal Lahir</td><td><input type='text' name='f' value='$r[tanggal_lahir]'></td></tr>
						<tr><td width=120>Jenis Kelamin</td><td>";
															if ($r[jenis_kelamin]=='Laki-laki'){
																echo "<input type='radio' name='g' value='Laki-laki' checked> Laki-laki
																<input type='radio' name='g' value='Perempaun'> Perempaun";
															}else{
																echo "<input type='radio' name='g' value='Laki-laki'> Laki-laki
																<input type='radio' name='g' value='Perempaun' checked> Perempaun";
															}
															echo "</td></tr>
						<tr><td width=120>No Telpon</td><td><input type='text' name='h' value='$r[telpon]'></td></tr>
						<tr><td width=120>Agama</td><td><select name='i'>
															<option value='$r[agama]'>$r[agama]</option>
															<option value='Islam'>Islam</option>
															<option value='Kristen'>Kristen</option>
															<option value='Hindu'>Hindu</option>
															<option value='Budha'>Budha</option>
															<option value='Dll'>Dll</option>
													    </select></td></tr>
						<tr><td width=120>Jabatan</td><td><input style='width:40%' type='text' name='j' value='$r[jabatan]'></td></tr>
						<tr><td width=120>Golongan</td><td><input  style='width:10%' type='text' name='k' value='$r[gol]'></td></tr>
						<tr><td width=120>Tamatan</td><td><input style='width:60%' type='text' name='l' value='$r[tamatan]'></td></tr>
						<tr><td width=120>Foto</td><td><input type='file' name='m'></td></tr>	
						<tr><td width=120>Ganti Foto</td><td><img width='110px' src='foto_guru/$r[foto]'></td></tr>	

						<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='update' value='Update'></td></tr>
					</table>
			  </form>
		  </div>";
}else{
echo "<div class='artikel'>
	  <h1>Detail Data Anda - $r[nm_guru] <a style='float:right' href='index.php?page=dataguru&aksi=edit'><input type='button' value='Edit Data'></a></h1>
				<table width=100%>
					<tr><td width=120>Nip</td>				<td> : $r[nip]</td></tr>
					<tr><td width=120>Nama Lengkap</td>		<td> : $r[nm_guru]</td></tr>
					<tr><td width=120 valign=top>Alamat</td><td> : $r[alamat]</td></tr>
					<tr><td width=120>Tempat Lahir</td>		<td> : $r[tempat_lahir]</td></tr>
					<tr><td width=120>Tanggal Lahir</td>	<td> : $r[tanggal_lahir]</td></tr>
					<tr><td width=120>Jenis Kelamin</td>	<td> : $r[jenis_kelamin]</td></tr>
					<tr><td width=120>No Telpon</td>		<td> : $r[telpon]</td></tr>
					<tr><td width=120>Agama</td>			<td> : $r[agama]</td></tr>
					<tr><td width=120>Jabatan</td>			<td> : $r[jabatan]</td></tr>
					<tr><td width=120>Golongan</td>			<td> : $r[gol]</td></tr>
					<tr><td width=120>Tamatan</td>			<td> : $r[tamatan]</td></tr>
					<tr><td width=120 valign=top>Foto</td>				<td valign=top> :  <img width='110px' src='foto_guru/$r[foto]'></td></tr>	

				</table>
	  </div>";	
}	
?>