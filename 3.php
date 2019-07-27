<?php

function cetak_gambar($data){
	if($data % 2 != 0){
		for ($x=0; $x < $data; $x++) { 
			for ($y=0; $y < $data; $y++) { 
				if( $y == 0 || $y == ($data-1) || $x == floor($data/2)){
					echo " * ";
				}
				else{
					echo " = ";
				}
			}

			echo PHP_EOL;
		}
	}
	else{
		echo "Input harus bilangan ganjil";
	}
}

cetak_gambar(5);

?>