<?php include ROOT . '/views/layouts/header.php'; ?>
    <div class="container">
  <center>
  <table class="table">
        <thead>
          <tr>
            <th width="200">Title</th>
            <th width="600">Text</th>
            <th width="150">Date</th>
            <th width="50">Edit</th>
          </tr>
        </thead>
  <tbody>
  <?php foreach ($news as $article): ?>
    <tr>
        <td><a href="/view/<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></td> 
        <td><?php echo $article['text']; ?></td> 
        <td><?php echo $article['date']; ?></td> 
        <td><a href="/edit/<?php echo $article['id']; ?>">edit</a></td>        
    </tr>
 <?php endforeach; ?>                   
   </tbody>
   </table>
      </center>
</div>

<center><?php echo ($pagination->amount()==1)? '': $pagination->get(); ?></center>
<?php include ROOT . '/views/layouts/footer.php'; ?>
