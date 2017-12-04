<?php
$r = mysql_fetch_array(mysql_query("SELECT kd_kelas FROM tbl_siswa where no_induk='$_SESSION[no_induk]'"));
echo "<div class='artikel'>
					<h1>Semua Data Jadwal Pelajaran anda.</h1>
					<a target='BLANK' style='float:right' href='jadwalsiswa-print.php?kelas=$r[kd_kelas]'>Print Jadwal</a>
				<table width=100% border=1>
							<tr bgcolor=#cecece>
								<th>No</th>
								<th>Nama Mata Pelajaran</th>
								<th>Kelas</th>
								<th>Guru</th>
								<th>Hari</th>
								<th>Jam Mulai</th>
								<th>Jam Selesai</th>
							</tr>";
				$mapell = mysql_query("SELECT * FROM tbl_jadwal_pelajaran a JOIN tbl_kelas b ON a.kd_kelas=b.kd_kelas
																			JOIN tbl_mata_pelajaran c ON a.kd_pelajaran=c.kd_pelajaran
																				LEFT JOIN tbl_guru d ON a.nip=d.nip where a.kd_kelas='$r[kd_kelas]' ORDER BY a.hari DESC, a.jam_mulai ");
				$no = 1;
				while ($k = mysql_fetch_array($mapell)){
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
echo "</table></div>";	
?>