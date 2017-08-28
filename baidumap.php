<?php
/**
 * Created by PhpStorm.
 * User: 贺鹏飞
 * Date: 2016/6/26
 * Time: 2:03
 */
$x = $_GET["x"];
$y = $_GET["y"];
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <style type="text/css">
        body, html, #allmap {
            width: 100%;
            height: 100%;
            overflow: hidden;
            margin: 0;
            font-family: "微软雅黑";
        }
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=1k7r23x2WaOxRrDpmV5ZHysyWv5C4Svl"></script>
    <title>根据起终点经纬度查询公交换乘</title>
</head>
<body>
<div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");            // 创建Map实例
    map.centerAndZoom(new BMap.Point(<?php echo $x ?>, <?php echo $y ?>), 12);
    var p2 = new BMap.Point(<?php echo $x ?>, <?php echo $y ?>);
    // 百度地图定位当前位置
    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function (r) {
        if (this.getStatus() == BMAP_STATUS_SUCCESS) {
            var p1 = new BMap.Point(r.point.lng, r.point.lat);
            var transit = new BMap.TransitRoute(map, {
                renderOptions: {map: map}
            });
            transit.search(p1, p2);
        } else {
            map.clearOverlays();
            var marker2 = new BMap.Marker(p2);  // 创建标注
            map.addOverlay(marker2);              // 将标注添加到地图中
            map.panTo(p2);
        }
    }, {enableHighAccuracy: true})

</script>