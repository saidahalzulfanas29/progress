<?php
	session_start();
    error_reporting(0);
				if (isset($_POST[login])){
						if ($_POST[level] == 'siswa'){
							$table = 'tbl_siswa';
							$userlogin = $_POST[user];
							$passlgoin = $_POST[pass];
							$login = mysql_query("SELECT * FROM $table 
								where no_induk='$userlogin' AND password='$passlgoin' AND level='$_POST[level]'");
								
						}elseif ($_POST[level] == 'guru'){
							$table = 'tbl_guru';
							$userlogin = $_POST[user];
							$passlgoin = $_POST[pass];
							$login = mysql_query("SELECT * FROM $table 
								where nip='$userlogin' AND password='$passlgoin' AND level='$_POST[level]'");
								
						}elseif($_POST[level] == 'admin'){
							$table = 'tbl_admin';
							$userlogin = $_POST[user];
							$passlgoin = md5($_POST[pass]);
							$login = mysql_query("SELECT * FROM $table 
								where username='$userlogin' AND password='$passlgoin' AND level='$_POST[level]'");
						}
					
					$cek = mysql_num_rows($login);
					$r = mysql_fetch_assoc($login);
						if ($cek >= 1){
							$_SESSION[id] 			= $r[id_user];
							$_SESSION[username] 	= $r[username];
							$_SESSION[nama_lengkap] = $r[nama_lengkap];
							
							$_SESSION[nip] 			= $r[nip];
							$_SESSION[nm_guru] 		= $r[nm_guru];
							
							$_SESSION[no_induk] 	= $r[no_induk];
							$_SESSION[kd_kelas] 	= $r[kd_kelas];
							$_SESSION[id] 			= $r[id_kepsek];
							$_SESSION[level] 		= $r[level];
							
							echo "<script>window.alert('Anda Sukses Login.');
								window.location='index.php?page=home'</script>";
						}else{
							echo "<script>window.alert('Maaf, anda Gagal Login.');
								window.location='index.php?page=home'</script>";
						}
					}
				
			?>
				<?php if ($_SESSION[level]!=''){ 

					  }else{ ?>
				<form style='padding:15px' action='' method='POST'>	
					<fieldset>
					<td height="25"><b>Username</b></td>
					<input type='text' style='width:100%; padding:4px;' name='user' placeholder='Username....'>
					<td height="25"><b>Pilih jabatan</b></td>
					<select  style='padding:4px; margin:4px 0px 4px 0px; width:90%' name='level'>
						<option value='0' selected>- Pilih -</option>
						<option value='siswa'>Siswa</option>
						<option value='guru'>Guru</option>
						<option value='admin'>Admin</option>
					</select>
					<td height="25"><b>Password</b></td>
					<input style='width:100%; padding:4px;' type='password' name='pass' placeholder='Password....'>
					<input style='float:right; margin-top:5px; padding:4px 10px 4px 10px' type='submit' name='login' value='Masuk'>
					</fieldset>
				</form>
				<?php } ?>
