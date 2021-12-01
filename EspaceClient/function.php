<?php
	
	function valid_extension($file_name) 
	{

		$file_ext = strrchr($file_name, ".");
		$extentions_autorisees = array(".jpg", ".JPG", ".png", ".PNG", ".gif", ".GIF");
		if (in_array($file_ext, $extentions_autorisees)) {
			return true;
		} else {
			return false;
		}
	}


	function move_file($sourceFile, $destPath, $destName)
	{
				if(!is_dir($destPath))
					mkdir($destPath);
				$instantCourant=date("dmY_His",time());

				$dest = "{$destPath}/{$instantCourant}_{$destName}"; 			
				if(move_uploaded_file($sourceFile ,$dest))
						return $dest;	
				return null;
	}




?>