<?php

class MyDB extends SQLite3 {
  function __construct() {
    $this->open('./db/fsd.db');
  }
}

function post_validate(&$app) {
  $error = array();
  $error_main = '';
  $post = $app->request->post();
  if(empty($post['name'])) {
    $error[] = 'Name is required.';
  }
  if(empty($post['email'])) {
    $error[] = 'Email address is required.';
  } else {
    if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Invalid email address.';
    } /*else {
      if(post_exist($post['email'])) {
        $error_main = 'You can submit your photo at once.';
      }
    }*/
  }
  if(empty($post['phone'])) {
    $error[] = 'Phone is required.';
  }
  
  
  if(empty($post['submittype'])) {
    $error[] = 'Story or Photo/Video Selection is required.';
  }
  


  if(!empty($post['submittype']) && $post['submittype']=="story" && empty($post['storytitle'])) {
    $error[] = 'Your Story Title is required.';
  }


  if(!empty($post['submittype']) && $post['submittype']=="story" && empty($post['story'])) {
    $error[] = 'Your story is required.';
  }
  
 
  if(!empty($post['submittype']) && $post['submittype']=="video"  && empty($post['video_or_photo'])) {
    $error[] = 'What do you want to upload?  Photo/Video is required.';
  }
  
  
  
  
     if(!empty($post['submittype']) 
	 && $post['submittype']=="video"  
	 && !empty($post['video_or_photo'])
	 && empty($post['photo_video_title'])
	 ) 
	 {
    	$error[] = 'Video / Photo Title is required.';
 	 }
  
  

  
     if(!empty($post['submittype']) 
	 && $post['submittype']=="video"  
	 && !empty($post['video_or_photo'])
	 && empty($post['photo_video_caption'])
	 ) 
	 {
    	$error[] = 'Video / Photo caption is required.';
 	 }
  
  


  
     if(!empty($post['submittype']) 
	 && $post['submittype']=="video"  
	 && !empty($post['video_or_photo'])
	 && $post['video_or_photo']=="vphoto"
	 && ($_FILES['photos']['size'] == 0)
	 ) 
	 {
    	$error[] = 'What do you want to upload?  Photo is required.';
 	 }
  
  
     if(!empty($post['submittype']) 
	 && $post['submittype']=="video"  
	 && !empty($post['video_or_photo'])
	 && $post['video_or_photo']=="vvideo"
	 && empty($post['videolink'])
	 ) 
	 {
    	$error[] = 'Your Youtube or Vimio video link is required.';
 	 }
  

 

	 if($_FILES['photos']['size'] > 1048576) {
		$error[] = 'Maximum photo upload size 1 MB.';
	  }

	
  if($error_main) {
    $error = array($error_main);
  }

  return implode('<br/>', $error);
}


function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe width='100%' class='video'  src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
        $string
    );
}

function post_file_upload() {
	
	

	
  $storage = new \Upload\Storage\FileSystem('images');
  $file = new \Upload\File('photos', $storage);

  $new_filename = uniqid();
  $file->setName($new_filename);

  $file->addValidations(array(
    new \Upload\Validation\Mimetype(array('image/png', 'image/jpg', 'image/jpeg', 'image/gif')),
    new \Upload\Validation\Size('5M')
  ));

  $data = array(
    'name' => $file->getNameWithExtension(),
    'size' => $file->getSize(),
  );

  try {
    $file->upload();
  } catch (\Exception $e) {
    $errors = $file->getErrors();
  }

  if(!empty($errors)) {
    print implode('<br/>', $errors);
  } else {
    $data['data'] = base64_encode(file_get_contents('images/' . $data['name']));
    unlink('images/' . $data['name']);
    $_POST['image'] = $data;
  }


}

function post_file_upload2() {
	
  $storage = new \Upload\Storage\FileSystem('images');
  $file = new \Upload\File('photo', $storage);

  $new_filename = uniqid();
  $file->setName($new_filename);

  $file->addValidations(array(
    new \Upload\Validation\Mimetype(array('image/png', 'image/jpg', 'image/jpeg', 'image/gif')),
    new \Upload\Validation\Size('5M')
  ));

  $data2 = array(
    'name' => $file->getNameWithExtension(),
    'size' => $file->getSize(),
  );

  try {
    $file->upload();
  } catch (\Exception $e) {
    $errors = $file->getErrors();
  }

  if(!empty($errors)) {
    print implode('<br/>', $errors);
  } else {
    $data2['data2'] = base64_encode(file_get_contents('images/' . $data2['name']));
    unlink('images/' . $data2['name']);
    $_POST['image2'] = $data2;
  }


}

