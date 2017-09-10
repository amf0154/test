<?php
class Comments{
    
    public static function getCommentsList($id): array{
        $connect = Database::getInstance(); 
        $db = $connect->getConnection();
        $sql = 'SELECT * FROM comments WHERE id_news=:id_news ORDER BY id DESC';   
        $result = $db->prepare($sql);
        $result->bindParam(':id_news', $id, PDO::PARAM_INT);
        $result->execute();
        $i = 0; 
        $comment = array();
        while ($row = $result->fetch()) {
            $comment[$i]['id'] = $row['id'];
            $comment[$i]['date'] = $row['date'];
            $comment[$i]['text'] = $row['text'];
            $i++;
        }
        return $comment;
    }
    
    public static function addComment($options){
        $connect = Database::getInstance();
        $db = $connect->getConnection();
        $sql = 'INSERT INTO comments (id_news,text) VALUES (:id_news,:text)';
        $result = $db->prepare($sql); 
        $result->bindParam(':id_news', $options['id_post'], PDO::PARAM_INT);
        $result->bindParam(':text', $options['comment'], PDO::PARAM_STR);
        $result->execute();
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
    public static function getNewsById($id): array{
        $connect = Database::getInstance();
        $db = $connect->getConnection();
        $sql = 'SELECT * FROM news WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }    
}
