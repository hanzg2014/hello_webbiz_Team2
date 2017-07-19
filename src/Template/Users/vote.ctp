<?= $this->Html->css('vote.css') ?>

<script>
var latnow;
var lngnow;
var demand_marker;
var demand_lat;
var demand_lng;

function get_position(position){
	//現在位置取得
	latnow = position.coords.latitude;
	lngnow = position.coords.longitude;
	document.getElementById('latnow').value = latnow;
	document.getElementById('lngnow').value = lngnow;
	
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
		if(demand_marker != null)demand_marker.setMap(null);
		placeMarkerAndPanTo(e.latLng, map);
	});
	
	//デフォルトマーカーを動的生成する関数
	function placeMarkerAndPanTo(latLngp, map) {
		demand_marker = new google.maps.Marker({
			position: latLngp,
			map: map
		});
		demand_lat = latLngp.lat();
		demand_lng = latLngp.lng();
		document.getElementById('demandlat').value = demand_lat;
		document.getElementById('demandlng').value = demand_lng;
	}
}



function initMap() {
	
	//位置情報取得
	pos = navigator.geolocation.getCurrentPosition(get_position);

}

</script>

<div id="wrapper">

	<div id="header">
		<h2>呼び込み</h2>
		<div id="return">
			<a href='home'>もどる</a>
		</div>
	</div>
	<div id="left">
		<div id="map">
			<div id="inner">位置情報を<br>取得中です</div>
		</div>
	</div>
	
	<div id="right">
		<div class="submit">
			<form action="do_vote" method="POST">
				<input type="hidden" name="date" value="<?=date("Y/m/d")?>">
				<input type="hidden" name="foreign_id" value="<?=$id?>">
				<input id="demandlat" type="hidden" name="latitude" value="">
				<input id="demandlng" type="hidden" name="longtitude" value="">
				<button type="submit">地図上の<br>点で送信</button>
			</form>
		</div>
		<div class="submit">
			<form action="do_vote" method="POST">
				<input type="hidden" name="date" value="<?=date("Y/m/d")?>">
				<input type="hidden" name="foreign_id" value="<?=$id?>">
				<input id="latnow" type="hidden" name="latitude" value="">
				<input id="lngnow" type="hidden" name="longtitude" value="">
				<button type="submit">現在位置で<br>送信</button>
			</form>
		</div>
	</div>

</div>

<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEgGGWLBTesRzqBTSy-60luer-BC0EP4c&callback=initMap">
</script>

