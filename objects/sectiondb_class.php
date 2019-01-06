<?php

class SectionDB extends ObjectDB {

    protected static $table = "sections";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("id");
        $this->add("title");
        $this->add("sef");
        $this->add("topic_id");
        $this->add("text");
    }


    public static function getAllSections() {
        $data = self::getAll(__CLASS__, self::$table);
        return $data;
    }


    public static function getSectionOnId($id) {
        return ObjectDB::getAllOnField(self::$table, __CLASS__, "id", $id, "id");
    }

    public function loadOnId($id) {
        return $this->loadOnField("id", $id);
    }

    public function loadOnTitle($title) {
        return $this->loadOnField("title", $title);
    }

    public static function getAllSectionsOnTopic($id) {
        return ObjectDB::getAllOnField(self::$table, __CLASS__, "topic_id", $id, "id");
    }

    public static function postLoad() {
        return true;
    }

    public static function postInsert() {
        return true;
    }

    public static function preUpdate() {
        return true;
    }

    public static function preInsert() {
        return true;
    }

    public static function postUpdate() {
        return true;
    }

    public static function preDelete() {
        return true;
    }

    public static function postDelete() {
        return true;
    }


}

?>
