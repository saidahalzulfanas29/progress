<body onload="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><strong><p style='margin-bottom:1px'>MAN TARBIYATUL FALAH</p></strong></td>
  </tr>
  <tr>
    <td align="center"><p>Jln. Angkasa Puri II <br> Telp. (0751) 76458, Kode Pos. 26451</p></td>
  </tr>   
</table>
<br><br>
<?php	
	echo "<h3><center>Semua Data Mata Pelajaran</center></h3>";
echo "<table border='1' width=100%>
        <tr bgcolor=#c3c3c3>
          <th>No</th>
          <th>Kode Pelajaran</th>
          <th>Nama Mata Pelajaran</th>
        </tr>";
        
        $mapel = mysql_query("SELECT * FROM tbl_mata_pelajaran");
        $no = 1;
        while ($r = mysql_fetch_array($mapel)){
          echo "<tr>
                <td>$no</td>
                <td>$r[kd_pelajaran]</td>
                <td>$r[nm_mapel]</td>
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