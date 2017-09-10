<?php include ROOT . '/views/layouts/header.php'; ?>
<script>
function update_news(){
    if(autoValidate()){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file    
    var url = "/update";
    var fn = document.getElementById("title").value;
    var ln = document.getElementById("text").value;
    var vars = "title="+fn+"&text="+ln+"&id=<?php echo $id; ?>";
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
             //   var return_data = hr.responseText;
                document.getElementById("status").innerHTML = '<div class="alert alert-info" role="alert">Article has been updated successfully!</div>';
             //   document.getElementById("status").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "Posting comment...";
    } // end if for validation
}
function autoValidate() {  
    var title = document.getElementById("title").value;;
    var text = document.getElementById("text").value;;
    if (title.trim() === "") {
        alert("You didn't input title!");
        return false;
    }
    if (text.trim() === "") {
        alert("You didn't input text!");
        return false;
    } 
    return true;
       } // end validate function
</script>
</script>
<section>
    <div class="container">
        <div class="row">
            <p><div id="status"></div></p>
            <h4>Edit article #<?php echo $id; ?></h4>
            <br/>
            <div class="col-lg-4">
                <div class="login-form">
                        <p>Title:</p>
                        <input type="text" name="title" id="title"size="90" placeholder="" value="<?php echo $article['title']; ?>">
                        <br/><br/> 
                        <p>Text:</p>
                        <textarea type="text" name="text" id="text" placeholder="" cols='90' rows='12' ><?php echo $article['text']; ?></textarea>
                        <br/><br/> 
                        <input name="myBtn" type="submit" value="Save" onclick="update_news();"> <br><br>                        
                        <br/><br/>
                        
                    
                </div>
            </div>

        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>

