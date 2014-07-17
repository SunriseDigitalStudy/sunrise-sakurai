<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>学歴計算</title>
<link rel="stylesheet" href="style.css" type="text/css">
<style type="text/css">
	table {
		display: none;
		width: 500px;
	}

	td {
		padding: 5px;
		border: 1px solid #dbdbdb;
	}

	.e_c-error {
		color: red;
	}
</style>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jquery.educationCalculator.js"></script>

<script type="text/javascript">
//プラグイン呼び出し
$(function(){
	$(".calculate").click(function() {
		$("#calculator").educationCalculator();
	});
});

/*$(function(){
	$(".calculation").click(function() {
		$(".e_c-error").remove();
		//生年月日
		var birth1 = parseInt($("#e_c [name=birth1]").val());
		var birth2 = parseInt($("#e_c [name=birth2]").val());
		var birth3 = parseInt($("#e_c [name=birth3]").val());
		if ( !isNaN(birth1) && !isNaN(birth2) && !isNaN(birth3) ){
			educationCalculator(birth1, birth2, birth3);
			$(".educationBox").show();
		} else {
			$("#e_c").after('<p class="e_c-error">生年月日が入力されていません。</p>');
		}
	});
});

	function educationCalculator(birth1, birth2, birth3) {

		//生まれ年度
		var birth = birth1;
		if (birth2*100 + birth3 < 402) {
			birth = birth1 - 1;
		}

		//中学まで加算
		y = birth + 13;
		//加算して入力
		$(".education").each(function(){
			y = y + parseInt($(this).find(".addition").val());
			$(this).find(".AD").text(y);

			//和暦
			if(y > 1988) {
				jc = "平成"+(y-1988);
			} else {
				jc = "昭和"+(y-1925);
			}
			$(this).find(".jc").text(jc);
		});
	}
	*/
</script>
</head>
<body>
	<div id="calculator">
	<form id="e_c">
		<select name="birth1">
			<option value="">-</option>
			<?php
			$start_y = date("Y", strtotime("-17 year"));
			for($i = 1; $i <= 65; $i++) {
				$b1 = $start_y - $i;
				echo '<option value="'.$b1.'">'.$b1.'</option>';
			}
			?>
		</select>
		<select name="birth2">
			<option value="">-</option>
			<?php
			for($i = 1; $i <= 12; $i++) {
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
			?>
		</select>
		<select name="birth3">
			<option value="">-</option>
			<?php
			for($i = 1; $i <= 31; $i++) {
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
			?>
		</select>

		<div class="educationBox"></div>
		<!-- <table class="educationBox">
			<tr class="education">
				<td>
					<span class="AD"></span>年
				</td>
				<td>
					<span class="jc"></span>年
				</td>
				<td>
					4月
				</td>
				<td>
					中学入学
				</td>
				<td>
					<select name="addition1" class="addition">
						<option value="0" selected="selected">現役入学</option>
						<option value="1">浪人　1年</option>
						<option value="2">浪人　2年</option>
						<option value="3">浪人　3年</option>
						<option value="4">浪人　4年</option>
						<option value="5">浪人　5年</option>
					</select>
				</td>
			</tr>
			<tr class="education">
				<td>
					<span class="AD"></span>年
				</td>
				<td>
					<span class="jc"></span>年
				</td>
				<td>
					3月
				</td>
				<td>
					中学卒業
				</td>
				<td>
					<select name="addition2" class="addition">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3" selected="selected">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
					年間修業
				</td>
			</tr>
			<tr class="education">
				<td>
					<span class="AD"></span>年
				</td>
				<td>
					<span class="jc"></span>年
				</td>
				<td>
					4月
				</td>
				<td>
					高校入学
				</td>
				<td>
					<select name="addition3" class="addition">
						<option value="0" selected="selected">現役入学</option>
						<option value="1">浪人　1年</option>
						<option value="2">浪人　2年</option>
						<option value="3">浪人　3年</option>
						<option value="4">浪人　4年</option>
						<option value="5">浪人　5年</option>
					</select>
				</td>
			</tr>
			<tr class="education">
				<td>
					<span class="AD"></span>年
				</td>
				<td>
					<span class="jc"></span>年
				</td>
				<td>
					3月
				</td>
				<td>
					高校卒業
				</td>
				<td>
					<select name="addition4" class="addition">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3" selected="selected">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
					年間修業
				</td>
			</tr>
			<tr class="education">
				<td>
					<span class="AD"></span>年
				</td>
				<td>
					<span class="jc"></span>年
				</td>
				<td>
					4月
				</td>
				<td>
					大学/専門入学
				</td>
				<td>
					<select name="addition5" class="addition">
						<option value="0" selected="selected">現役入学</option>
						<option value="1">浪人　1年</option>
						<option value="2">浪人　2年</option>
						<option value="3">浪人　3年</option>
						<option value="4">浪人　4年</option>
						<option value="5">浪人　5年</option>
					</select>
				</td>
			</tr>
			<tr class="education">
				<td>
					<span class="AD"></span>年
				</td>
				<td>
					<span class="jc"></span>年
				</td>
				<td>
					3月
				</td>
				<td>
					大学/専門卒業
				</td>
				<td>
					<select name="addition6" class="addition">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4" selected="selected">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
					年間修業
				</td>
			</tr>
		</table> -->
				<input type="button" class="calculate" value="計算する">

	</form>
	</div>
</body>
</html>