<?php

class SiteController {
    // function actionIndex for main page
    public function actionIndex($page = 1){
        $news = News::getNewsList($page); // array of all news
        $total = News::getTotalNews();  // total count of news
        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');  // getting pages
        require_once(ROOT . '/views/site/index.php');
        return true;
    } 
    // function actionAdd for adding news
    public function actionAdd(){
        if (isset($_POST['title']) && isset($_POST['text'])) {
            $options['title'] = $_POST['title'];
            $options['text'] = $_POST['text'];
            News::addNews($options); // Adding news  
        }
        require_once(ROOT . '/views/site/add.php');
        return true;
    }
    // function actionView for view full information for article
    public function actionView($id){
        $article = News::getNewsById($id); // getting post info by id
        $comments = Comments::getCommentsList($id); // getting comments for post by id
    require_once(ROOT . '/views/site/view.php');
    return true;
    }
    // function actionAddcomment for adding comments
    public function actionAddcommment(){
        if (isset($_POST['comment']) && isset($_POST['id_post'])) {
            $options['id_post'] = $_POST['id_post']; // adding id post to array $options
            $options['comment'] = $_POST['comment']; // adding comment to array $options
            Comments::addComment($options); // for adding new comments
        }
        return true;
    }
    // function actionEdit for getting info about updating post
    public function actionEdit($id){
        $article = News::getNewsById($id); // // getting post info by id
        require_once(ROOT . '/views/site/edit.php');
        return true;
    }
    // function actionUpdate for updating post
    public function actionUpdate(){ 
    if (isset($_POST['title']) && isset($_POST['text']) && isset($_POST['id'])) {
            $id = $_POST['id']; // id for updating post
            $options['title'] = $_POST['title']; // adding title to array $options
            $options['text'] = $_POST['text']; // adding text to array $options
            News::editNewsById($id, $options); // updating post with new data from array $options
            }       
        require_once(ROOT . '/views/site/edit.php');
        return true;
    }    
    
}