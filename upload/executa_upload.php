<?php
include "config_upload.php";  // arquivo que contém as variáveis de configuração

$nome_arquivo=$_FILES['arquivo']['name'];  
$tamanho_arquivo=$_FILES['arquivo']['size']; 
$arquivo_temporario=$_FILES['arquivo']['tmp_name']; 

if (!empty($nome_arquivo))
{
	if($sobrescrever=="não" && file_exists("$caminho/$nome_arquivo"))
		die("Arquivo já existe");

	if($limitar_tamanho=="sim" && ($tamanho_arquivo > $tamanho_bytes))  
		die("Arquivo deve ter o no máximo $tamanho_bytes bytes");

	$ext = strrchr($nome_arquivo,'.');
	if (($limitar_ext == "sim") && !in_array($ext,$extensoes_validas))
		die("Extensão de arquivo inválida para upload");
		
	if (move_uploaded_file($arquivo_temporario, "imagens/$nome_arquivo"))
{
	echo " Upload do arquivo: ". $nome_arquivo." foi concluído com sucesso";
}
else
{
	echo "Arquivo não pode ser copiado para o servidor.";

}
}
else
{ 
	die("Selecione o arquivo a ser enviado");
}
?>