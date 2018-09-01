<header id="head" class="secondary"></header>
<!-- container -->

<div class="container">
  <ol class="breadcrumb">
    <li><a href="/howcowhappened">Home</a></li>
    <li class="active">Photo Submit</li>
  </ol>
  <div class="row">
    <!-- Article main content -->
    <article class="col-xs-12 maincontent">
      <header class="page-header">
        <h3 class="page-title">Photo Submit</h3>
      </header>
      <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 ">
        <div class="panel panel-default" style="margin-bottom: 100px;">
          <div class="panel-body">
            <!--  <h3 class="text-center text-danger">Photo Submission has been closed.</h3>-->
            <?php if(!empty($flash['info'])):?>
            <p class="text-center text-muted"><?php print $flash['info'];?></p>
            <hr>
            <?php endif;?>
            <?php if(!empty($flash['error'])):?>
            <p class="text-center text-danger"><?php print $flash['error'];?></p>
            <hr>
            <?php endif;?>
            <form method="post" action="/howcowhappened/submit" enctype="multipart/form-data" id="register-form" novalidate="novalidate">
              <div class="top-margin">
                <label  for="name">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" value="<?php print !empty($data['name']) ? $data['name'] : '';?>">
              </div>
              <div class="top-margin">
                <label  for="email">Email Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="email" value="<?php print !empty($data['email']) ? $data['email'] : '';?>">
              </div>
              <div class="top-margin">
                <label for="phone">Phone <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="phone" value="<?php print !empty($data['phone']) ? $data['phone'] : '';?>">
              </div>
              <div class="top-margin">
                <label for="submittype">I want to submit: </label>
                <br />
                <input type="radio" name="submittype" value="story" id="story"
				
<?php if(!empty($data['submittype']) && $data['submittype']=='story'){ echo 'checked="checked"';} ?> checked="checked"
				
				 />
                <strong>Story</strong> <br />
                <input type="radio" name="submittype" value="video" id="photovideo" 
<?php if(!empty($data['submittype']) && $data['submittype']=='video'){ echo 'checked="checked"';} ?>
				
				 />
                <strong>Photo/Video</strong> </div>
				
				
              <fieldset class="top-margin 
			  <?php 
			  if(isset($data['submittype'])){
			  
			  if( !empty($data['submittype']) && $data['submittype']=='story' ) { echo "showme";} 
			  else  {echo "displayhidden";} 
			  }
			  
			   ?>" id="story_area"  >
              <legend>Story details</legend>
			  
			  <div>
			  
			  
                <label for="storytitle">Story Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="storytitle" value="<?php print !empty($data['storytitle']) ? $data['storytitle'] : '';?>">
              </div>
			  
			  
			  
			  
              <div class="top-margin">
			  
			  
                <label for="story">Write your story<span class="text-danger">*</span></label>
               <!-- <input type="text" class="form-control" name="story" value="<?php print !empty($data['story']) ? $data['story'] : '';?>">-->
				
				
				<textarea class="form-control pull-right " name="story"><?php print !empty($data['story']) ? $data['story'] : '';?></textarea>
				
				
				
              </div>
              <div class="top-margin">
                <label>Story Photo (If you have any)</label>
                <input type="file" name="photo"  class="form-control" />
                <br>
                <em>file size: 50KB-1MB</em> </div>
              </fieldset>
			  
			  
			  
              <fieldset class="  <?php if(!empty($data['submittype']) && $data['submittype']=='video') { echo "showme";}else {echo "displayhidden";}   ?>" id="video_area"  >
              <legend>Photo/Video details</legend>
			  
			  
			  
			  <div >
                <label for="photo_video_title">Video / Photo Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="photo_video_title" value="<?php print !empty($data['photo_video_title']) ? $data['photo_video_title'] : '';?>">
              </div>
			  
			  
			  
			  
			  <div class="top-margin"  >
                <label for="photo_video_caption">Video / Photo caption<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="photo_video_caption" value="<?php print !empty($data['photo_video_caption']) ? $data['photo_video_caption'] : '';?>">
              </div>
			  
			  
			  
			  
              <div class="top-margin" >
                <label>What do you want to upload?<span class="text-danger">*</span></label>
                <br />
                <input type="radio" name="video_or_photo" value="vphoto" id="cvphoto"
				
				<?php if(!empty($data['video_or_photo']) && $data['video_or_photo']=='vphoto'){ echo 'checked="checked"';} ?> 
				  />
                <strong>Photo</strong>
                <input type="radio" name="video_or_photo" value="vvideo" id="cvvideo"
				
				<?php if(!empty($data['video_or_photo']) && $data['video_or_photo']=='vvideo'){ echo 'checked="checked"';} ?> 
				 />
                <strong>Video</strong> </div>
              <div class="top-margin <?php 
			  
			    if(isset($data['video_or_photo'])){
			  if(!empty($data['video_or_photo']) && $data['video_or_photo']=='vphoto') { echo "showme";}else {echo "displayhidden";} 
			  
			  }
			  
			    ?>" id="vphoto">
                <label for="photos">Select photo</label>
                <input type="file" name="photos" class="form-control" />
                <br>
                <em>File size: 50KB-1MB</em> </div>
              <div class="top-margin <?php if(!empty($data['video_or_photo']) && $data['video_or_photo']=='vvideo') { echo "showme";}else {echo "displayhidden";}   ?>" id="vvideo">
                <label>Enter your youtube video link <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="videolink" value="<?php print !empty($data['videolink']) ? $data['videolink'] : '';?>">
              </div>
              
              </fieldset>
              <hr>
              <div class="row">
                <div class="col-lg-8">&nbsp;</div>
                <div class="col-lg-4 text-right">
                  <button class="btn btn-action" type="submit" name="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </article>
    <!-- /Article -->
  </div>
</div>
