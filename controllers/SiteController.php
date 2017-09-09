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
        $add = false;
        if (isset($_POST['submit'])) {
            $options['title'] = $_POST['title'];
            $options['text'] = $_POST['text'];
            $errors = false;
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Please, inter title';
            }
            if (!isset($options['text']) || empty($options['text'])) {
                $errors[] = 'Please, inter text';
            }
              
            if ($errors == false) {
                $id = News::addNews($options);
                $add = true;
            }
        }
        require_once(ROOT . '/views/site/add.php');
        return true;
    }
    
}