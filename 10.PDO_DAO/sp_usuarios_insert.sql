CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuarios_insert`(plogin varchar(64), psenha varchar(256))
BEGIN
INSERT INTO TB_USUARIOS (LOGIN, SENHA) VALUES(plogin,psenha);

SELECT * FROM TB_USUARIOS WHERE idusuario = LAST_INSERT_ID();
END