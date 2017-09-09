<?php include ROOT . '/views/layouts/header.php'; ?>
<script>
function ajax_post(){
    if(autoValidate()){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "/addcom";
    var fn = document.getElementById("title").value;
    var ln = document.getElementById("text").value;
    var vars = "title="+fn+"&text="+ln;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		document.getElementById("status").innerHTML = '<b>News has been added successfully!</b>';
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "Posting articles...";
    } // end if for validation
}
function autoValidate() {  
    var title = document.getElementById("title").value;;
    var text = document.getElementById("text").value;;
    if (title === "") {
        alert("You didn't input title!");
        return false;
    }
    if (text === "") {
        alert("You didn't input text!");
        return false;
    } 
    return true;
       } // end validate function
</script>                   
    <body>
                   
<div class='add' style='padding-left: 15px;'>
Title: <input id="title" name="title" size="40" type="text">  <br><br>
Text: <textarea name="text" id="text" cols="40" rows="3"></textarea> <br><br>
<input name="myBtn" type="submit" value="Add article" onclick="ajax_post();"> <br><br>
<div id="status"></div>
<div id="status"></div>
</body>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>

