var x=document.getElementById("status");

$("#form-enter-name").submit(function(e){
    if($("#form-enter-name input[name=longitude]").val() === ""){
      e.preventDefault();
      $("button.btn-primary").click();

      return false;
    }else return true;
  });
  
$("#button-showme").click(function(e){
	if($(this).hasClass('active')) {
		
	}else{
		if (navigator.geolocation)
	    {	    
			navigator.geolocation.getCurrentPosition(showMe,showError);
			$(this).addClass('disabled');
	    }
    	else{x.innerHTML="<div id='text-status-mini' class='alert-error'>Geolocation is not supported by this browser.</div>";}
	}
});

function getLocation(e)
  {
    if($.trim($("input[name=name]").val()) == "") {
     x.innerHTML="<div id='text-status' class='alert-error'><span class='text-error'>Please enter your name.</span></div>";
      return false;
    }else if($("input[name=name]").val() == "<3iloveyou<3" || $("input[name=name]").val() == "iloveyou"){
    	x.innerHTML="<div id='text-status' class='alert-success'><span class='text-success'>I love you, too! :)</span></div>";
        return false;
    }else if($("input[name=name]").val() == "admin"){
    	x.innerHTML="<div id='text-status' class='alert-error'><span class='text-error'>You are not an admin. Stop fooling me!</span></div>";
        return false;
    }else if($.trim($("input[name=name]").val()).length == 1){
    	x.innerHTML="<div id='text-status' class='alert-error'><span class='text-error'>Your name is too short. You must be a lazy guy.</span></div>";
        return false;
    }
    else{
    	if (navigator.geolocation)
	    {
	      //alert("It requires you to share your location. Press 'Share Location' or 'Allow' to continue.");
	    navigator.geolocation.getCurrentPosition(showPosition,showError);
	    x.innerHTML="<div id='text-status' class='alert-info'><span class='text'>Please share your location!</span></div>";
	    }
    	else{x.innerHTML="<div id='text-status' class='alert-error'>Geolocation is not supported by this browser.</div>";}
    }
  }
function showPosition(position)
  {
  $("#longitude").val(position.coords.longitude);
  $("#latitude").val(position.coords.latitude);
  x.innerHTML="<div id='text-status' class='alert-success'>Let's go!</div>";
  /*
  x.innerHTML="Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;	
  //*/

  $("#form-enter-name").submit();
  }
  
function showError(error)
  {
  switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="<div id='text-status' class='alert-error'>User denied the request for Geolocation.</div>"
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="<div id='text-status' class='alert-error'>Location information is unavailable.</div>"
      break;
    case error.TIMEOUT:
      x.innerHTML="<div id='text-status' class='alert-error'>The request to get user location timed out.</div>"
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="<div id='text-status' class='alert-error'>An unknown error occurred.</div>"
      break;
    }
  }

  function isExact(id){
    $.ajax({
    type: 'POST',
    url: '/record/feedback',
    dataType: 'json',
    data: {code:id, answer:'yes', q:1},
    cache: false,
    success: function (data) {
      replace = "<div class='info text-error'><small></small><div class='input-append question'><input type='text' placeholder='What function would you like to have or suggest me to make?' id='user_position' class='span5'> <button class='btn btn-primary' onclick=\"savePosition(\'"+id+"\')\">Save</button></div></div>";
      $("#question").html(replace);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown){
    }
  });
  }

  function notExact(id){
    $.ajax({
    type: 'POST',
    url: '/record/feedback',
    dataType: 'json',
    data: {code:id, answer:'no', q:1},
    cache: false,
    success: function (data) {
      replace = "<div class='info text-error'><small></small><div class='input-append question'><input type='text' placeholder='Which device do you use?' id='user_position'> <button class='btn btn-primary' onclick=\"savePosition(\'"+id+"\')\">Save</button></div></div>";
      $("#question").html(replace);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown){
    }
  });
  }

  function savePosition(id){
    answer = $('#user_position').val();
    $.ajax({
      type: 'POST',
      url: '/record/feedback',
      dataType: 'json',
      data: {code:id, answer:answer, q:2},
      cache: false,
      success: function (data) {
        replace = "<div class='info text-error'><small>Thank you!</small></div>";
        $("#question").html(replace);
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
      }
    });
  }

  function share_link(){
    replace = "<input type='text' selected value='http://"+$("#share-link").html()+"'>";
    
    $("#share-link").html(replace);
    $("#share-link").removeClass('share-link');
  }

  function selectText(element) {
    var doc = document
        , text = doc.getElementById(element)
        , range, selection
    ;    
    if (doc.body.createTextRange) { //ms
        range = doc.body.createTextRange();
        range.moveToElementText(text);
        range.select();
    } else if (window.getSelection) { //all others
        selection = window.getSelection();        
        range = doc.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
    }
}
  
