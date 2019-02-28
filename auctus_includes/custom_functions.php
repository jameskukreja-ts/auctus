<?php
	function pr($value){
		$template = '<pre class="pr">%s</pre>';
		printf($template, trim(print_r($value, true)));;
		return $value;
	}
?>