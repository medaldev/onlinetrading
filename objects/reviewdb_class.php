<?php

class ReviewDB extends ObjectDB {

	protected static $table = "reviews";

	public function __construct() {
		parent::__construct(self::$table);
		$this->add("name");
		$this->add("avatar");
		$this->add("text");
	}


	public static function getAllReviews() {
		$data = self::getAll(__CLASS__, self::$table);
		$data = self::initAvatars($data);
		return $data;
	}

	public static function initAvatars($data) {
		foreach ($data as $d) {
			$d->avatar = Config::DIR_AVATARS.$d->avatar;
		}
		return $data;
	}
}

?>
