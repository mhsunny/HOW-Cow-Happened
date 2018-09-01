<header id="head" class="secondary"></header><!--//#header-->

<!-- container -->
<div class="container detail">
	<ol class="breadcrumb">
		<li><a href="/howcowhappened">Home</a></li>
		<li class="active">Details</li>
	</ol>
	<div class="row">
		<!-- Article main content -->
		<article class="col-md-8 maincontent">
			
			<!-- header -->
			<header class="page-header">
				<h1 class="page-title"> 	
					<?php print $datatype == 'story' ? $item['storytitle'] : $item['photo_video_title'];?>
				</h1>
			</header><!--//#header-->

			<!-- socialbox -->
			<div class="text-left socal-pad socialbox">
				<div class="social">
					<?php 
						$social_URL = "http://www.thedailystar.net/howcowhappened/details/". $item['id'];
					?> 
					<a href="https://twitter.com/home?status=<?php print $social_URL;?>" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;"> <i class="fa fa-twitter twitter-icon"></i></a>&nbsp;
					<a href="https://www.facebook.com/sharer/sharer.php?u=" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;"> <i class="fa fa-facebook facebook-icon"></i></a>&nbsp;
					<a href="https://plus.google.com/share?url=" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;"> <i class="fa fa-google-plus google-Plus-icon"></i></a>
				</div><!--//#social-->
			</div><!--//#socialbox-->

			<?php if($datatype == 'story'): ?>

				<?php 
					$image_url = empty( $item['storyphoto']) ? '/howcowhappened/assets/images/default.jpg' : "/howcowhappened/images/full/". $item['storyphoto']; 
				?>
				<p><img src="<?php print $image_url ;?>" alt="<?php print $item['storytitle'];?>" class="img-rounded"></p>
				<blockquote><?php print $item['story'];?></blockquote>

			<?php else : ?>

				<?php if(!empty($item['videolink']) && $item['video_or_photo']=='vvideo'): ?>
					<div class="vcontainer">
						<p><?php  print_r($convertYoutube);//echo convertYoutube( $item['videolink'] ); ?></p>
					</div>
				<?php else: ?>
					<p><img src="/howcowhappened/images/full/<?php print $item['image'];?>" alt="how-cow" class="img-rounded"></p>
				<?php endif; ?>
				
				<blockquote><?php print $item['photo_video_caption']; ?></blockquote>

			<?php endif; ?>

		</article>
		<!-- #//Article -->

		<!-- Sidebar -->
		<aside class="col-md-4 sidebar sidebar-right">
			<div class="row widget">
				<div class="col-xs-12">
					<h2 class="latest-news">Latest Posts</h2>
				</div>
			</div><!--//#row widget-->

			<?php foreach($related as $rel):?>
				
				<div class="row widget">
					<div class="col-xs-12">

						<?php $datatype == 'story' ? $rel_tile = $rel['storytitle'] : $rel_tile = $rel['photo_video_title'];?>
						
							<a href="/howcowhappened/details/<?php print $rel['id'];?>">
								<h4><?php print $rel_tile ;?></h4>
							</a> 

						<?php if($datatype == 'story'): ?>

							<?php
								$image_url = empty( $rel['storyphoto']) ? '/howcowhappened/assets/images/default.jpg' : "/howcowhappened/images/thumb/". $rel['storyphoto'];
							?>
							<p>
								<a href="/howcowhappened/details/<?php print $rel['id'];?>">
									<img src="<?php print $image_url ;?>" alt="<?php print $rel['storytitle'];?>" class="img-rounded">
								</a>
							</p>						 

						<?php else : ?>

							<?php if(!empty($rel['videolink']) && $rel['video_or_photo']=='vvideo'): ?>
								<div class="vcontainer">
									<p><?php echo convertYoutube( $rel['videolink'] ); ?></p>
								</div>

							<?php else: ?>
								<a href="/howcowhappened/details/<?php print $rel['id'];?>">
									<img src="/howcowhappened/images/thumb/<?php print $rel['image'];?>" alt="how-cow" class="img-rounded">
								</a>
							<?php endif; ?>			 

						<?php endif; ?>			

					</div><!--//#col-xs-12-->
				</div><!--//#row widget-->

			<?php endforeach;?>
		  
		  	<!--Advertisement-->
			<div class="marginbottom-big top-space">
				<p><a href="#"><img width="100%" class="img-round" src="/howcowhappened/assets/images/Mojo_Pack_Thumb.jpg" alt="mojo"></a></p>
			</div> <!--//#Advertisement-->
			
		</aside><!-- //#Sidebar -->
	</div><!--//#row widget-->
</div>  <!-- /container -->