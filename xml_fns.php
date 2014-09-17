<?php

function get_category() {
	$cate_array = array();
	$xml = simplexml_load_file('category.xml');
	foreach ($xml as $item) {
		$cate_array[]['id'] = $item->id;
		$cate_array[]['name'] = $item->name;
	}

	return $cate_array;
}
