<?= $this->Html->css('userhome.css') ?>

<script type="text/javascript">

var latnow;
var lngnow;

function get_position(position){
	latnow = position.coords.latitude;
	lngnow = position.coords.longitude;
	alert(latnow);
}

function initMap() {
	
	pos = navigator.geolocation.getCurrentPosition(get_position);
	
	var latlng = new google.maps.LatLng(35.709984,139.810703);
	var latlng_m = new google.maps.LatLng(35.711000,139.811000);

	var opts = {
		zoom: 15,
		center: latlng
	};
	
	var map = new google.maps.Map(document.getElementById("map"), opts);
	
	var icon = new google.maps.MarkerImage('/webbiz/img/icon.png',
    new google.maps.Size(50,60),
    new google.maps.Point(0,0),  
    new google.maps.Point(15,50)
	);
	var markerOptions = {
    position: latlng,
	draggable:true,
    map: map,
    icon: icon
  };
	var marker = new google.maps.Marker(markerOptions);
	
	var infowindow = new google.maps.InfoWindow({
    content: 'マーカー'
  });
	infowindow.open(map,marker);
	
	var path = [
		latlng,
		latlng_m
	];
	
	var flightPath = new google.maps.Polyline({
		path: path, 
		strokeColor: '#000000',
		strokeOpacity: 1.0,
		strokeWeight: 4
	});
	
	flightPath.setMap(map);
	
	
	map.addListener('click', function(e) {
		placeMarkerAndPanTo(e.latLng, map);
	});
	
	function placeMarkerAndPanTo(latLngp, map) {
		var marker = new google.maps.Marker({
			position: latLngp,
			map: map
		});
		map.panTo(latLng);
	}
	alert(marker.getPosition());
}
</script>

<div id="wrapper">

	<div id="header">
		<h2><?= $name ?>さんのマイページ </h2>
		<div id="logout"><a href="logout">ログアウト</a></div>
	</div>
	
	<div id="left">
		<h3>販売ルート</h3>
		<div id="map"></div>
		<div id="vote"><a href="vote">来てほしい！</a></div>
	</div>
	
	<div id="right">
		<h3>NEWS</h3>
		<div id="newsbox">
			<div class="news">
				<div class="newsdate">2017/2/8</div>
				<div class="newscontent">●●を通ることになりました！</div>
			</div>
			<div class="news">
				<div class="newsdate">2017/2/8</div>
				<div class="newscontent">●●を通ることになりました！</div>
			</div>
			<div class="news">
				<div class="newsdate">2017/2/8</div>
				<div class="newscontent">●●を通ることになりました！</div>
			</div>
			<div class="news">
				<div class="newsdate">2017/2/8</div>
				<div class="newscontent">●●を通ることになりました！</div>
			</div>
		</div>
		
		<h3>COUPON</h3>
		<div id="couponbox">
			<div class="coupon">
				<div class="coupondate">～2017/8/30</div>
				<div class="couponcontent">
					<a href="coupon">10％割引券</a>
				</div>
			</div>
			<div class="coupon">
				<div class="coupondate">～2017/8/30</div>
					<a href="coupon">10％割引券</a>
				</div>
			</div>
		</div>
	</div>
	
		
</div>

<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEgGGWLBTesRzqBTSy-60luer-BC0EP4c&callback=initMap">
</script>

