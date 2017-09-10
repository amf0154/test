<?php include ROOT . '/views/layouts/header.php'; ?>
<script>   
function add_comment(){
    if(autoValidate()){
        var xhr = new XMLHttpRequest();
        var url = "/addcommment";
        var comment = document.getElementById("comment").value;
        var id = "<?php echo $id; ?>";
        var body = "comment="+comment+"&id_post="+id;
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(body);
        xhr.onreadystatechange = function() {
	    if(xhr.readyState == 4 && xhr.status == 200) {
	        document.getElementById("status").innerHTML = '<div class="alert alert-info" role="alert">Comment has been added successfully!</div>';
              //  document.getElementById("status").innerHTML = xhr.responseText;
	    }
    }
    
    document.getElementById("status").innerHTML = "Posting comment...";
    } // end if for validation
}
function autoValidate() {  
    var comment = document.getElementById("comment").value;
    if (comment.trim() === "") {
        alert("You didn't input comment!");
        return false;
    } 
    return true;
       } // end validate function
</script>
<input type="hidden" id="get_id_news" value="<?php echo $article['id']; ?>">
<div class="container-fluid content-wrapper">	  	
<div class="container content">	  
  <div class="row">
    
<div class="col-sm-14">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> <?php echo $article['title']; ?>	  </h3>						  
    </div>
    <div class="panel-body">
      <div class="col-md-14"><?php echo $article['text']; ?></div>
      
    </div>
  </div>
</div>
<div id="status"></div>      
<textarea name="comment" id="comment" cols="40" rows="3"></textarea> <br><br>
<input name="myBtn" type="submit" value="Add comment" onclick="add_comment();"> <br><br>

    <ol class="breadcrumb">
  <li class="active">Comments</li>
<p></p>  
<?php foreach ($comments as $comment): ?>

      <div class="panel panel-primary"> 
    <div class="panel-heading"> 
        <h3 class="panel-title">Comment #<?php echo $comment['id']; ?></h3> </div> 
        <div class="panel-body"> <?php echo $comment['text']; ?> </div> </div>
         <?php endforeach; ?>  
  </ol>
  </div>  
</div>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>