<?php
session_start();

//Depois de verificar login e senha, reinicie o ID da sessão
session_destroy();

//Iniciar novamente
session_start();

//Gera outro id
session_regenerate_id();

echo session_id();