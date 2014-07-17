/* --------------------
educationCalculator
---------------------*/

(function($){

	$.fn.educationCalculator = function(options){
		var self = this;
		// default値
		var settings = $.extend({
			start_education : 2, // スタート学年　1=小学校 2=中学校 3=高校
			generate_table : true, // tableで自動生成 自分で自由に作りたい時はfalseと下dataオプションを記入
			data_box : $(".educationBox"), // 学歴表を入れる場所
			data_column : $(".education"), // 学歴各列の場所
			data_AD : $(".AD"), // 西暦を入れる場所
			data_JC : $(".jc"), // 和暦を入れる場所
			data_addition : $(".addition") // 加算するselect
		}, options);

		var box = settings.data_box,
			column = settings.data_column,
			AD = settings.data_AD,
			JC = settings.data_JC,
			addition = settings.data_addition;

		// 一回目の計算
		var first_time = true;
		
		// スタート年齢
		var strat_age;
		switch(settings.start_education){
			case 1:
				strat_age = 7;
				break;
			case 2:
				start_age = 13;
				break;
			case 3:
				start_age = 16;
				break;
			default:
				start_age = 13;
				break;
		}

		// エラー削除
		$(".e_c-error").remove();

		//生年月日
		var birth1 = parseInt(self.find("[name=birth1]").val());
		var birth2 = parseInt(self.find("[name=birth2]").val());
		var birth3 = parseInt(self.find("[name=birth3]").val());

		if ( !isNaN(birth1) && !isNaN(birth2) && !isNaN(birth3) ){
			// 初回だったら
			if(first_time == true){
				if(settings.generate_table == true) {
					box.generate_table(settings.start_education);					
				}
				box.addClass("active");
			}
			e_c(birth1, birth2, birth3, strat_age, column, addition, AD, JC);
		} else {
			self.after('<p class="e_c-error">生年月日が入力されていません。</p>');
		}

		return this;
	}

	function e_c(birth1, birth2, birth3, strat_age, column, addition, AD, JC) {

		//生まれ年度
		var birth = birth1;
		if (birth2*100 + birth3 < 402) {
			birth = birth1 - 1;
		}

		//中学まで加算
		y = birth + strat_age;
		//加算して入力
		column.each(function(){
			y = y + parseInt($(this).find(addition).val());

			$(this).find(AD).text(y);
			//和暦
			if(y > 1988) {
				jc = "平成"+(y-1988);
			} else {
				jc = "昭和"+(y-1925);
			}
			$(this).find(JC).text(jc);

		});
	}

	function generate_table(i){
		var target = $(this);
		target.append("<table></table>");
		//テーブルの中身を組み立てて挿入する
		if (i == 1) {

		}
	}

})(jQuery);