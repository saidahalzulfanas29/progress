<body onload="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><strong><p style='margin-bottom:1px'>MAN TARBIYATUL FALAH </p></strong></td>
  </tr>
  <tr>
    <td align="center"><p>Jln. Angkasa Puri II <br> Telp. (0751) 76458, Kode Pos. 26451</p></td>
  </tr>   
</table>
<br><br>
<?php	
$kelas = mysql_fetch_array(mysql_query("SELECT * FROM tbl_kelas where kd_kelas='$_GET[kelas]'"));
	echo "<h3><center>Semua Data Jadwal Pelajaran di Kelas $kelas[nm_kelas]</center></h3>";
echo "<table width=100% border=1>
              <tr>
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
                                        JOIN tbl_guru d ON a.nip=d.nip where a.kd_kelas='$_GET[kelas]' ORDER BY a.hari DESC, a.jam_mulai");

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
echo "</table><br/>";
?>

<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center">Mengetahui <br> Kepala Sekolah</td>
    <td width="530"></td>
    <td align="center">Mengetahui <br> Wali Kelas</td>
  </tr>
  <tr>
    <td align="center"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
    NIP : ................................<br /><br /></td>
    <td>&nbsp;</td>
    <td align="center" valign="top"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
	NIP : ................................
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table> 
</body>