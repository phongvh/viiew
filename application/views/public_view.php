				<div class="view content" width="" height=""><a href="/"><i class="icon-home"></i> Home</a>
          
            <h2>Location Viewer</h2>
            <h5><span class='text-info'><?php echo $record['name']; ?></span> was here at the time <span class='text-warning'><?php date_default_timezone_set($record['timezone']); echo date("D M j G:i:s T Y", $record['time']); ?></span>.</h5>
          
          <div id="text-status" class="alert-success">Latitude: <?php echo $record['latitude']; ?></br>Longitude: <?php echo $record['longitude'];?></div>
          
          <hr>
          <div class="row-fluid" id="show-me">
            <div class="btn-group span4" data-toggle="buttons-checkbox">
              <button type="button" class="btn span12" id="button-showme">Show me on the map</button>
            </div>
            <div id="status" class="span8"></div>
          </div>
  				<input type="hidden" name="longitude" id="longitude" value="">
          <input type="hidden" name="latitude" id="latitude" value="">
          <div id="mapholder" class="mapholder" style="height:400px;"></div>
          
        </div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript">
      lat = <?php echo $record["latitude"]; ?>;
      lon = <?php echo $record["longitude"]; ?>;
      latlon=new google.maps.LatLng(lat, lon);
      mapholder=document.getElementById('mapholder');
      
      var myOptions={
        center:latlon,
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP,
        //mapTypeControl:false,
        //navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
      };
      var map=new google.maps.Map(mapholder,myOptions);
      var marker=new google.maps.Marker({position:latlon,icon:'/misc/img/pinkball.png',title:"<?php echo $record["name"]; ?> was here!"});
      marker.setMap(map);
      
      function showMe(position){
	  		newlng = position.coords.longitude;
	  		newlat = position.coords.latitude;
	  		$("#longitude").val(newlng);
	  		$("#latitude").val(newlat);
	  		
	  		//$("#status").html("<div id='text-status-mini' class='alert'><span style='margin-right:12px'>Latitude: "+ newlat +"</span><span> Longitude: "+ newlng +"</span></div>");
	  		newlatlon = new google.maps.LatLng(newlat, newlng);
        var newmarker = new google.maps.Marker({position:newlatlon,animation:google.maps.Animation.BOUNCE,title:"You are here!"});
        newmarker.setMap(map);
        var myTrip=[latlon, newlatlon];
        var flightPath=new google.maps.Polyline({
          path:myTrip,
          strokeColor:"red",
          strokeOpacity:0.8,
          strokeWeight:2,
          editable: false
          });

        flightPath.setMap(map);
        
        $.ajax({
          type: 'POST',
          url: '/record/showme',
          dataType: 'json',
          data: {lng:newlng, lat:newlat, rid:<?php echo $record["id"]; ?>},
          cache: false,
          success: function (data) {            
          },
          error: function(XMLHttpRequest, textStatus, errorThrown){}
        });
	  	}
    </script>
