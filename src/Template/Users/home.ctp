<?= $this->Html->css('userhome.css') ?>

<script>
var latnow;
var lngnow;

function get_position(position){
	//現在位置取得
	latnow = position.coords.latitude;
	lngnow = position.coords.longitude;
	//{35.7146605863123,139.76285376781624}
	
	//必要な座標を変数に格納
	var latlng = new google.maps.LatLng(latnow,lngnow);

	var latlng_m = new google.maps.LatLng(latnow+0.01,lngnow+0.01);

	//HTML上に配置するmapオブジェクト
	var opts = {
		zoom: 14,
		center: latlng
	};
	var map = new google.maps.Map(document.getElementById("map"), opts);
	
	//imgフォルダからのiconオブジェクト
	var star = new google.maps.MarkerImage('/webbiz/img/star.png',
	new google.maps.Size(15,15),
	new google.maps.Point(0,0), 
	new google.maps.Point(10,10)
	);
	
	var bus = new google.maps.MarkerImage('/webbiz/img/bus.png',
	new google.maps.Size(15,15),
	new google.maps.Point(0,0), 
	new google.maps.Point(10,10)
	);
<?php
	foreach($spot as $data){
?>	
	var busOptions = {
	position: new google.maps.LatLng(<?=$data->latitude?>,<?=$data->longtitude?>),
	draggable:false,
	map: map,
	icon: bus
	};	
	var marker = new google.maps.Marker(busOptions);
	
	//markerに対応するwindowオブジェクトの生成と配置
	var infowindow = new google.maps.InfoWindow({
    content: <?="'".$data->name."<br>".$data->start->format("H:i")."'"?>
  });
	infowindow.open(map,marker);

<?php
	}
	foreach($demand as $data){
?>	
	//地図上に配置するmarkerオブジェクトとその配置
	var starOptions = {
	position: new google.maps.LatLng(<?=$data->latitude?>,<?=$data->longtitude?>),
	draggable:false,
	map: map,
	icon: star
	};	
	var marker = new google.maps.Marker(starOptions);

<?php
	}
?>	
	
	//地図上に配置するポリグラフオブジェクトとその配置
	var path = [
<?php
	foreach($spot as $data){
?>
		new google.maps.LatLng(<?=$data->latitude?>,<?=$data->longtitude?>),
<?php
	}
?>
	];
	var flightPath = new google.maps.Polyline({
		path: path, 
		strokeColor: '#000000',
		strokeOpacity: 1.0,
		strokeWeight: 2
	});
	flightPath.setMap(map);
	
	//地図上でクリックしたときの関数を指定
	map.addListener('click', function(e) {
		placeMarkerAndPanTo(e.latLng, map);
	});
	
	//デフォルトマーカーを動的生成する関数
	function placeMarkerAndPanTo(latLngp, map) {
		var marker = new google.maps.Marker({
			position: latLngp,
			map: map
		});
		map.panTo(latLng);
	}
//	alert(marker.getPosition());
}

function initMap() {
	
	//位置情報取得
	pos = navigator.geolocation.getCurrentPosition(get_position);

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
<?php
	foreach($coupon as $data){
?>
			<div class="news">
				<div class="newsdate">
					<?=$data->date->format('Y/m/d')?>
				</div>
				<div class="newscontent">
					<?=$data->money?>％割引券がプレゼントされました！
				</div>
			</div>
<?php
}
?>
		</div>
		
		<h3>COUPON</h3>
		<div id="couponbox">
<?php
	foreach($coupon as $data){
?>
			<div class="coupon">
				<div class="coupondate">
					～<?=$data->date->format('Y/m/d')?>
				</div>
				<div class="couponcontent">
					<a href=<?="coupon?id=".$data->id?>>全品<?=$data->money?>％割引クーポン</a>
				</div>
			</div>
<?php
}
?>
		</div>
	</div>		
</div>

<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEgGGWLBTesRzqBTSy-60luer-BC0EP4c&callback=initMap">
</script>

