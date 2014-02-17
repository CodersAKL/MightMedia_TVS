/**
 * Created by "Coders".
 * User: Vytenis
 * Date: 13.2.1
 * Time: 10.16
 * © 2013
 */

/**
 * Progress bar functionality
 */
;
(function() {
	window.progress = function( el ) {

		this.options = {
			debug : true,
			el    : el,
			size  : 0,
			type  : 'swing',
			onCompleteFunc : function(){},
			selectors : {
				progressBar     : '.progress_bar',
				progress        : '.progress',
				progressMessage : '.progress_text'
			},
			dom : {
				progressBar     : {},
				progress        : {},
				progressMessage : {}
			},
			template :
			'<div class="progress_bar box-black pos-r bg-w t-l">' +
				'<div class="progress bg-s" style="width:0"></div>' +
				'<div class="fill t-c progress_text"><!-- progress text --></div>' +
			'</div>'
		};

		/**
		 * Constructor
		 */
		this.init = function() {

			// Clean if some waitingscreen is already opened
			var $item = this.options.el.find( this.options.selectors.progress );
			$item.clearQueue().stop();
			this.set( 0, 0 );

			this.options.el.html( this.options.template.replace('<!-- progress text -->',this.options.el.html()) );
			return this;
		};

		/**
		 * Set value in percentage
		 * @param val
		 * @param animate
		 */
		this.set = function( val, animate ) {

			return this.increase( val, animate, false );
		};

		/**
		 * Increase progress bar size by percentage
		 * @param val
		 * @param animate
         * @param increase
		 */
		this.increase = function( val, animate, increase ) {

			if ( increase === void 0 ) {
				this.options.size += val;
			} else {
				this.options.size = val;
			}

			if ( this.options.size > 100 ) {
				this.options.size = 100;
			}

			var
				$item = this.options.el.find( this.options.selectors.progress ),
				$text = this.options.el.find( this.options.selectors.progressMessage ),
				self  = this
			;

			$item.animate({width : this.options.size + '%'},
				{
					duration: animate,
					easing : self.options.type,
					queue: false,
					step: function( now, fx ) {
	//						$text.text(Math.floor( now ) + "%");
						$text.text( now.toFixed(2) + " %");
					},
					complete : function(){ self.check(); }
				}
			);

			return this;
		};

		/**
		 * Check if progress bar is not 100%
		 * if so - fire the onComplete event
		 */
		this.check = function() {
			if ( this.options.size == 100 && this.onCompleteFunc !== null ) {
				this.options.onCompleteFunc();
				this.set( 0, 0 );   // reset
			}
		};

		/**
		 * Fire the event on finish
		 * @param func
		 * @return {*}
		 */
		this.onComplete = function( func ) {
			this.options.onCompleteFunc = func;
			return this;
		};

		/**
		 * Force to finish progress bar animation
		 */
		this.finish = function() {

			var $item = this.options.el.find( this.options.selectors.progress );
			$item.clearQueue().stop();
			this.set( 100, 1000 );
		};

		/**
		 * Place a text in progress bar
		 * @param text
		 * @return {*}
		 */
		this.message = function( text ) {

			var $item = this.options.el.find( this.options.selectors.progressMessage );
			$item.text( text );
			return this;
		};
		this.text = function( text ) {
			return this.message( text );
		};

		this.count = function( val, animate ) {
			var $item = this.options.el.find( this.options.selectors.progressMessage );
			$({percentage: this.options.size}).animate({percentage: this.options.size + val}, {
				duration: animate,
				easing:'linear',
				step: function() {
					$item.text(Math.floor(this.percentage) + "%");
				}
			});
		};
	}
})();
