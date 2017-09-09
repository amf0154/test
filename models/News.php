<?php
class News{
    
    const SHOW_BY_DEFAULT = 5;
    public static function getNewsList($page = 1): array{
        $limit = self::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $connect = Database::getInstance(); 
        $db = $connect->getConnection();
        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT :limit OFFSET :offset';   
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();
        $i = 0; 
        $article = array();
        while ($row = $result->fetch()) {
            $article[$i]['id'] = $row['id'];
            $article[$i]['title'] = $row['title'];
            $article[$i]['date'] = $row['date'];
            $article[$i]['text'] = $row['text'];
            $i++;
        }
        return $article;
    }
    
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
    
    public static function getTotalNews(): int{
        $connect = Database::getInstance();
        $db = $connect->getConnection();
        $sql = 'SELECT count(id) AS count FROM news';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }    
}

