<?php
$params = array();
foreach($this->params['url'] as $key=> $value){
	if(!empty($value)){
		$params[$key] = $value;
	}
}
$this->Paginator->options(array(
	'convertKeys'=> array_merge(array_keys($params),array('page')),
    'url' => $params
));
?>