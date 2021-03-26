<?php $file = "sucker.txt";
$rez = file_get_contents($file);
$data = ['name' => $_POST['name'],
         'section' => $_POST['section'],
         'card' => $_POST['card'],
         'status' => $_POST['status'],
    ];
$data = array_filter( $data, function ($item)
{
    return strlen ( trim($item));
});
if(count($data) != 4)
{
    header("Location: errormessage.php");
    die();
}
$rez .= "\n" . implode( ';' , $data);
file_put_contents($file, $rez);
?>
<!DOCTYPE html PUBLIC>
<html lang="">
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
             print $data['name'];
         ?>
    </dd>
    <dt>Section</dt>
    <dd>
        <?php
          print $data['section'];
        ?>
    </dd>
    <dt>Credit Card</dt>
    <dd>
        <?php
           print $data['card'];
           print "(" .$data['status']. ")";
         ?>
    </dd>

</dl>

<pre>
    <p>Here are all suckers who have submitted here: </p>
     <?php print $rez; ?>
</pre>
</body>
</html>
