<?php
$r = mysql_fetch_array(mysql_query("SELECT a.kd_kelas, b.nm_kelas FROM tbl_siswa a JOIN tbl_kelas b ON a.kd_kelas=b.kd_kelas where a.no_induk='$_SESSION[no_induk]'"));
echo "<div class='artikel'>
					<h1>Semua Data Materi Pelajaran - kelas $r[nm_kelas]</h1>
				<table width=100% border=1>
							<tr bgcolor=#cecece>
								<th>No</th>
								<th>Nama Mata Pelajaran</th>
								<th>Guru</th>
								<th>Keterangan</th>
								<th>File</th>
							</tr>";
				$mapel = mysql_query("SELECT a.*, b.*, c.nm_guru, d.nm_kelas FROM `tbl_materi_ajar` a LEFT JOIN tbl_mata_pelajaran b ON a.kd_pelajaran=b.kd_pelajaran LEFT JOIN tbl_guru c ON a.nip=c.nip LEFT JOIN tbl_kelas d ON a.kd_kelas=d.kd_kelas where a.kd_kelas='$r[kd_kelas]' ORDER BY a.id_materi_ajar DESC");
				$no = 1;
				while ($k = mysql_fetch_array($mapel)){
						echo "<tr>
								<td>$no</td>
								<td>$k[nm_mapel]</td>
								<td>$k[nm_guru]</td>
								<td>$k[keterangan]</td>
								<td><a href='downlot.php?file=$k[file_materi_ajar]'>Download File</a></td>
								</tr>";
					$no++;
				}	
echo "</table></div>";	
?>