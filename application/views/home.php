				<div class="block block-center" id="enter_name">
          <!-- <form class="" action="http://dev.viiew.info/record" method="post" id="form-enter-name"> -->
          <?php echo form_open('http://dev.viiew.info/record', array('method'=>'post', 'id'=>'form-enter-name'))?>
            <h2 class="form-name-heading">Please enter your name</h2>
            <input type="text" class="input-block-level" placeholder="Your name" name="name" required>
            <input type="hidden" name="longitude" id="longitude" value="">
            <input type="hidden" name="latitude" id="latitude" value="">
            <input type="hidden" name="timezone" id="timezone" value="">
          </form>
          <button class="btn btn-large btn-primary" type="submit" name="enter" onclick="getLocation();">Show Location</button>
          <div id="status"></div>
          <hr>
          <div class="map-container">
          	<a href="http://maps.google.com"><img src="/misc/img/Gmap.png" class="map-icon img-rounded"></a>
          	<a href="http://mapofthedead.com"><img src="/misc/img/dmap.png" class="map-icon img-rounded"></a>
          	<a href="http://bing.com/maps"><img src="/misc/img/bmap.png" class="map-icon img-rounded"></a>
          </div>          
        </div>
        <div class="block block-center" id="help-block"> 
          <small class="text-info"><strong>This is used on the devices (mobile phones, tablets, laptops, ...) with HTML5 supported browsers. But sometime it may show your ISP position instead of your current position by chance.</strong></small>
        </div>
<!--	<div class="block block-center" id="share-block"> 
        	<div class="fb-like"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fviiew.info&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=157614327595460" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></div>
        	<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://viiew.info" data-via="your_screen_name" data-lang="en"></a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>        	
        	<script src="//platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="http://viiew.info"></script>
        	<div class="fb-share"><a name="fb_share" id="fb_share" target="popsome" type="button" share_url="http://viiew.info" href="http://www.facebook.com/sharer.php"></a><script id="loader" src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></div>
        </div>-->
        <div class="block block-center" id="info-block"> 
          <small>Created by <a href="mailto:phongvh50ca@gmail.com">Vũ Hồng Phong</a></small><br> 
          <small><strong>Copyright &copy; 2013.</strong></small>
        </div>
        <script src="/misc/js/jstz.min.js"></script>
        <script type="text/javascript">
        	var tz = jstz.determine();
//        	document.write(tz.name());
        	$("#timezone").val(tz.name);
				</script>
