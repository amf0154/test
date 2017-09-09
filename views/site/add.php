<script>
function ajax_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "/add";
    var fn = document.getElementById("title").value;
    var ln = document.getElementById("text").value;
    var vars = "title="+fn+"&text="+ln;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
			document.getElementById("status").innerHTML = 'News has been added successfully!';
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "Posting articles...";
}
</script> 
<?php if ($add): ?>
    <p><b>&nbsp&nbsp&nbspNews has just added! <a href="/add">Add one more?</a></b></p>
    <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>                   
    <body>
                   
<div class='add' style='padding-left: 15px;'>
Title: <input id="title" name="title" size="40" type="text">  <br><br>
Text: <textarea name="text" id="text" cols="40" rows="3"></textarea> <br><br>
<input name="myBtn" type="submit" value="Submit Data" onclick="ajax_post();"> <br><br>
<div id="status"></div>
<div id="status"></div>
</body>
</div>
               
<?php endif; ?>

