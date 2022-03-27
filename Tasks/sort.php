<?php
    function show($s) {
        for($i = 0; $i < count($s)-1; $i++) {
            echo $s[$i]. " ";
        }
    }
    
    function sort($arr) {
        for($i = 0; $i < count($arr)-1; $i++){
            $cnt = 0;
            for($j = 0; $j < count($arr)-$i-1; $j++){
                if($arr[$j] > $arr[$j + 1]){
                    // swapping 
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                    $cnt++;
                }
            }
            if ($cnt === 0)
                break; 
        }
        show($arr);
    }

    $s = array(5, 8, 2, 1, 9);
    sort($s);
?>