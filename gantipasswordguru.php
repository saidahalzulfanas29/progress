<?php 
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_guru where nip='$_SESSION[nip]'"));
	
	if (isset($_POST[update])){
		if ($_POST[a] == $r[password]){
						   mysql_query("UPDATE tbl_guru SET password		=	'$_POST[b]' where nip = '$_POST[id]'");												
						echo "<script>window.alert('Sukses Update Password .');
								window.location='index.php?page=dataguru'</script>";
		}else{
			echo "<script>window.alert('Password Lama anda Salah .');
								window.location='index.php?page=gantipasswordguru'</script>";
		}
	}
echo "<div class='artikel'>
	  <h1>Ganti Password Anda - $r[nm_guru]</h1>
		  <form action='' method='POST' enctype='multipart/form-data'>
				<br><table width=100%>
				<input type='hidden' value='$r[nip]' name='id'>
					<tr><td width=120>Password lama</td><td><input type='text' name='a'></td></tr>
					<tr><td width=120>Password Baru</td><td><input type='text' name='b'></td></tr>
			

					<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='update' value='Ganti Password'></td></tr>
				</table>
		  </form>
	  </div>";
?>