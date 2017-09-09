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
<form name="form"  action='#' method='post'>
<p><input name='title' type='text' size='11' maxlength='120' value="" placeholder="title"></p> 
<p>text:<BR /> <textarea name='text' id='tack' cols='30' rows='5'></textarea></p>     
<input type='submit' name='submit' id='submit' value='Отправить'></p>
</body>
</div>
               
<?php endif; ?>

