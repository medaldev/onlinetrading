<?php

class TopicDB extends ObjectDB {

    protected static $table = "topics";

    public function __construct() {
        parent::__construct(self::$table);
        $this->add("id");
        $this->add("title");
        $this->add("sef");
        $this->add("meta_key");
        $this->add("meta_desk");
    }


    public static function getAllTopics() {
        $data = self::getAll(__CLASS__, self::$table);
        $data = self::addSections($data);
        return $data;
    }

    private static function addSections($topics) {
        foreach ($topics as $topic) {
            $topic->sections = SectionDB::getAllSectionsOnTopic($topic->id);
        }
        return $topics;
    }


}

?>
