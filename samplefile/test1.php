<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>clique*</title>
<meta name="keywords" content="clique,クリーク,イラスト,POOL,オリジナル">
<meta name="description" content="clique* イラストやサイト制作日記やオリジナルの小物のお店POOLなど">
<meta name="author" content="clique*">
<link rel="stylesheet" href="../css/reset.css" type="text/css">
<link rel="stylesheet" href="test.css" type="text/css">
<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="gallery.js"></script>
<script type="text/javascript">
$(function(){
	$('#gallery img').gallery({
		path_format : 'images/%num%.jpg',
		start_index : 2,
		//セレクターの指定はプラグインの外で行う（HTMLファイルを読み込む前にプラグインのスクリプトが動いてしまうため）
		thumb_list : $('#gallery-list li'),//サムネイルリスト
		next_button : $('#pager #next'),//pager
		prev_button : $('#pager #prev'),
		player : $('#player'),
		play : '<img src="images/play.jpg" alt="">',//自動再生のテキスト、画像指定
		stop: '<img src="images/stop.jpg" alt="">',
		speed : 300,
		onSetImage : function (event, data){
			$('#page-number').text(data.index + "/" + data.total);
		}
	});
});

</script>
</head>
<body>
	<div id="wraper">
		<div id="gallery"><img src="images/1.jpg" data-index="1"></div>
		<ul id="pager">
			<li id="prev">PREV</li>
			<li id="player" class="play"><img src="images/play.jpg" alt=""></li>
			<li id="next">NEXT</li>
		</ul>
		<p id="page-number"></p>
		<ul id="gallery-list">
			<li><img src="images/sample1_s.jpg" alt="" /></li>
			<li><img src="images/sample2_s.jpg" alt="" /></li>
			<li><img src="images/sample3_s.jpg" alt="" /></li>
			<li><img src="images/sample4_s.jpg" alt="" /></li>
			<li><img src="images/sample5_s.jpg" alt="" /></li>
		</ul>
	</div>
</body>
</html>