<?php $file = "sucker.txt";
$rez = file_get_contents($file);
$rez .= $_POST['name'].";".$_POST['selectSection'].";".$_POST['CreditCard'].";".$_POST['status']."\r\n";
file_put_contents($file, $rez);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
<h1>Thanks, sucker!</h1>

<p>Your information has been recorded.</p>

<dl>
    <dt>Name</dt>
    <dd>
        <?php
         if(isset($_POST['submit']))
         {
             $name = $_POST['name'];
             print "".$name."<br/>";
         }
         ?>
    </dd>
    <dt>Section</dt>
    <dd>
        <?php
          print $_POST['selectSection'];
        ?>
    </dd>
    <dt>Credit Card</dt>
    <dd>
        <?php
           $card = $_POST['CreditCard'];
           $radioB= $_POST['status'];
          print " " .$card. " (" .$radioB.")";
         ?>
    </dd>

</dl>

<pre>
    <p>Here are all suckers who have submitted here: </p>
    <?php
    print $rez;
    ?>
</pre>
</body>
</html>
