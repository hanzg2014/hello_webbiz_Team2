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

	//mapのオプション
	var opts = {
		zoom: 14,
		center: latlng
	};
	
	//HTML上に配置するmapオブジェクト
	var map = new google.maps.Map(document.getElementById("map"), opts);
	
	//imgフォルダからのiconオブジェクト
	var star = new google.maps.MarkerImage('/webbiz/img/star.png',
	new google.maps.Size(100,100),
	new google.maps.Point(0,0), 
	new google.maps.Point(10,10)
	);
	
	var bus = new google.maps.MarkerImage('/webbiz/img/bus.png',
	new google.maps.Size(100,100),
	new google.maps.Point(0,0), 
	new google.maps.Point(10,10)
	);
	
	//地図上に配置するmarkerオブジェクトとその配置
	var starOptions = {
	position: latlng,
	draggable:true,
	map: map,
	icon: star
	};	
	var marker = new google.maps.Marker(starOptions);
	
	//地図上に配置するwindowオブジェクトの生成と配置
	var infowindow = new google.maps.InfoWindow({
    content: 'あいうえお'
  });
	infowindow.open(map,marker);
	
	//地図上に配置するポリグラフオブジェクトとその配置
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