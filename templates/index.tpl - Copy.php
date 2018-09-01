<!-- Header -->
<header> 
<div class="container highlight">
 <div class="row"> 
      <div class="col-sm-12 text-right margin-bottom20">
       <a href="http://www.thedailystar.net/"><img class="site-logo" src="/howcowhappened/assets/images/tds-black.png" alt="The Daily Star" width="300"></a> 
      </div>

  </div>
</div>

 
</header>
<!-- /Header -->

<div class="container ">
 

    <div class="row">
      <div class="col-sm-6 text-center">
        <p><img  src="/howcowhappened/assets/images/how-cow-header.png" alt="how-cow-happend" width="400" class="img-rounded text-center"></p>
        <p class="text-center top-space"><a href="/howcowhappened/posts"><img  src="/howcowhappened/assets/images/button.png" alt="Enter" width="250" class="text-center"></a></p>
   
      </div>
      
      
      <div class="col-sm-6 ">
      
      <div id="display1" >
      <h2 class="thin top-space">You think you have lot to share and tell ?</h2>

      <h3 class="text-center text-muted thin">Great! Here are a few things you should know to submit your funny stories, images and videos about cows to HowCowHappened</h3>
      <p class="text-center top-space"><a class="btn btn-primary btn-large" id="myButton">LEARN MORE »</a></p>
      </div>
      
       <div id="display2"  class="marginbottom-big hidden-content display2">
       
        <h2 class="thin">You think you have lot to share and tell ? </h2>
<p>Great! Here are a few things you should know to submit your funny stories, images and videos about cows to HowCowHappened</p>

<h3>How:</h3>
<p>To participate in this campaign/contest all you need to do is taking  stories while meeting your long lost friend & submit it along with caption into our dedicated webpage (http://www.thedailystar.net/howcowhappened/)  by using the “Submit your photo” button. You may also submit short description regarding your friendship story along with the photo within 100 words. </p>

<h3>Terms and conditions:</h3>
<ol>
 
<li>Please be sure to read the following before submitting your photo at http://www.thedailystar.net/howcowhappened/
<li>This Contest as celebrating How Cow Happened-Tagline is organised by The Daily Star and these Terms & Conditions shall apply to all stages of the Contest.</li>
<li>By posting or submitting your photo to http://www.thedailystar.net/howcowhappened/, you represent that you own or otherwise control all of the rights to your submission.</li>
<li>By submitting this photo you agree that its content does not infringe copyrights or other property rights of any party. You also agree that the photo you are submitting is your own.</li>
<li>All photos submitted to http://www.thedailystar.net/howcowhappened/ become the property of The Daily Star. The Daily Star may reproduce, distribute, publish, display, edit, modify, create derivative works from and otherwise use the material for any purpose, in any form, and on any media.</li>
<li>The Contest duration is from 1st August, 2016 to 9th August, 2016.</li>
<li>Only the winners of the Contest (“Prize Winner”) will be notified.</li>
<li>The Organiser reserves the right to substitute the prize(s) offered. The Organiser’s sole responsibility to a Prize Winner is to arrange for the Prize Winner’s collection of the prize.</li>
<li>All Prize Winner(s) unconditionally agree (as a condition of accepting any prize) to: a. participate in all reasonable publicity relating to the Contest (including but not limited to media coverage); and b. grant the Organiser the right to use his/her name and/or photo in the Organiser’s marketing and promotional materials.</li>
<li>In the event that for any reason whatsoever, the Prize Winner does not claim the prize at the time stipulated by the Organiser, the prize will be forfeited. Unclaimed prizes will be forfeited at the discretion of the Organiser. The prize has no cash value and cannot be refunded; cash will not be awarded in lieu of the prize.</li>
<li>The prize is non-transferable.</li>
<li>The Organiser shall not be liable for any claims, losses, damages, injuries, costs and expenses suffered, sustained or incurred (including, but not limited to, indirect, consequential loss including death) or costs incurred due to unforeseen circumstances as a result of, or arising out of, or in any way connected with this Contest.</li>
 
</ol>
       
       </div>
      

      </div>
      
      
      
      
    </div>
  

</div>
 
 

  <div class="container">
    
    <div class="row">

      <?php foreach($items as $item):?>
        <div class="col-md-3 col-sm-6 highlight">
          <div class="box-border ">
            <a href="/friendshipday/details/<?php print $item['id'];?>">
              <img src="/friendshipday/images/thumb/<?php print $item['image'];?>" alt="" class="img-rounded">
            </a>
            <div class="h-body text-left box-cont-pad content-bg">
              <div class="h-caption">
                <h4><a href="/friendshipday/details/<?php print $item['id'];?>"><?php print $item['photo_title'];?></a></h4>
              </div>
              <p><?php print substr($item['caption'], 0, 220);?>...</p>
              <div class="margin-bottom-zero">
                <div class="social pad-all-small">
                   <span class="likebox"><?php print $item['like'];?></span>
                   <a href="#" class="exec-like" data-id="<?php print $item['id'];?>"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="like">Like</span></a>
                   
                  <a href="https://twitter.com/home?status=http://www.thedailystar.net/friendshipday/details/<?php print $item['id'];?>" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;" >
                    <i class="fa fa-twitter twitter-icon" ></i>
                  </a> &nbsp; 
                  <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.thedailystar.net/friendshipday/details/<?php print $item['id'];?>" onClick="javascript: popupwindow(this.href, '', 600, 600);return false;" >
                    <i class="fa fa-facebook facebook-icon" ></i>
                  </a> &nbsp;
                  <a href="https://plus.google.com/share?url=http://www.thedailystar.net/friendshipday/details/<?php print $item['id'];?>" onclick="javascript: popupwindow(this.href, '', 600, 600);return false;">
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
 
