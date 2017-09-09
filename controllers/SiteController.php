<?php

class SiteController {
    public function actionIndex($page = 1){
        $news = News::getNewsList($page);
        $total = News::getTotalNews();
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/views/site/index.php');
        return true;
    } 
    
    public function actionAdd(){
        if (isset($_POST['title']) && isset($_POST['text'])) {
            $options['title'] = $_POST['title'];
            $options['text'] = $_POST['text'];
            News::addNews($options);
            }
        require_once(ROOT . '/views/site/add.php');
        return true;
    }
    
    public function actionView($id){
    $article = News::getNewsById($id);
    $comments = Comments::getCommentsList($id);
    require_once(ROOT . '/views/site/view.php');
    return true;
    }
    
    public function actionAddcommment(){
        print_r("aaaaaaaaaaaaa=".$_POST);
        if (isset($_POST['comment']) && isset($_POST['id_post'])) {
            $options['id_post'] = $_POST['id_post'];
            $options['comment'] = $_POST['comment'];
            Comments::addComment($options);
        }
        
        require_once(ROOT . '/views/site/view.php');
        return true;
    } 
    
}