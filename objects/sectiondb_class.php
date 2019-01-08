<?php

class SectionDB extends ObjectDB {

    protected static $table = "sections";
    public $sef;
    public $link;


    public function __construct() {
        parent::__construct(self::$table);
        $this->add("id");
        $this->add("title");
        $this->add("topic_id");
        $this->add("text");
        $this->link = "/section?id=".$this->id;
        $this->sef = SefDB::getAliasOnLink($this->link);
    }



    public static function getAllSections() {
        $data = self::getAll(__CLASS__, self::$table);
        $data = self::initDataItems($data);
        return $data;
    }


    public static function getSectionOnId($id) {
        $data = ObjectDB::getAllOnField(self::$table, __CLASS__, "id", $id, "id");
        $data = self::initDataItems($data);
        return $data;
    }

    public function loadOnId($id) {
        $section = $this->loadOnField("id", $id);
        return $section;
    }


    public static function getAllSectionsOnTopic($id) {
        $data = ObjectDB::getAllOnField(self::$table, __CLASS__, "topic_id", $id, "id");
        $data = self::initDataItems($data);
        return $data;
    }

    public static function initDataItems($data) {
        foreach ($data as $d) {
            $d->link = "/section?id=".$d->id;
            $d->sef = SefDB::getAliasOnLink($d->link);
        }
        return $data;
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
