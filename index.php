<?php
session_start();
require './core/autoload.php';
require './core/helper.php';

$app = new \Slim\Slim();

$app->get('/', function() use ($app) {
  $items = get_data(120, 0);
  $app->render("header.tpl.php", array('home' => 1));
  $app->render("index.tpl.php", array('items' => $items));
  $app->render("footer.tpl.php");
});

$app->get('/about', function() use ($app) {
  $app->render("header.tpl.php");
  $app->render("about.tpl.php");
  $app->render("footer.tpl.php");
});

$app->get('/posts', function() use ($app) {
	
  $items = get_data(120, 0);
  $app->render("header.tpl.php");
  $app->get('posts.tpl.php', 'convertYoutube');
  $app->render("posts.tpl.php" ,array('items' => $items));
  $app->render("footer.tpl.php");
});

$app->get('/submit', function() use ($app) {
  $app->render("header.tpl.php");
  $app->render("submit.tpl.php");
  $app->render("footer.tpl.php");
});

$app->post('/submit', function () use ($app) {
  if($app->request->isPost()) {
    $msg = post_validate($app);
    if($msg) {
      $app->flashNow('error', $msg);
      $app->render("header.tpl.php");
      $app->render("submit.tpl.php", array('data' => $app->request->post()));
      $app->render("footer.tpl.php");
    } else {
      post_file_upload();
	  post_file_upload2();
      post_data_save();
      $app->flash('info', '<p>Thanks for your submission. <br>Please wait a minuite to publish your post.</p>');
      $app->response->redirect('submit');
    }
  }
});

$app->get('/details/:id', function($id) use ($app) {
  $item = get_data_single($id);  
  $datatype=get_data_type($id);  
  $related = get_related_item_with_type($id,$datatype,2);  
  if($item){
    $app->render("header.tpl.php", array('item' => $item, 'datatype' => $datatype)); 
    $convertYoutube = convertYoutube($item['videolink']);  
    $app->render("details.tpl.php", array('related' => $related, 'datatype' => $datatype, 'convertYoutube'=>$convertYoutube));
    $app->render("footer.tpl.php");
  } else {
    $app->response->redirect('/howcowhappened');
  }
});

$app->post('/responder', function() use ($app) {
  if($app->request->isPost()) {
    post_data_save();
  }
});

$app->post('/setlike', function() use ($app) {
  if($app->request->isPost()) {
    $id = $app->request->post('id');
    print post_like_save($id);
  }
});

$app->get('/login', function() use ($app) {
  $app->render("header.tpl.php");
  $app->render("login.tpl.php");
  $app->render("footer.tpl.php");
});

$app->post('/login', function () use ($app) {
  if($app->request->isPost()) {
    $user = $app->request->post('user');
    $pass = $app->request->post('pass');
    if($user == 'mcadmin' && $pass = 'mcpass') {
      $_SESSION['user'] = 1;
      $app->response->redirect('backoffice');
    }
  }
});

$app->get('/backoffice', function() use ($app) {
  if(!empty($_SESSION['user'])) {
    show_post_data();
  } else {
    $app->response->redirect('login');
  }
});

$app->run();