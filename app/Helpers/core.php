<?php
/*
 * System core helper functions
 */

//random code generator with unique number and custom digit length
function helper_core_code_generator($unique = 1, $count = 10): string
{
    $length = $count - strlen($unique) ;
    $start =1;
    $end = 9;
    for($i=1;$i<$length;$i++){
        $start.=0;
        $end.=9;
    }
    return $unique.random_int($start,$end);
}

