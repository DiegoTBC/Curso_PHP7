<?php

for ($i = 0; $i <= 10; $i++){
    echo "2 x $i = ". 2*$i . "<br>";
}

echo "<br>";

for ($i = 0; $i <= 100; $i+=10){
    echo "2 x $i = ". 2*$i . "<br>";
}

echo "<br>";

for ($i = 0; $i <= 100; $i+=10){
    if ($i === 20 or $i === 80)
        continue;
    echo $i."<br>";
}

echo "<br>";

echo "<select>";

for ($i=date("Y"); $i >= date("Y")-10; $i--){
    echo "<option value='$i'>$i</option>";
}

echo "</select>";