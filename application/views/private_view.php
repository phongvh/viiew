<div class="view content"><a href="/"><i class="icon-home"></i> Home</a>
  
    <h2>Hello <?php echo $record["name"]; ?>!</h2>
    <h5>Here was your position at <?php date_default_timezone_set($record['timezone']); echo date("h:ia - l, F d, Y", $record['time']); ?>.</h5>
  <div class=''><blockquote><i class="icon-envelope"></i> Share this link: <strong class="text-error" id="share-link" onclick="selectText('share-link')">
   <a href="<?php echo "http://".$_SERVER['SERVER_NAME']."/".$record['longid'];?>"><?php echo "http://".$_SERVER['SERVER_NAME']."/".$record['longid'];?></a></strong></br>
    <small class=""><i class="icon-hand-right"></i> with your friends and let them know where you were at that moment!</small></blockquote></div>
<!--	<div class="fb-like"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fviiew.info&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=157614327595460" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></div>
    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo "http://".$_SERVER['SERVER_NAME']."/".$record['longid'];?>" data-via="your_screen_name" data-lang="en"></a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>    
    <script src="//platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="<?php echo "http://".$_SERVER['SERVER_NAME']."/".$record['longid'];?>"></script>
    <div class="fb-share"><a name="fb_share" id="fb_share" target="popsome" type="button" share_url="<?php echo "http://".$_SERVER['SERVER_NAME']."/".$record['longid'];?>" href="http://www.facebook.com/sharer.php"></a><script id="loader" src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></div>-->
  <div id="text-status" class="alert-success">Latitude: <?php echo $record['latitude']; ?></br>Longitude: <?php echo $record['longitude'];?></div>
  
  <hr>
  <div id="mapholder" class="mapholder"></div>
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">			

  lat = <?php echo $record["latitude"]; ?>;
  lon = <?php echo $record["longitude"]; ?>;
  latlon=new google.maps.LatLng(lat, lon);
  mapholder=document.getElementById('mapholder');

  mapholder.style.height='400px';

  var myOptions={
  center:latlon,zoom:16,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  //mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
	
</script>
