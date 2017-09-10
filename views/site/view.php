<?php include ROOT . '/views/layouts/header.php'; ?>
<script>
function add_comment(){
    if(autoValidate()){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "/addcommment";
    var fn = document.getElementById("comment").value;
    var ln = document.getElementById("get_id_news").value;
   // var ln = "<?php echo $article['id']; ?>";
  // var ln = "5";
    var vars = "comment="+fn+"&id_post="+ln;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
              //  var return_data = hr.responseText;
		document.getElementById("status").innerHTML = '<b>Comment has been added successfully!</b>';
              //  document.getElementById("status").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "Posting comment...";
    } // end if for validation
}
function autoValidate() {  
    var comment = document.getElementById("comment").value;
    if (comment === "") {
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
      

<textarea name="comment" id="comment" cols="40" rows="3"></textarea> <br><br>
<input name="myBtn" type="submit" value="Add comment" onclick="add_comment();"> <br><br>
<div id="status"></div>
<div id="status"></div>
    <ol class="breadcrumb">
  <li class="active">Comments</li>
<p></p>  
<?php foreach ($comments as $comment): ?>

      <div class="panel panel-primary"> 
    <div class="panel-heading"> 
        <h3 class="panel-title">Comment #<?php echo $comment['id']. " added ".$comment['date']; ?></h3> </div> 
        <div class="panel-body"> <?php echo $comment['text']; ?> </div> </div>
         <?php endforeach; ?>  
  </ol>
  </div>  
</div>
</div>




      



<?php include ROOT . '/views/layouts/footer.php'; ?>

