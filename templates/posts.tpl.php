<header id="head" class="secondary"></header>
<div class="container marginbottom-big posts">
  <ol class="breadcrumb">
    <li><a href="/howcowhappened">Home</a></li>
    <li class="active">Stories</li>
  </ol>
  <div class="row">
    <div class="col-sm-12">
      <div class="cowhead text-center"><img src="/howcowhappened/assets/images/cow-head.png" alt="how-cow-happend" width="200" class="img-rounded text-center"></div>
    </div>
    <div class="col-sm-6 text-center"> <a class="specialbtn btn" href="/howcowhappened/submit">Submit Story</a>
      <div>
        <?php foreach($items as $item): 
		if($item['submittype']!='story'){continue;}?>					
					
		<div class="col-md-6 col-sm-6 highlight">
          <div class="box-border ">
            <a href="/howcowhappened/details/<?php print $item['id'];?>">
			<?php  
			if(!empty($item['storyphoto'])){ ?>
              <img src="/howcowhappened/images/thumb/<?php print $item['storyphoto'];?>" alt="how-cow" class="img-rounded"><?php } else { ?><img src="/howcowhappened/assets/images/default.jpg" alt="" class="img-rounded"><?php } ?>
            </a>
			
            <div class="h-body text-left box-cont-pad content-bg">
              <div class="h-caption">
                <h4><a href="/howcowhappened/details/<?php print $item['id'];?>"><?php print $item['storytitle'];?></a></h4>
              </div>
              <p><?php print substr($item['story'], 0, 100);?>...</p>
              <div class="margin-bottom-zero top-space">
                <div class="social pad-all-small">                    
                  <a href="https://twitter.com/home?status=http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;" >
                    <i class="fa fa-twitter twitter-icon" ></i>
                  </a> &nbsp; 
                  <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>" onClick="javascript: popupwindow(this.href, '', 600, 600);return false;" >
                    <i class="fa fa-facebook facebook-icon" ></i>
                  </a> &nbsp;
                  <a href="https://plus.google.com/share?url=http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;">
                    <i class="fa fa-google-plus google-Plus-icon" ></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div> 
		
		
        <?php endforeach;?>
      </div>
    </div>
    <div class="col-sm-6"> <a  class="specialbtn btn"  href="/howcowhappened/submit">Submit Photo/Video</a>
      <div class="text-center">
        <?php foreach($items as $item):
			if($item['submittype']!='video'){continue;}?>

		 <div class="col-md-6 col-sm-6 highlight">
          <div class="box-border ">
            <a href="/howcowhappened/details/<?php print $item['id'];?>">
        			<?php  
        			if(!empty($item['videolink'])){?>
              
                  <div class="vcontainer">
  			             <?php  echo convertYoutube( $item['videolink'] ); ?>
  			          </div>  			

        			<?php  }  else   { ?>

                <img src="/howcowhappened/images/thumb/<?php echo $item['image']; ?>   " alt="" class="img-rounded">

              <?php } ?>

            </a>
			
            <div class="h-body text-left box-cont-pad content-bg">
              <div class="h-caption">
                <h4><a href="/howcowhappened/details/<?php print $item['id'];?>"><?php print $item['photo_video_title'];?></a></h4>
              </div>
              <p><?php print substr($item['photo_video_caption'], 0, 100);?>...</p>
              <div class="margin-bottom-zero top-space">
                <div class="social pad-all-small">                    
                  <a href="https://twitter.com/home?status=http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;" >
                    <i class="fa fa-twitter twitter-icon" ></i>
                  </a> &nbsp; 
                  <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>" onClick="javascript: popupwindow(this.href, '', 600, 600);return false;" >
                    <i class="fa fa-facebook facebook-icon" ></i>
                  </a> &nbsp;
                  <a href="https://plus.google.com/share?url=http://www.thedailystar.net/howcowhappened/details/<?php print $item['id'];?>" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;">
                    <i class="fa fa-google-plus google-Plus-icon" ></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
		
		
        <?php endforeach;?>
      </div>
    </div>
  </div>
  <!-- /row -->
</div>
<!-- /container -->
