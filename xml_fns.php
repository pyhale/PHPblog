<?php

function get_category() {
	$cate_array = array();
	$xml = simplexml_load_file('category.xml');
	foreach ($xml as $item) {
		$cate_array[] = array('id'=>$item->id, 'name'=>$item->name);
	}

	return $cate_array;
}

function get_catname($id) {
	$cate_array = get_category();
	foreach ($cate_array as $item) {
		if ($item['id'] == $id) {
			return $item['name'];
		}
	}
}
