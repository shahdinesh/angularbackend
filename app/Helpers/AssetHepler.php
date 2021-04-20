<?php
namespace App\Helpers;

class AssetHepler
{
    public static function moveFile($filename, $config, $id = NULL)
    {
        $modulename = $config['path'];
    	$destinationPath = public_path("uploads/{$modulename}");
    	$oldPath = public_path("uploads/tmp_asset/{$filename}");
    	$destinationPath = (!isset($config['level']) || (isset($config['level']) && $config['level'] == 1)) ? $destinationPath : "$destinationPath/{$id}";

    	if (!is_dir("{$destinationPath}/main")) 
    		mkdir("{$destinationPath}/main", 0755, TRUE);
    	copy($oldPath, "$destinationPath/main/{$filename}");

    	if (isset($config['variant']) && $config['variant']) {
    		foreach ($config['variant'] as $key => $variant) {
    			if (isset($variant['crop']) && $variant['crop'])
	    			$variantraw = \Intervention\Image\Facades\Image::make($oldPath)->resize($variant['width'], $variant['height']);
    			else
	    			$variantraw = \Intervention\Image\Facades\Image::make($oldPath)->resize($variant['width'], $variant['height'], function ($con) {
					    $con->aspectRatio();
					});	    		

		    	if (!is_dir("{$destinationPath}/{$key}")) 
		    		mkdir("{$destinationPath}/{$key}", 0755, TRUE);
	    		$variantraw->save("$destinationPath/{$key}/{$filename}");
    		}
    	}

    	unlink($oldPath);
    }

    public static function getFilePath($filename, $config, $id, $islist = FALSE)
    {
        $tmp_path = public_path("uploads/tmp_asset/{$filename}");
        if (file_exists($tmp_path))
            return $tmp_path;

        $modulename = $config['path'];
        $finalpath = url("uploads/{$modulename}");
        $finalpath = (!isset($config['level']) || (isset($config['level']) && $config['level'] == 1)) ? $finalpath : "$finalpath/{$id}";

        $appendpath = "/main/{$filename}";
        if ($islist && (isset($config['variant']['small'])))
            $appendpath = "/small/{$filename}";
        $finalpath = "{$finalpath}{$appendpath}";;

        return (file_exists($finalpath)) ? $finalpath : '';
    }
}