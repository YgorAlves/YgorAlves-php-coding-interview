<?php

namespace Src\helpers;

class Helpers {
	function putJson($users, $entity) {
		file_put_contents(dirname(__DIR__) . '/../scripts/'.$entity.'.json', json_encode($users, JSON_PRETTY_PRINT));
	}
	public static function arraySearchI($needle, $haystack, $column) {
		return array_search($needle, array_column($haystack, $column));
	}
}