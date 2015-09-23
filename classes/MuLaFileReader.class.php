<?php

/**
 * Helper class to combine parsing language files.
 * It only contains static classes which return arrays.
 * @author Jannik / @gltyllthsm / Github: jeyemwey
 */
class MuLaFileReader {

	/**
	 * CSV interpreter
	 * @param string $path_ Path to the CSV file
	 * @param integer $delimiter_ Delimiter of the CSV file
	 * @return array|bool The language array which might get into MuLa::__construct or false if file doesn't exist.
	 */
	public static function CSV($path_, $delimiter_) {
		if (($handle = fopen($path_, "r")) !== FALSE) {
			
			/**
			 * @var return array. Currently empty.
			 */
			$array = array();

			/**
			 * For every translation (Line of the file), hash the original string and context it with the translated one.
			 */
			while($item = fgetcsv($handle, 0, $delimiter_)) {
				$item = array_map("utf8_decode", $item);

				$array[Mula::Hash($item[0])] = $item[1];
			}

			fclose($handle);

			return $array;
		} else
			return 0;
	}


	/**
	 * JSON interpreter
	 * @param string $path_ Path to JSON file
	 * @return array|bool The language array or false if there was an error
	 */
	public static function JSON($path_) {
		if ($json = json_decode(file_get_contents($path_), 1)) {
			
			/**
			 * @var return array. Currently empty.
			 */
			$array = array();

			/**
			 * For every translation (Line of the file), hash the original string and context it with the translated one.
			 */
			foreach ($json as $item) {
				$item = array_map("utf8_decode", $item);
				$array[Mula::Hash($item["orig"])] = $item["out"];
			}

			return $array;
		} else
			return 0;
	}
}