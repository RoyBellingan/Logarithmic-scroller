<div style="font-size:22px; width:850px; margin:auto; top: 150px; position:relative">
<?php


$start=isset($_REQUEST["s"]) ? $_REQUEST["s"] : 1;

$nn=microtime(1);

echo log_scroll($start,500);

$nn2=microtime(1);
echo "<br>\n";
echo $nn2-$nn;


function log_scroll($start,$max,$gg=6,$min=1){

        $gm=floor($gg/2);

        $pool=l(1);

        if ($start>$gm+1){
                $i=log($start-$gm)-0.2;
                while (true)                {
                        $p=($start-$gm)-floor(exp($i));
                        if (!($p == 1)){
                                $pool.=l($p);
                        }
                        $i-=0.7;
                        if ($i<1.5){
                                break;
                        }
                }
        }

        for ($i=-$gm; $i<=$gm; $i++){
                $n=$start+$i;
                if ($n>1 && $n<$max){
                        $pool.=lz($n);
                        //$link.=$start+$i." ";
                }
        }
        $z=log($n+4);
        while (true){
                $n=floor(exp($z));
                if ($n<$max && $z < 8){
                        $pool.=l($n);
                        $z+=0.9-$z/10;
                }else{
                        break;
                }
        }
        $pool.=l($max);
        return $pool;
}



function l($n){
        $h=<<<EOD
 <a href="log3.php?s=$n"> $n </a>
EOD;
        return $h;
}


function lz($n){
        $h=<<<EOD
 <a href="log3.php?s=$n"><b> $n </b></a>
EOD;
        return $h;
}



?>
