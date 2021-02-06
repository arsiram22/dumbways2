<?php

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


echo "<pre>";