function post_data_save() {
/*  if(!empty($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR'] != '103.16.74.138') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://dev.thedailystar.net/howcowhappened/responder");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
  } else {*/
    $db = new MyDB();

    if(!empty($_POST['image'])) {
      $data = base64_decode($_POST['image']['data']);
      file_put_contents('./images/' . $_POST['image']['name'], $data);
    }


    if(!empty($_POST['image2'])) {
      $data2 = base64_decode($_POST['image2']['data2']);
      file_put_contents('./images/' . $_POST['image2']['name'], $data2);
    }


    $name = !empty($_POST['name']) ? $_POST['name'] : '';
    $email = !empty($_POST['email']) ? $_POST['email'] : '';
    $phone = !empty($_POST['phone']) ? $_POST['phone'] : '';
	
	
	//submit type story or photo/video
	$submittype = !empty($_POST['submittype']) ? $_POST['submittype'] : '';
	$storytitle = !empty($_POST['storytitle']) ? $_POST['storytitle'] : '';
	$story = !empty($_POST['story']) ? $_POST['story'] : '';
	//$photo = !empty($_POST['photo']) ? $_POST['photo'] : '';
	$video_or_photo = !empty($_POST['video_or_photo']) ? $_POST['video_or_photo'] : '';
	$photo_video_title = !empty($_POST['photo_video_title']) ? $_POST['photo_video_title'] : '';
	$photo_video_caption = !empty($_POST['photo_video_caption']) ? $_POST['photo_video_caption'] : '';
	$videolink = !empty($_POST['videolink']) ? $_POST['videolink'] : '';
	$image = !empty($_POST['image']['name']) ? $_POST['image']['name'] : '';
	$storyphoto = !empty($_POST['image2']['name']) ? $_POST['image2']['name'] : '';


    $sql = "insert into submissions 
	values(NULL,
	'" . $name . "',
	'" . $email . "',
	'" . $phone . "',
	'" . $submittype . "',
	
	'" . $storytitle . "',
	'" . $story . "',
	'" . $video_or_photo . "',
	
	'" . $photo_video_title . "',
	
	'" . $photo_video_caption . "',
	'" . $videolink . "',
	'" . $storyphoto . "',
	'" . $image . "',
	0, 0)";

    $db->query($sql);
 /* }*/
}

function post_like_save($id) {
  if(!empty($_COOKIE['fsd'])) {
    $ids = explode(',', $_COOKIE['fsd']);
    if(in_array($id, $ids)) {
      return '-1';
    } else {
      $ids[] = $id;
      setcookie('fsd', implode(',', $ids), time() + 5184000);
    }
  } else {
    setcookie('fsd', $id, time() + 5184000);
  }

/*  if($_SERVER['SERVER_ADDR'] != '103.16.74.138') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://dev.thedailystar.net/howcowhappened/setlike");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    return $server_output;
  } else {*/
    $db = new MyDB();
    $sql = "select like from submissions where id = " . $id;
    $data = $db->query($sql);
    $row = $data->fetchArray(SQLITE3_ASSOC);
    if(isset($row['like'])) {
      $row['like']++;
      $sql = "update submissions set like = " . $row['like'] . " where id = " . $id;
      $db->query($sql);
      return $row['like'];
    } else {
      return 0;
    }
 /* }*/
}

function show_post_data() {
  $db = new MyDB();

  $sql = "select * from submissions";
  $data = $db->query($sql);

  print '<table width="100%" border="1">';
  print '<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Photo Title</th><th>Caption</th><th>Image</th><th>Status</th></tr>';

  while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
    print '<tr>';
    foreach($row as $k => $r) {
      if($k == 'image') {
        print '<td><a target="_blank" href="/howcowhappened/images/' . $r . '">View Image</a></td>';
      } else {
        print '<td>' . $r . '</td>';
      }
    }
    print '</tr>';
  }
  print '</table>';
}

function get_data($limit = 12, $offset = 0) {
  $db = new MyDB();
  $sql = "select * from submissions order by id desc limit $offset,$limit";
  $data = $db->query($sql);
  $result = array();
  while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
    $result[] = $row;
  }
  return $result;
}

function get_data_single($id) {
  $db = new MyDB();
  $sql = "select * from submissions where id = $id";
  $data = $db->query($sql);
  return $row = $data->fetchArray(SQLITE3_ASSOC);
}



function get_data_type($id) {
  $db = new MyDB();
  $sql = "select * from submissions where id = $id ";
  $data = $db->query($sql);
   $row = $data->fetchArray(SQLITE3_ASSOC);
   
   return $row['submittype'];
}



function get_related_item($id, $limit = 2) {
  $db = new MyDB();
  $sql = "select * from submissions where id <> $id ORDER BY id desc limit 0,$limit";
  $data = $db->query($sql);
  $result = array();
  while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
    $result[] = $row;
  }
  return $result;
}




function get_related_item_with_type($id, $datatype,$limit = 2) {
  $db = new MyDB();
  $sql = "select * from submissions where id <> $id and `submittype`='$datatype' ORDER BY id desc limit 0,$limit";
  $data = $db->query($sql);
  $result = array();
  while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
    $result[] = $row;
  }
  return $result;
}














function post_exist($email) {
  $db = new MyDB();

  $sql = "select id from submissions where email = '$email'";
  $data = $db->query($sql);
  $row = $data->fetchArray(SQLITE3_ASSOC);
  return !empty($row['id']) ? 1 : 0;
}
