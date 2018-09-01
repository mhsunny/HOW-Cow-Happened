<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<link rel="shortcut icon" href="http://www.thedailystar.net/sites/all/themes/tds/favicon.ico" type="image/vnd.microsoft.icon"/>
<meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>


<?php if(!empty($item)):?>
  <?php include('templates/meta/details.tpl.php'); // echo 1; // ?>
<?php else:?>
  <?php include('templates/meta/global.tpl.php'); //echo 2; //  ?>
<?php endif; ?>


<link rel="shortcut icon" href="/howcowhappened/assets/images/favicon.png">
<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="/howcowhappened/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="/howcowhappened/assets/css/font-awesome.min.css">
<!-- Custom styles for our template -->
<link rel="stylesheet" href="/howcowhappened/assets/css/bootstrap-theme.css" media="screen" >
<link rel="stylesheet" href="/howcowhappened/assets/css/style.css">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="/howcowhappened/assets/js/html5shiv.js"></script>
  <script src="/howcowhappened/assets/js/respond.min.js"></script>
  <![endif]-->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59519741-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body class="<?php if(!empty($home)):?>home<?php endif;?>"> 
<?php

//print_r($item);
?>
<!-- Fixed navbar -->

<div class="navbar navbar-inverse navbar-fixed-top headroom" >
  <div class="container">
    <div class="navbar-header">
      <!-- Button for smallest screens -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="/howcowhappened"><img src="/howcowhappened/assets/images/how-cow-header.png" alt="how-cow" height="100"></a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav pull-right">
        <li class="active"><a href="/howcowhappened">Home</a></li>
        <li><a href="/howcowhappened/about">About</a></li>
        <li><a href="/howcowhappened/posts">Stories</a></li>
        <li><a class="btn" href="/howcowhappened/submit">Submit</a></li>
      </ul>
    </div>
    <!--/.nav-collapse -->
  </div>
</div>
<!-- /.navbar --> 