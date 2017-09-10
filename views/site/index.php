<?php include ROOT . '/views/layouts/header.php'; ?>
    <div class="container">
  
  
  <?php foreach ($news as $article): ?>
      <div class="col-sm-14">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><a href="/view/<?php echo $article['id']; ?>"> <?php echo $article['title']; ?></a> 					  </div>
    <div class="panel-body">
      <div class="col-md-14"><?php echo $article['text']; ?><p></p>
          <a href="/edit/<?php echo $article['id']; ?>" type="button" class="btn btn-default btn-sm">Edit post</a> 
          <div class="navbar-right"> Added  <?php echo $article['date']; ?>&nbsp;&nbsp;</div>


</div>
      
    </div>
  </div>
</div>
      


    
 <?php endforeach; ?>                   

   
</div>

<center><?php echo ($pagination->amount()==1)? '': $pagination->get(); ?></center>
<?php include ROOT . '/views/layouts/footer.php'; ?>
