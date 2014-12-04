<?php  

$x = array(2, 3, array(2, 4), 5, array(3, 8, array(2, 1), 8), 24);
// $x = [2,3,[2,4],5[3,8,[2,1],8],24]; 
echo 'Starting array';
var_dump($x);
$flat = array();

function flatten($array) {
	for($i=0; $i<count($array); $i++) {
		if(is_array($array[$i])) {
			flatten($array[$i]);
		} else {
			$flat[] = $array[$i];
		}
	}
	return $flat;
}
echo 'This is flatten:';
$results = flatten($x);
var_dump(flatten($x));;

// function flatten($array) {
// 	for($i=0; $i<count($array); $i++) {
// 		if(!(is_array($array[$i]))) {
// 			$flat[] = $array[$i];
// 		} else {
// 			flatten($array[$i]);
// 		}
// 	}
// 	return $flat;
// }
// echo 'This is flatten:';
// $results = flatten($x);
// var_dump($results);



for($i=0; $i<count($x); $i++) {
	if(!(is_array($x[$i]))) {
		$y[] = $x[$i];
	} else if(is_array($x[$i])) {
		$a = $x[$i];
		for($j=0; $j<count($a); $j++) {
			if(!(is_array($a[$j]))) {
				$y[] = $a[$j];
			} elseif (is_array($a[$j])) {
				$b = $a[$j];
				for($k=0; $k<count($b); $k++) {
					if(!(is_array($b[$k]))) {
						$y[] = $b[$k];
					}
				}
			}
		}
	}
}
echo 'Y';
var_dump($y);

?>
