jQuery(document).ready(function($) {
								
			
								
	$('#myButton').click(function() {
		$("#display1").fadeOut();
	  setTimeout(function() {
			$(".hidden-content").show(500)
		}, 500);			 
	});		
	

	$('input[name="submittype"]').bind('change',function(){
														 
	if($(this).val() == 'story'){  
	
	$('#story_area').show();
	$('#video_area').hide();
	
	} else { 
	$('#video_area').show();
	$('#story_area').hide();
	}
	
	
	
	 });
	
	
	$('input[name="video_or_photo"]').bind('change',function(){
														 
	
	if($(this).val() == 'vphoto'){  
	
	$('#vphoto').show();
	$('#vvideo').hide();
	
	} else { 
	$('#vvideo').show();
	$('#vphoto').hide();
	}

	 });
		

		


	$(".headroom").headroom({
		"tolerance": 20,
		"offset": 50,
		"classes": {
			"initial": "animated",
			"pinned": "slideDown",
			"unpinned": "slideUp"
		}
	});
});

function popupwindow(url, title, w, h) {
    var y = window.outerHeight / 2 + window.screenY - ( h / 2)
    var x = window.outerWidth / 2 + window.screenX - ( w / 2)
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + y + ', left=' + x);
}

(function($) {
  $(function() {
			
    $('.exec-like').on('click', function(e) {
										 
				 
										 
      e.preventDefault();
      var $el = $(this), id = $el.data('id');
      var old = $el.prev('.likebox').html();
      $.ajax({
        method: "POST",
        url: "/howcowhappened/setlike",
        data: { id : id }
      }).done(function(msg) {
        if(msg) {
          if(msg == '-1') {
            alert('You can only like an image once.');
          } else {
            $el.prev('.likebox').html(msg);
            alert('Thanks! Your like will published within a minute.');
          }
        }
      });
    });
  });
})(jQuery);



(function($,W,D)
{
	
	//alert('sdfsdfsd');
    var RegForm = {};

    RegForm.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
                rules: {
						name: "required",
						email:{required: true,email: true},
						phone:"required",
						//doc: { required: true }
						 submittype: { required: true },
						 
						 
						 
						storytitle: {
						required: "#story:checked"
						},
						
						 
						story: {
						required: "#story:checked"
						},
						
						
						photo_video_title: {
						required: "#photovideo:checked"
						},
						
						
						
						photo_video_caption: {
						required: "#photovideo:checked"
						},
						
						
						
						photos: { required: "#cvphoto:checked",
								required: "#photovideo:checked"
						
						},
						videolink: { required: "#cvvideo:checked",
								required: "#photovideo:checked"
						
						}
						
						
						
						

//photo_video_caption

                },
				
                messages: {
                     name: "Please enter your  name",
                    email: "Please enter a valid email",
					phone: "Please enter your phone",
			   storytitle: "Please enter your Story Title",
					story: "Please enter your Story",
		photo_video_title: "Please enter Photo/video Title",
	  photo_video_caption: "Please enter Photo/video caption",
	  			   photos: "Please Select your Photo"
					 
					 

                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        RegForm.UTIL.setupFormValidation();
    });

})(jQuery, window, document);






