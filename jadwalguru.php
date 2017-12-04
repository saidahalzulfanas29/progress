<?php
echo "<div class='artikel'>
					<h1>Semua Data Jadwal Pelajaran anda.</h1>
					<a target='_BLANK' style='float:right' href='jadwalguru-print.php?nip=$_SESSION[nip]'>Print Jadwal</a>
				<table width=100% border=1>
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
																				JOIN tbl_guru d ON a.nip=d.nip where a.nip='$_SESSION[nip]' ORDER BY a.hari DESC");
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
echo "</table></div>";	
?>