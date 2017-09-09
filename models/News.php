<?php
class News{
    
    public static function addNews($options): int{
        $connect = Database::getInstance();
        $db = $connect->getConnection();
        $sql = 'INSERT INTO news (title,text) VALUES (:title,:text)';
        $result = $db->prepare($sql); 
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':text', $options['text'], PDO::PARAM_STR);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }
}

