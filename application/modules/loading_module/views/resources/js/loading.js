/**
 * Created by UAB "Interneto Partneris".
 * User: Vytenis
 * Date: 13.2.4
 * Time: 10.36
 * © 2013
 */
;
/**
 * Waiting screen script
 */
(function() {
	window.Loading = function() {

		/**
		 * Default options
		 * @type {{debug: boolean, init: boolean, selectors: {content: string, progress: string, messages: string, progressBarContainer: string, progressBar: string, progressBarMessage: string}, dom: {content: {}, progress: {}, messages: {}, progressBarContainer: {}, progressBar: {}, progressBarMessage: {}}, fancybox: {content: string, scrolling: string, modal: boolean, autoSize: boolean, type: string, beforeLoad: Function, afterShow: Function}}}
		 */
		this.options = {
			debug        : true,
			init         : false,
			messageSpeed : 'fast',   // 'fast' | 'slow' | 0 - no animation
			selectors : {
				content              : '.loading_module',
				progress             : '.progress_bar',
				messages             : '.messages',
				progressBarContainer : '.progress_bar',
				progressBar          : '.progress',
				progressBarMessage   : '.progress_text'
			},
			dom : {
				content              : {},
				progress             : {},
				messages             : {},
				progressBarContainer : {},
				progressBar          : {},
				progressBarMessage   : {}
			},
			fancybox  : {
				content    : '',
				scrolling  : 'no',
				modal      : true,
				autoSize   : false,
				type       : 'inline',
				beforeLoad : function() {
					this.width = 700;
					this.height = 200;
				},
				afterShow  : function() {}
			},
			progress : {
				init : false,
				size : 0,
				type : 'swing',    // 'swing' | 'linear'
				template :
					'<div class="progress_bar box-black pos-r bg-w t-l">' +
						'<div class="progress bg-s" style="width:0"></div>' +
						'<div class="fill t-c progress_text"><!-- progress text --></div>' +
					'</div>',
				onCompleteFunc : function(){}
			}
		};
		this.progress = {};

		this.init = function( selector ) {
			var self = this;
			this.debug( 'this.init' );

			// waiting screen selector
			if ( typeof selector !== 'undefined' ) {
				this.options.selectors.content = selector;
			}
			// Constrain dom elements

			this.options.dom.content        = $( this.options.selectors.content );
			this.options.fancybox.content   = this.options.dom.content.html();
			this.options.fancybox.afterShow = function() {

				// Then the fancy box appear - reassign objects to the copied content "this.inner"
				self.options.dom.content  = this.inner.find( self.options.selectors.messages );
				self.options.dom.progress = this.inner.find( self.options.selectors.progress );
				self.options.dom.messages = this.inner.find( self.options.selectors.messages );
				self.options.dom.progressBarContainer = this.inner.find( self.options.selectors.progressBarContainer );
				self.options.dom.progressBar = this.inner.find( self.options.selectors.progressBar );
				self.options.dom.progressBarMessage = this.inner.find( self.options.selectors.progressBarMessage );

				self.progress_init();
				self.slide_messages();

			};

			return this;
		};

		this.start = function() {
			this.debug( 'this.start()' );

			$.fancybox(
				this.options.fancybox
			);
			return this;
		};

		this.close = function() {
			this.debug( 'this.close()' );

			$.fancybox.close();
			return this;
		};

		/**
		 * Alias for this.start()
		 * @return {*}
		 */
		this.open = function() {
			this.options.progress.size = 100;
			this.progress_finish();
			return this.start();
		};

		this.slide_messages = function() {
			this.debug( 'this.slide_messages', this.options.dom.messages );

			var
				$list = this.options.dom.messages.children(),
				self  = this
			;
			$( ':first', $list ).show();
			$list.not( ':first' ).hide();

			var
				$first_li = $list.eq( 0 ),
				$second_li = $list.eq( 1 )
			;

			if ( this.options.progress.size < 100 ) {
				$first_li.fadeOut( self.options.messageSpeed, function() {
					$second_li.fadeIn( self.options.messageSpeed, function() {
						$first_li.remove().appendTo( self.options.dom.messages );

						self.progress_increase( ( 100 / ( $list.size() -1 ) ), parseInt( $second_li.attr( 'rel' ) ) );
					} );

				} );
			}
		};

		/**
		 * Debug the messages
		 */
		this.debug = function() {
			if ( this.options.debug ) {
				console.debug( arguments );
			}
		};

		/**
		 * Progress bar functionality
		 * @type {Function}
		 */
		this.progress_init = function(){
			this.debug('this.progress_init');
			this.progress_stop();

			this.options.dom.progressBarContainer.html( this.options.progress.template.replace( '<!-- progress text -->', this.options.dom.progressBarContainer.html()));

			this.options.progress.init = true;
			return this;
		};

		this.progress_increase = function( val, animate, increase ) {

			var self  = this;
			this.debug('this.progress_increase', val, animate );

			if ( increase === void 0 ) {
				this.options.progress.size += val;
			} else {
				this.options.progress.size = val;
			}

			if ( this.options.progress.size > 100 ) {
				this.options.progress.size = 100;
			}
			this.options.dom.progressBar = this.options.dom.progressBarContainer.find( this.options.selectors.progressBar );
			this.options.dom.progressBarMessage = this.options.dom.progressBarContainer.find( this.options.selectors.progressBarMessage );

			this.options.dom.progressBar.animate(
				{width : self.options.progress.size + '%'},
				{
					duration: animate,
					easing : self.options.progress.type,
//					queue: false,
					step: function( now, fx ) {
						//$text.text(Math.floor( now ) + "%");
						self.options.dom.progressBarMessage.text( now.toFixed(2) + " %");
					},
					complete : function(){
						self.progress_check();
						if ( increase === void 0 ) {
							self.slide_messages();
						}
					}
				}
			);

			return this;
		};

		/**
		* Check if progress bar is not 100%
		* if so - fire the onComplete event
		*/
		this.progress_check = function() {
			this.debug('this.progress_check');
			if ( Math.round( this.options.progress.size ) == 100 && this.options.progress.onCompleteFunc !== null ) {
				this.progress_finish();
				this.options.progress.onCompleteFunc();
			}
		};

		this.progress_finish = function(){
			if ( this.options.progress.init ) {

				this.debug('this.progress_finish');

				this.options.dom.progressBar.clearQueue();
				this.options.dom.progressBar.stop();
//				this.progress_increase( 100, 500, false );
				this.close();
			}
			return this;
		};

		this.progress_stop = function(){
			this.options.dom.progressBar.clearQueue();
			this.options.dom.progressBar.stop();
			this.progress_increase( 0, 0, false );
			return this;
		};

		/**
		 * Fire the event on finish
		 * @param func
		 * @return {*}
		 */
		this.onComplete = function( func ) {
			this.debug( 'this.progress_onComplete', func );
			this.options.progress.onCompleteFunc = func;
			return this;
		};

	}
})();
