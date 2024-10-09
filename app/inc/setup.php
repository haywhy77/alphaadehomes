<?php
/**
 *	Setup Helper
 *
 *	The contents of this file are subject to the terms of the GNU General
 *	Public License Version 3.0. You may not use this file except in
 *	compliance with the license. Any of the license terms and conditions
 *	can be waived if you get permission from the copyright holder.
 *
 *	Copyright (c) 2014 ~ ikkez
 *	Christian Knuth <ikkez0n3@gmail.com>
 *
 *	@version 0.3.0
 **/

class Setup extends \Prefab {

	/**
	 * check environment for requirements
	 * @return array
	 */
	public function preflight() {
		/** @var \Base $f3 */
		$f3 = \Base::instance();

		$checkWriteableDirs = [
			$f3->TEMP,
			$f3->LOGS,
			$f3->UPLOADS,
			$f3->DOWNLOAD,
			$f3->PROPERTY,
			'app/data/',
			$f3->get('MENU'),
			$f3->get('ASSETS.public_path'),
		];
		
		$preErr = [];

		foreach ($checkWriteableDirs as $dir){
			if (empty($dir)) continue;
			if (!is_dir($dir)):
				mkdir($dir);
				chmod($dir, 0755);
				// $preErr[] = sprintf("Warning: '%s' does not exist!", $dir);
			elseif (!is_writable($dir)):
				$preErr[] = sprintf("Warning:'%s' is not writable!", $dir);
			endif;
		}
		
		$checkWriteableFiles = [
			'app/data/menus.json',
			'app/data/states.json'
		];

		foreach ($checkWriteableFiles as $file){
			if (!file_exists($file))
				$preErr[] = sprintf("Warning: '%s' does not exist!", $file);
			elseif (!is_writable($file))
				$preErr[] = sprintf("Warning:'%s' is not writable!", $file);
		}
		return $preErr;
	}


	public function load() {
		/** @var \Base $f3 */
		$f3 = \Base::instance();
		$checkWriteableFiles = [
			'app/data/menus.json',
			'app/data/states.json',
		];
		foreach ($checkWriteableFiles as $file){
			if (!file_exists($file)) throw "File: $file does not exist";
			$fp = fopen($file, 'rb');
			if ( !$fp ) {
				throw "Unable to load File: $file into registry";
			}
			$names=explode("/", str_replace(".json","",$file));
			
			$menus=json_decode( stream_get_contents($fp) );
			$f3->set(strtoupper($names[count($names)-1]), $menus);
			// if($menu):
			// 	$f3->set(strtoupper($names[count($names)-1]), $menus->$menu);
			// else:	
			// 	$f3->set(strtoupper($names[count($names)-1]), $menus);
			// endif;
		}
		
	}

	public function write($uri, $content){

		$dir=mb_substr($uri,0,-mb_strlen(strrchr($uri,"/")));
		
		if(!file_exists($dir)) {
			mkdir($dir,0777);
		}
		$fp = fopen($uri, 'w+');
		fwrite($fp, $content);
		fclose($fp);
		return true;
	}
}