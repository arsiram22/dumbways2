
@php

echo "<pre>";

    $rows=7;
    for($i=1; $i<=$rows; $i++)
    {
        /* Print trailing spaces */
        for($j=1; $j<=$rows-$i; $j++)
        {
            echo '&nbsp;';
        }


        /* Print stars and center spaces */
        for($j=1; $j<=$rows; $j++)
        {
            if($i==1 || $i==$rows || $j==1 || $j==$rows)
            echo '*';
            else
                echo '&nbsp;';
        }

        echo "<br>";
    }
    for($i=1; $i<= $rows; $i++)
    {
        /* Print trailing spaces */
        for($j=1; $j<$i; $j++)
        {
            echo '&nbsp;';
        }


        /* Print hollow parallelogram */
        for($j=1; $j<= $rows; $j++)
        {
            if($i==1 || $i==$rows  || $j==1|| $j==$rows)
            echo '*';
            else
            echo '&nbsp;';
        }

        echo "<br>";
    }


// for ($i = 0; $i < 6; $i++) {
//     for ($j = 0; $j < 7; $j++){
//         if($i==1 || $i==6 || $j==1 || $j==7){
//         echo '*';
//         }
//         else{//output the space in the asterisk
//         echo '&nbsp;';
//         }
//     }
//     echo "<br>";
//     for ($l = 0; $l <=$i; $l++){

//         echo "&nbsp;";
//     }

// }


echo '<hr>';



@endphp


@php

/**
* Print hollow pyramid
*/
$n=5;
for($i=1;$i<=$n;$i++){
For($s=1;$s<=$n-$i;$s++){//output spaces
echo '&nbsp;';
}
for($j=1;$j<=2*$i-1;$j++){
If($j==1||$j==2*$i-1){//output asterisk
 echo '*';
}else{//output the space in the asterisk
 echo '&nbsp;';
}
}
echo '<br>';
}
 @endphp
