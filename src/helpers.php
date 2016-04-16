<?php
if (!function_exists('translate')) {
	function translate($field_name)
	{
		$trans1 = config('acl_lang.' . $field_name);
		if (str_contains($trans1, '.')) {
			return ucwords(str_replace("_", " ",$field_name));
		}

		return $trans1;
	}
}