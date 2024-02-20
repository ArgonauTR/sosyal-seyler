<?php

// Resim Yapma Fonskiyonu
function klasoryap(){
	$ay = date("m");
	$yil=date("Y");
	$yil_yolu = "../../images/";
	$ay_yolu = "../../images/".$yil."/";

	// Yıl Klasörü Yoksa.
	if(!file_exists($yil_yolu.$yil)){
		mkdir(($yil_yolu.$yil));
		// Yıl Klasörü Oluşturulunca, Ay Klasörü Oluşturulur.
		if(!file_exists($ay_yolu.$ay)){
		mkdir($ay_yolu.$ay);
		}
	}
	//Ay Yolu Yoksa.
	if(!file_exists($ay_yolu.$ay)){
		mkdir($ay_yolu.$ay);
	}
}

?>