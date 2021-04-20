<?php
namespace App\Helpers;

class AppHelper
{
    public static function getTableAttributes($attributes)
    {
    	$tableAttributes = [];
    	foreach ($attributes as $key => $attribute) {
    		if (isset($attribute['tableview']) && $attribute['tableview'] == FALSE)
    			continue;

    		$tableAttributes[$key] = $attribute['label'];
    	}

        return $tableAttributes;
    }

    public static function getSearchAttributes($attributes)
    {
    	$searchAttributes = [];
    	foreach ($attributes as $key => $attribute) {
    		if (isset($attribute['search']) && $attribute['search'])
    			$searchAttributes[$key] = $attribute['label'];
    	}

        return $searchAttributes;
    }
}
