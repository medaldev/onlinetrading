<?php

class MessageDB extends ObjectDB {

	protected static $table = "messages";

	public function __construct() {
		parent::__construct(self::$table);
		$this->add("id");
		$this->add("type");
		$this->add("userid");
		$this->add("text");
	}


	public static function getSelfMessages($id) {
		$to = ObjectDB::getAllOnField(self::$table."_".$id, __CLASS__, "type", 1);
		$from = ObjectDB::getAllOnField(self::$table."_".$id, __CLASS__, "type", 0);
		$result = [];
		foreach ($to as $message) {
			if (!in_array($message->userid, $result)) $result += [$message->userid];
		}
		foreach ($from as $message) {
			if (!in_array($message->userid, $result)) $result += [$message->userid];
		}
		return $result;
	}

	public static function getDialog($id, $user_id) {
		return ObjectDB::getAllOnField(self::$table."_".$id, __CLASS__, "userid", $user_id);
	}

}

?>
