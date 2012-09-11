(function($){
	//メイン画像を入れるdivなどで呼び出す
	$.widget('my.gallery',{
		options: {
			start_index : 1,//初めの画像（数字）
			total : 0,//全画像枚数（数字）
			path_format : 'images/sample%num%.jpg',//画像のパス
			speed : 500, //アニメーションのスピード
			play : 'PLAY',//自動再生のテキスト
			stop: 'STOP',
			playspeed : 3000 //自動再生のスピード
		},
		_create: function(){
			
			//各function内でも使えるようにthisに名前をつける
			var self = this;

			//スタートページを指定
			var index = self.options.start_index;

			//初期設定画像
			self.element.prepend('<img>');
			var target = self.element.children('img');
			
			//初期設定
			self.setGallery(index);
			
			//div#galleryの幅と高さ
			target.load(function(){
				self.element.width($(this).width());
			});
							
			//#gallery-listthumを自動で入れる
			var thum = 1;
			self.options.thumb_list.each(function(){
				$(this).data('thum',thum++);
			});

			self.options.thumb_list.bind('click.changeThumb', function() {
				index = $(this).data('thum');
				self.setGallery(index);
			});
						
			//トータルを取る
			var total = self.options.thumb_list.length || self.options.total;
			if(total == 0){
				throw 'You have to set total or thumb_list option.';
			}
			


			//next.prevで画像を切り替える
			self.options.next_button.bind('click.changeNext', function(){
				index = (index >= total ? 1 : index+1);
				self.setGallery(index);
			});
			self.options.prev_button.bind('click.changePrev', function(){
				index = (index == 1 ? total : index-1);
				self.setGallery(index);
			});

			//自動再生
			self.options.player.addClass('play');
			var timerId;
			self.options.player.bind('click.autoPlay', function(){
				if($(this).is('.play')){
					timerId = setInterval(function(){
						index = (index >= total ? 1 : index+1);
						self.setGallery(index);
					},self.options.playspeed);
					$(this).html(self.options.stop).removeClass('play').addClass('stop');
				} else if ($(this).is('.stop')){
					clearInterval(timerId);
					$(this).html(self.options.play).removeClass('stop').addClass('play')
				}
			});

		/*	self.options.player.toggle(
				function(){
					timerId = setInterval(function(){
						index = (index >= total ? 1 : index+1);
						self.setGallery(index);
					},self.options.playspeed);
					$(this).html(self.options.stop).removeClass('play').addClass('stop');
				},
				function(){
					clearInterval(timerId);
					$(this).html(self.options.play).removeClass('stop').addClass('play')
				}
			);*/
			
			//hoverすると文字表示
			self.element.hover(
				function(){
					$(this).append('<div class="text_box"></div>');
					self._trigger('setTextBox', null, {text_target:'.text_box',text_index:index});
				},
				function(){
					$('.text_box').remove();
				}
			);
		},
		//gallaryを切り替える関数
		setGallery: function(index) {
			var self = this;
			var target = self.element.children('img');
			
			//トータルを取る
			var total = self.options.total || self.options.thumb_list.length;
			if(total == 0){
				throw 'You have to set total or thumb_list option.';
			}
			var current_image = self.options.path_format.replace('%num%', index);
			target.stop(false, true).fadeOut(self.options.speed,function(){
				$(this)
				.data('index', index)
				.attr({
					"data-index": index,
					"src": current_image
				})
				if (index == $(this).data('index')){
					$(this).fadeIn(self.options.speed);
				}else{
					$(this).load(function(){
						$(this).fadeIn(self.options.speed);
					});
				}
				
			});
			self._trigger('onSetImage', null,{index:index, total:total});
			self.options.thumb_list.removeClass('select');
			self.options.thumb_list.eq(index-1).addClass('select');
		},
		destroy: function(){
			this.options.thumb_list.removeData('thum').removeClass('select').bind('click', function() { return false; });
			this.element.empty();
			this.options.next_button.unbind('click.changeNext');
			this.options.prev_button.unbind('click.changePrev');
			this.options.thumb_list.unbind('click.changeThumb');
			this.options.player.removeClass();
			this.options.player.unbind('click.autoPlay');
			$.Widget.prototype.destroy.call( this );
		}
	});

})(jQuery);
