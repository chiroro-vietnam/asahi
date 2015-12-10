<?php
	function test(){
		echo "1";
	}


	/************************************************************************
	*	cut string by number works
	/************************************************************************/
	function cut_string($string, $number = 0){
		//$total = str_word_count($string);
		$total = count(preg_split('/\s+/', $string));
		$result_string = '';
		if($number > $total || $number == 0){
			$number = $total;
		}
		if($total > 2){
			$str = explode(' ', $string, $number+1);

			for($i=0; $i<$number; $i++){
				$result_string .= (string)$str[$i] . ' ';
			}
			$result_string = trim($result_string);
		}else{
			$result_string = $string;
		}

		return $result_string.'...';
	}
?>