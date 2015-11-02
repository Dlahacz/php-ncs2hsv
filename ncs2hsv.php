<?php

function ncs2hsv($ncs){

  $hues = array(
              'r' => 0,
              'y' => 60,
              'g' => 120,
              'b' => 240,
           );

  $ncs = strtolower($ncs);

  $v = intval(substr($ncs, 1, 2));

  $v = (100-$v);

  $s = intval(substr($ncs, 3, 2));

  $h = (substr($ncs, 6, (strlen($ncs)-1)));

  if (strlen($h) === 1) {
      $h = $hues[$h];
  }else{

        $p1 = substr($h, 0, 1);
        $p2 = substr($h, 3, 1);
        $p1 = $hues[$p1];
        $p2 = $hues[$p2];
        $frac = substr($h, 1, 2);
        $frac = intval($frac) * 0.01;
        $h = $p1*$frac + $p2*(1-$frac);
        $h = round($h);
  }

  return array($h, $s, $v);

}

?>
