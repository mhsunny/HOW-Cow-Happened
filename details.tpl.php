<header id="head" class="secondary"></header>

<!-- container -->
<div class="container detail">

  <ol class="breadcrumb">
    <li><a href="/howcowhappened">Home</a></li>
    <li class="active">Details</li>
  </ol>

  <div class="row">
    
    <!-- Article main content -->
    <article class="col-md-8 maincontent">
      <header class="page-header">
        <h1 class="page-title">
		
		
		<?php  if($datatype=='story'){ ?>
		
		<?php print $item['storytitle'];?>
		
		<?php }else { ?>
		
		<?php print $item['photo_video_title'];?>
		<?php } ?>
		
		</h1>
      </header>

      <div class="text-left socal-pad">
        <div class="social">
          <span class="likebox"><?php print $item['like'];?></span>
          <a href="#" class="exec-like" data-id="<?php print $item['id'];?>"><i class="fa fa-heart-o" aria-hidden="true"></i> <span class="like">Like</span></a>
           &nbsp; 
          <a href="https://twitter.com/home?status=http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;"> <i class="fa fa-twitter twitter-icon"></i></a> &nbsp; 
          <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;"> <i class="fa fa-facebook facebook-icon"></i></a> &nbsp; 
          <a href="https://plus.google.com/share?url=http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;"> <i class="fa fa-google-plus google-Plus-icon"></i></a>
        </div>
      </div>

	<?php  if($datatype=='story'){ ?>

      <p>
	  <?php if(!empty($item['storyphoto'])){ ?> 
	  <img src="/howcowhappened/images/full/<?php print $item['storyphoto'];?>">
	  
	  <?php } else { ?><img src="/howcowhappened/assets/images/default.jpg" alt="" class="img-rounded"><?php } ?>
	  
	  </p>
      <blockquote><?php print $item['story'];?></blockquote>
	  <?php }else { ?>
	   <p>
	   
	   <?php if(!empty($item['videolink']) && $item['video_or_photo']=='vvideo'){ ?>
	   
	   
	   <div class="vcontainer">
	   <?php echo convertYoutube( $item['videolink'] ); ?></p>
	   </div>
	   
	   <?php } else {?>
	   
	   <img src="/howcowhappened/images/full/<?php print $item['image'];?>">
	   <?php } ?>
	   
		<?php print $item['photo_video_caption']; ?>

		<?php } ?>
    </article>
    <!-- /Article -->
    
    <!-- Sidebar -->
    <aside class="col-md-4 sidebar sidebar-right">
      <div class="row widget">
        <div class="col-xs-12">       
          <h2 class="latest-news">Latest Post</h2>
        </div>
      </div>
      <?php
	  if($datatype=='story'){
	   foreach($related as $rel):?>
	  <?php //print $rel['id'];?>
	  
        <div class="row widget">
          <div class="col-xs-12">
          	 
          	<h3 class="page-title"><a href="/howcowhappened/details/<?php print $rel['id'];?>"><?php print $item['storytitle'];?></a></h3>
 
            
			<?php  
			if(!empty($rel['storyphoto'])){ ?>
              <img src="/howcowhappened/images/thumb/<?php print $rel['storyphoto'];?>" alt="how-cow" class="img-rounded"> <h4><?php print $rel['storytitle'];?></h4>
			  <?php } 
			  else { ?>
			  <img src="/howcowhappened/assets/images/default.jpg" alt="" class="img-rounded">
			    <h4><?php print $rel['storytitle'];?></h4>
			  
			  <?php } ?>
            
          </div>
        </div>
      <?php endforeach;
	  
	  }
	  ?>

	  
	   <?php
	  if($datatype=='video'){
	   foreach($related as $rel):?>
	  <?php //print $rel['id'];?>
	  
        <div class="row widget">
          <div class="col-xs-12">
          	<h3 class="page-title"><a href="/howcowhappened/details/<?php print $rel['id'];?>"><?php print $item['photo_video_title'];?></a></h3> 

             
			<?php  
			if(!empty($rel['videolink']) && $rel['video_or_photo']=='vvideo'){ ?>
			 <div class="vcontainer"><?php echo convertYoutube( $rel['videolink'] ); ?></div>
			 
			  <?php } 
			  else 
			  { ?>
			
			     <img src="/howcowhappened/images/thumb/<?php print $rel['image'];?>" alt="how-cow" class="img-rounded">
			  <?php } ?> 
			     <p><?php print substr($item['photo_video_caption'], 0, 200);?>...</p>
             
          </div>
        </div>
      <?php endforeach;
	  
	  }
	  ?>
	   
	   <a href="#"><img width="100%" class="img-round" src="/howcowhappened/assets/images/Mojo_Pack_Thumb.jpg" alt="mojo"></a> 
	  
	  
    </aside>
    <!-- /Sidebar -->

  </div>
</div>  <!-- /container -->
