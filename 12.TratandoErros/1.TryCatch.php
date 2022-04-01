<?php

try {

    throw new Exception("Deu B.O.", 400);

} catch (Exception $e){
     echo json_encode([
         "message" => $e->getMessage(),
         "line" => $e->getLine(),
         "file" => $e->getCode(),
         "trace" => $e->getTraceAsString()
     ]);
}
