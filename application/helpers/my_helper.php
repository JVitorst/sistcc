<?php 
function var_get_estoque()
{
	$CI =& get_instance();
	return $CI->Comum->get_estoque();
}