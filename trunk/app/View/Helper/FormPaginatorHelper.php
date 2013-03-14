<?php
App::import('Helper', 'Paginator');
class FormPaginatorHelper extends PaginatorHelper{

    function sort($title, $key = null, $options = array()) {
		$options = array_merge(array('url' => array(), 'model' => null), $options);

		if(isset($this->params['paging']['nonPaginatorArgs'])){
			$options['url'] = array_merge($this->params['paging']['nonPaginatorArgs'], $options['url']);
			return parent::sort($title,$key,$options);
		}
	}

	function prev($title = '<< Previous', $options = array(), $disabledTitle = null, $disabledOptions = array()) {
		$options = array_merge(array('url' => array()), $options);
		if(isset($this->params['paging']['nonPaginatorArgs'])){
			$options['url'] = array_merge($this->params['paging']['nonPaginatorArgs'], $options['url']);
			return parent::prev($title, $options, $disabledTitle, $disabledOptions);
		}
	}

	function next($title = 'Next >>', $options = array(), $disabledTitle = null, $disabledOptions = array()) {
		$options = array_merge(array('url' => array()), $options);
		if(isset($this->params['paging']['nonPaginatorArgs'])){
			$options['url'] = array_merge($this->params['paging']['nonPaginatorArgs'], $options['url']);
			return parent::next($title, $options, $disabledTitle, $disabledOptions);
		}
	}

	function numbers($options = array()) {
		$options = array_merge(array('url' => array()), $options);
		if(isset($this->params['paging']['nonPaginatorArgs'])){
			$options['url'] = array_merge($this->params['paging']['nonPaginatorArgs'], $options['url']);
			return parent::numbers($options);
		}
	}
}
?>