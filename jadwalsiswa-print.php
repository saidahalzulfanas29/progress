<body onload="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
  	<td width="65" rowspan="6"><img src="images/logo.png" width="90" height="90"></td>
    <td width="550" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><strong>SMA N 3 LUBUK BASUNG</strong></td>
  </tr>
  <tr>
    <td align="center"><p>Jl.Lintas Manggopoh Pasaman (Simpang Sago)<br/>Telp.(0752) Kode Pos 26451</p></td>
  </tr>   
</table>
<hr><table class="basic" width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <h2>Daftar Jadwal Pelajaran Kelas <?php 
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_kelas where kd_kelas='$_GET[kelas]'"));
	echo "$r[nm_kelas]";
	?></h2></td>
  </tr>
</table><br>
<?php													
	  echo "<table width=100% border=1>
							<tr bgcolor=#cecece>
								<th>No</th>
								<th>Nama Mata Pelajaran</th>
								<th>Kelas</th>
								<th>Guru</th>
								<th>Hari</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
							</tr>";
				$mapel = mysql_query("SELECT * FROM tbl_jadwal_pelajaran a JOIN tbl_kelas b ON a.kd_kelas=b.kd_kelas
																			JOIN tbl_mata_pelajaran c ON a.kd_pelajaran=c.kd_pelajaran
																				JOIN tbl_guru d ON c.nip=d.nip where a.kd_kelas='$_GET[kelas]' ORDER BY a.hari DESC");
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
								</tr>";
					$no++;
				}	
echo "</table><br/><hr>";
?>
<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center">Mengetahui <br> Kepala Sekolah</td>
    <td width="530"></td>
    <td align="center">Mengetahui <br> Tata Usaha</td>
  </tr>
  <tr>
    <td align="center"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
    NIP : ................................<br /><br /></td>
    <td>&nbsp;</td>
    <td align="center" valign="top"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table> 
</body>