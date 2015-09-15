<?php
$dir = "";//disi jika ada direktorinya;
$namafile = $_REQUEST['file'];
$token = $_REQUEST['token'];
$namafile = "abc.pdf"; //untuk tes
$kunci="1"; //bisa generate trus disimpen didatabase diperbarui dalam bbrp kurun waktu
$tokenku = hash('ripemd160', $namafile.$kunci ); // yang gampang dihash sama nama file
$file = $dir.$namafile; //jika
//$file = "abc.pdf";
$ctype ="application/pdf"; //untuk tipe pdf

if( $tokenku !== $token ){
	http_response_code(404);
	exit();
}

$saveas = date('ymdhis').$namafile;
header('Content-Description: File Transfer');
header("Content-Type: $ctype");
header('Content-Disposition: inline; filename="'.$saveas.'"' );
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
//header('Content-Length: ' . filesize($file));
//header('Content-Length: ' . filesize($file));
ob_clean();
flush();
readfile($file);
exit;
