<?php 
	$datatype == 'story' ? $post_title = $item['storytitle'] : $post_title = $item['photo_video_title'];

	if($item['submittype'] =='story'): 
		$meta_des =  substr($item['story'], 0, 100);	
		$image_url = empty( $item['storyphoto']) ? '/howcowhappened/assets/images/default.jpg' : "/howcowhappened/images/full/". $item['storyphoto']; 
	else:
		$meta_des =  substr($item['photo_video_caption'], 0, 100);
		$image_url = "/howcowhappened/images/thumb/". $item['image'];

	endif;			

	?>
 
<meta name=description content="<?php print preg_replace('~[\r\n]+~', '', $meta_des)?>"/>
<link rel=canonical href="http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>"/>
<link rel=shortlink href="http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>"/>
<meta property=fb:app_id content=222553251446821 />
<meta property=og:site_name content="The Daily Star"/>
<meta property=og:type content=article />
<meta property=og:url content="http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>"/>
<meta property=og:title content="<?php print $post_title ;?> | HowCowHappened, The Daily Star"/>
<meta property=og:description content="<?php print preg_replace('~[\r\n]+~', '', $meta_des);?>"/>
<meta property=og:image content="http://www.thedailystar.net/howcowhappened/images/full/<?php print $image_url;?>"/>
<meta property=og:image content="http://www.thedailystar.net/sites/default/files/ds-logo.jpg"/>
<meta name=twitter:card content=summary_large_image />
<meta name=twitter:site content="@dailystarnews"/>
<meta name=twitter:creator content="@dailystarnews"/>
<meta name=twitter:url content="http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>"/>
<meta name=twitter:title content="<?php print $post_title ;?>"/>
<meta name=twitter:description content="<?php print preg_replace('~[\r\n]+~', '', $meta_des);?>"/>
<meta name=twitter:image content="http://www.thedailystar.net/howcowhappened/images/full/<?php print $image_url;?>"/>