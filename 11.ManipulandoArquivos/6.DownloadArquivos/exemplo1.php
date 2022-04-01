<?php

$link = "https://logosmarcas.net/wp-content/uploads/2020/07/Cleveland-Browns-Logo.png";
$content = file_get_contents($link);

$parse = parse_url($link);

$basename = basename($parse["path"]);

$file = fopen($basename, "w+");
fwrite($file, $content);
fclose($file);

?>

<img src="<?=$basename?>" alt="">
