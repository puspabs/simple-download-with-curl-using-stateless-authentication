<?php
    
    $namafile = "abc.pdf";
	$kunci="1"; //bisa generate trus disimpen didatabase diperbarui dalam bbrp kurun waktu
	$tokenku = hash('ripemd160', $namafile.$kunci ); // yang gampang dihash sama nama file
    /*
    echo $tokenku;
	exit();*/
	echo $tokenku.PHP_EOL;

    $source = "http://localhost:81/server.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $source);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt($ch, CURLOPT_SSLVERSION,3);
	curl_setopt($ch, CURLOPT_POST, true );
	curl_setopt($ch, CURLOPT_POSTFIELDS, 
    	http_build_query(array('token' => $tokenku,'file'=>$namafile))
    	);
	$data = curl_exec ($ch);
	$error = curl_error($ch); 
	//echo curl_errno($ch);

	if($error)	
	{
		echo "$error";
		exit();
	}

	$info = curl_getinfo($ch);
	if (empty($info['http_code'])) {
            die("No HTTP code was returned"); 
    } else {
    	if($info['http_code']==404){
    		echo PHP_EOL.$info['http_code'];
			exit();
    	}

    }


	curl_close ($ch);
	$namabaru = date('ymdhis').$namafile;
	$destination = "./".$namabaru;
	file_put_contents($destination, $data);

	?>