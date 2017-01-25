select
	a.nama_staff,
	b.fakultas as instansi,
	a.ruang,
	a.hari,
	a.jam_awal,
	a.jam_akhir
from
	tbl_jadwal as a
left join tbl_staff as b on a.nidn = b.nidn;

SELECT `status`, 
COUNT(*) FROM tbl_jadwal AS jdwal
WHERE `status` = 'Di Terima' OR `status` = 'Di Tolak'
GROUP BY `status`;