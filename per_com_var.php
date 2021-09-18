<?php
//permutations
function perkn($arr,$k){
	for($i=0;$i<count($arr);$i++){
		$arr_init[$i][0] = $arr[$i];
	}
	$cnt = 1;
	//echo "<pre>".print_r($arr_init,1)."</pre>";

	while($cnt < $k){
		for($i=0;$i<count($arr_init);$i++){
			for($j=0;$j<count($arr);$j++){
				if(array_search($arr[$j],$arr_init[$i]) === false){
					$arr_perm[] = $arr_init[$i];
					array_push($arr_perm[count($arr_perm)-1],$arr[$j]);
				}
			}
		}
		$arr_init = $arr_perm;
		unset($arr_perm);
		$cnt++;
	}
	return $arr_init;
}
//combinations
function combkn($arr,$k){
	for($i=0;$i<count($arr);$i++){
		$arr_init[$i][0] = $arr[$i];
	}
	$cnt = 1;
	while($cnt < $k){
		for($i=0;$i<count($arr_init);$i++){
			for($j=0;$j<count($arr);$j++){
				if(array_search($arr[$j],$arr_init[$i]) === false){
					$arr_perm[] = $arr_init[$i];
					array_push($arr_perm[count($arr_perm)-1],$arr[$j]);
				}
			}
		}
		$arr_init = $arr_perm;
		unset($arr_perm);
		$cnt++;
	}
	for($i=0;$i<count($arr_init);$i++){
		sort($arr_init[$i]);
		$arr_pu[$i] = implode(",",$arr_init[$i]);
	}	
	$arr_au = array_values(array_unique($arr_pu));
	unset($arr_init);
	for($i=0;$i<count($arr_au);$i++){
		$arr_init[$i] = explode(",",$arr_au[$i]);
	}
	return $arr_init;
}
function combkn2($arr,$k){
	for($i=0;$i<count($arr);$i++){
		$arr_init[$i][0] = $arr[$i];
	}
	$cnt = 1;
	while($cnt < $k){
		for($i=0;$i<count($arr_init);$i++){
			for($j=0;$j<count($arr);$j++){
				if($arr[$j]>$arr_init[$i][count($arr_init[$i])-1]){
					$arr_perm[] = $arr_init[$i];
					array_push($arr_perm[count($arr_perm)-1],$arr[$j]);
				}
			}
		}
		$arr_init = $arr_perm;
		unset($arr_perm);
		$cnt++;
	}
	return $arr_init;
}
//variants
function varkn($arr,$k){
	for($i=0;$i<count($arr);$i++){
		$arr_init[$i][0] = $arr[$i];
	}
	$cnt = 1;
	//echo "<pre>".print_r($arr_init,1)."</pre>";

	while($cnt < $k){
		$c = 0;
		for($i=0;$i<count($arr_init);$i++){
			for($j=0;$j<count($arr);$j++){
				//if(array_search($arr[$j],$arr_init[$i]) === false){
					$arr_perm[$c] = $arr_init[$i];
					array_push($arr_perm[$c],$arr[$j]);
					$c++;
					//array_push($arr_perm[count($arr_perm)-1],$arr[$j]);
				//}
			}
		}
		$arr_init = $arr_perm;
		unset($arr_perm);
		$cnt++;
	}
	return $arr_init;
}
function vars($arr){
	for($i=0;$i<count($arr[0]);$i++){
		$arr_init[$i][0] = $arr[0][$i];
	}
	$cnt = 1;
	while($cnt < count($arr)){
		$arr_perm = array();
		for($i=0;$i<count($arr_init);$i++){
			for($j=0;$j<count($arr[$cnt]);$j++){
				$temp = $arr_init[$i];
				$temp[] = $arr[$cnt][$j];
				array_push($arr_perm,$temp);
			}
		}
		$arr_init = $arr_perm;
		unset($arr_perm);
		$cnt++;
	}
	return $arr_init;
}

//$arr = array(1, 2, 3, 4,5);//,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21);
//echo "<pre>" . print_r(varkn($arr,5), 1) . "</pre>";
$arr = array(1,2,3,4,5,6,7);
echo "<br><pre>Permutations 4/7 : " . print_r(perkn($arr,4), 1) . "</pre>";
//echo "<pre>" . print_r(combkn($arr,3), 1) . "</pre>";
echo "<br><pre>Combinations 4/7 : " . print_r(combkn2($arr,4), 1) . "</pre>";
$arr_test[0] = array(1,2,3,4,5);
$arr_test[1] = array(6,7,8);
$arr_test[2] = array(9,10,11,12);
echo "<br><pre>Variants : " . print_r(vars($arr_test), 1) . "</pre>";
?>
