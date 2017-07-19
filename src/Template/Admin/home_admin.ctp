<?= $this->Html->css('adminhome.css') ?>

<script>
var latnow;
var lngnow;
var spot_marker;
var spot_lat;
var spot_lng;

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
		if(spot_marker != null)spot_marker.setMap(null);
		placeMarkerAndPanTo(e.latLng, map);
	});
	
	//デフォルトマーカーを動的生成する関数
	function placeMarkerAndPanTo(latLngp, map) {
		spot_marker = new google.maps.Marker({
			position: latLngp,
			map: map
		});
		spot_lat = latLngp.lat();
		spot_lng = latLngp.lng();
		document.getElementById('newlat').value = spot_lat;
		document.getElementById('newlng').value = spot_lng;
	}
}



function initMap() {
	
	//位置情報取得
	pos = navigator.geolocation.getCurrentPosition(get_position);

}

</script>

<div id="wrapper">

	<div id="header">
		<h2>管理者ページ</h2>
		<div id="logout"><a href="login_admin">ログアウト</a></div>
	</div>
	
	<div id="left">
		<h3>販売ルート</h3>
		<div id="map">
			<div id="inner">位置情報を<br>取得中です</div>
		</div>
	</div>
	
	<div id="right">
		<h3>販売場所</h3>
		<div id="spotbox">
<?php
	foreach($spot as $data){
?>
			<div class="spot">
				<div class="spotname"><?=$data->name?></div>
				<div class="spottime"><?=$data->start->format("H:i")?>-<?=$data->end->format("H:i")?></div>
				<div class="spotdelete"><a href=<?="delete_spot?id=".$data->id?>>削除</a></div>
			</div>
<?php
}
?>
		</div>
		
		<h3>販売場所を追加</h3>

		<div id="newspot">
			<form action="create_spot" method="POST">
				<input id="newlat" type="hidden" name="latitude" value="">
				<input id="newlng" type="hidden" name="longtitude" value="">
				<input type="hidden" name="date" value="<?=date("Y/m/d")?>">
				<input type="hidden" name="deleted" value="0">
				<label>名前</label>
				<input type="text" name="name" size="10" width="10">
				<label>時間</label>
				<input class="newtime" type="text" name="start" size="10">
				<div id="kara">～</div>
				<input class="newtime"} type="text" name="end" size="10">
				<input type="submit" value="追加">
			</form>
		</div>
		<div id="newspot">
			<form action="create_coupon" method="POST">
				<input type="hidden" name="date" value="<?=date("Y/m/d")?>">
				<input type="hidden" name="expiration" value="<?=date("Y/m/d",strtotime('+1 day', time()))?>">
				<input type="submit" value="クーポン発行">
			</form>
		</div>		

	</div>
</div>

<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEgGGWLBTesRzqBTSy-60luer-BC0EP4c&callback=initMap">
</script>

