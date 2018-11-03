<?php
#fungsi untuk membalik tanggal dari english (y-m-d) -> indo (d-m-y)
function IndonesiaTgl ($tanggal) {
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal="$tgl-$bln-$thn";
	return $tanggal;
}
# fungsi untuk membuat format rupiah pada angka (uang)
function format_angka ($angka) {
	$hasil = number_format ($angka,0, ",",",");
	return $hasil;
}
?>