<?php include ROOT . '/views/layouts/header.php'; ?>
<script> 
    window.onload=function(){
        get_comment();
    }
    function clr() {
        document.getElementById('getComments').innerHTML = '';
    }
    function get_comment(){
        var xhr = new XMLHttpRequest();
        var id = "<?php echo $id; ?>";
        var url = "/getcom/"+id;
        var comment = document.getElementById("comment").value;
        var body = "comment="+comment+"&id_post="+id;
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send();
        xhr.onreadystatechange = function() {
	    if(xhr.readyState == 4 && xhr.status == 200) {
               var res = JSON.parse(xhr.responseText);
               for (var i = 0; i < res.length; i++) {    
                    console.log(res[i].text);
                    var parent = document.getElementById("getComments");
                    var div = document.createElement("div");
                    var div2 = document.createElement("div");
                    var div3 = document.createElement("div");
                    var div4 = document.createElement("div");
                    div.className = 'panel panel-primary';
                    div2.className = 'panel-heading';
                    div3.className = 'panel-title';
                    div4.className = 'panel-body';
                   
                    div3.innerHTML = res[i].id;
                    div4.innerHTML = res[i].text;
                    div2.appendChild(div3);
                    div.appendChild(div2);
                    div.appendChild(div4);
                    parent.appendChild(div);
                    
               } // end for
	    } // end if
        } // end onreadystatechange   
    } // end function get_comment()    
    function add_comment(){
        if(autoValidate()){
            var xhr = new XMLHttpRequest();
            var id = "<?php echo $id; ?>";
            var url = "/addcommment/"+id;
            var comment = document.getElementById("comment").value;
            var body = "comment="+comment+"&id_post="+id;
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send(body);
            xhr.onreadystatechange = function() {
	        if(xhr.readyState == 4 && xhr.status == 200) {
	        document.getElementById("status").innerHTML = '<div class="alert alert-info" role="alert">Comment has been added successfully!</div>';
                
	        }
            }  // end onreadystatechange 
        document.getElementById("status").innerHTML = "Posting comment...";
        } // end if for validation
    clr(); // delete comments before adding new comments
    get_comment();  // getting all comments after adding new comment.
    }
    function autoValidate() {  // validate for adding comments
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
<input name="myBtn" type="submit" value="Add comment" onclick="add_comment();"> <br></br>
    <ol class="breadcrumb">
  <li class="active">Comments</li>
<p></p>
<div id="getComments"></div>
  </ol>
  </div>  
</div>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>