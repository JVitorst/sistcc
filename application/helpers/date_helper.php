<?php
function dataPtBrMysql($dataPtBr){
	$partes = explode("/", $dataPtBr);
	return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
}

function dataMysqlPtBr($dataMySql){
	$data = new DateTime($dataMySql);
	return $data->format("d/m/Y H:i:s");
}

function dataMysqlPtBr2($dataMySql){
	$data = new DateTime($dataMySql);
	return $data->format("d/m/Y");
}