<!doctype html>
<html>
<head>
    <title>JREAM Recursive</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/skeleton.css">
</head>
<body>

<?php
require_once 'array_data.php';
require_once '../vendor/autoload.php';
$r = new \Jream\Recursive\Recursive;
?>

<div class="container">
<div class="row">
<div class="twelve columns">
<h5>$key_results:</h5>
<pre><code>
<?php
$key_result = $r->findByKey($data, 'gender');
print_r($key_result);
?>
</pre></code>

<h5>$val_results</h5>
<pre><code>

<?php
$val_result = $r->findByValue($data, 'Anna');
print_r($val_result);
?>
</pre></code>

<h5>$val_results (fail)</h5>

<pre><code>
<?php
$val_result = $r->findByValue($data, 'Anne');
print_r($val_result);
?>
</pre></code>
</div>
</div>

</body>
</html>