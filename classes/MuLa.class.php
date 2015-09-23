<?php

/**
 * Main class of the application.
 * @author Jannik / @gltyllthsm / Github: jeyemwey
 */
class MuLa {

	/**
	 * @var data All the language informations.
	 */
	protected $data = array();


	/**
	 * Static function to hash ones original context.
	 * @param string $unhashed_ The original string
	 * @return string A hash of the string.
	 */
	public static function Hash($unhashed_) {
		return md5($unhashed_);
	}

	/**
	 * Constructor to load the data.
	 * @param array $data_ Here the data gets passed in. You may want to use @class MuLaFileReader to read language files.
	 * @return void
	 */
	public function __construct($data_) {
		$this->data = $data_;
	}

	/**
	 * Method to get one translated Element.
	 * @param string $orig_ The string in its original language
	 * @return string Returns eather the string in its user-designed output language or - if it's not found - it returns the string in the original language.
	 */
	public function get($orig_) {

		$key = self::Hash($orig_);

		return (isset($this->data[$key])) ? $this->data[$key] : $orig_;
	}
}