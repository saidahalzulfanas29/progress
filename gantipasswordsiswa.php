<?php 
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_siswa where no_induk='$_SESSION[no_induk]'"));
	if (isset($_POST[update])){
		if ($_POST[a] == $r[password]){
						   mysql_query("UPDATE tbl_siswa SET password		=	'$_POST[b]' where no_induk = '$_POST[id]'");												
						echo "<script>window.alert('Sukses Update Password .');
								window.location='index.php?page=datasiswa'</script>";
		}else{
			echo "<script>window.alert('Password Lama anda Salah .');
								window.location='index.php?page=gantipassword'</script>";
		}
	}
echo "<div class='artikel'>
	  <h1>Ganti Password Anda - $r[nm_siswa]</h1>
		  <form action='' method='POST' enctype='multipart/form-data'>
				<br><table width=100%>
				<input type='hidden' value='$r[no_induk]' name='id'>
					<tr><td width=120>Password lama</td><td><input type='text' name='a'></td></tr>
					<tr><td width=120>Password Baru</td><td><input type='text' name='b'></td></tr>
			

					<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='update' value='Ganti Password'></td></tr>
				</table>
		  </form>
	  </div>";
?>