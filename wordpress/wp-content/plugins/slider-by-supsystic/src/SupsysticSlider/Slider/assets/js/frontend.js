/*global jQuery*/
var g_sslYoutubeAPIReady = false;
(function ($, app, debug, undefined) {

    app.enableTextAnimation = (function($part, properties) {
        if(properties['text-animation'] == 'enable' && !$('.ui-dialog').length) {
            $part.children('span').textillate({
                initialDelay: 1000,
                loop: true,
                in: {
                    effect: properties['text-effect-in'],
                    delay: 100,
                    sync: true
                },
                out: {
                    effect: properties['text-effect-out'],
                    shuffle: true
                }
            });
        }
    });

    app.isControls = (function($element) {
        return $element.hasClass('bx-controls-direction');
    });

    app.setArrows = (function($element, properties) {
        if(this.isControls($element)) {
            $element.find('a').each(function() {
                $(this).attr('id', properties['background']);
            });
        }
    });

    var initVisualSettings = function($container, self) {
        // Apply visual editor styles.
        if ($.isPlainObject($container.data('settings'))) {
            var settings = $container.data('settings');

            if ('__veditor__' in settings && settings['__veditor__']) {
                $.each(settings['__veditor__'], function (selector, properties) {
                    var $part = $(selector, $container);

                    self.setArrows($part, properties);
                    $.each(properties, function (key, value) {
                        $part.css(key, value);
                    });
                    if($part.is('.bx-caption')) {
                        self.enableTextAnimation($part, properties);
                    }
                });
            }
        }
    };

    app.init = (function(selector) {
		var self = this,
			defaultSelector = '.supsystic-slider',
			$container = (typeof selector == 'undefined') ? $(defaultSelector) : $(selector);

		if (!$container.length) {
			if (debug) {
				console.log('Selector "' + selector + '" does not exists.');
			}
			return false;
		}
		if ($.isEmptyObject(app.plugins)) {
			if (debug) {
				console.log('There are no registered plugins.');
			}
			return false;
		}
		$.each(app.plugins, function (plugin, callback) {
			if (debug) {
				console.log('Plugin initialization: ' + plugin);
			}
			if (!$.isFunction(callback)) {
				if (debug) {
					console.log('The callback for the ' + plugin + ' is not a function.');
				}
			}
			callback($container);
			$.each($container, function(index, value) {
				initVisualSettings($(value), self);
			});
		});
		return true;
    });

    $(document).ready(function() {
		//if General Mode equals Fade, script hides the Easing input
		function disabledIfFade() {
			var $generalMode = $('#generalMode').val();

			if ($generalMode == 'fade') {
				$('#generalEasing').prop( "disabled", true );
			} else {
				$('#generalEasing').prop( "disabled", false );
			}
		}

        function initVerticalModeElements() {
            var $generalMode = $('#generalMode').val();

            if ($generalMode == 'vertical') {
                $('#generalNumberOfSlides, #generalDistanceBetweenSlides, #generalVerticalArrowsMode').prop("disabled", false);
                $('#general-number-of-slides, #general-distance-between-slides, #general-vertical-arrows-mode').show();
            } else {
                $('#generalNumberOfSlides, #generalDistanceBetweenSlides, #generalVerticalArrowsMode').prop("disabled", true);
                $('#general-number-of-slides, #general-distance-between-slides, #general-vertical-arrows-mode').hide();
            }
        }

		disabledIfFade();

        initVerticalModeElements();
		$('#generalMode').click(function() {
			disabledIfFade();
            initVerticalModeElements();
		});

        app.init();
        // Show sliders (Bx & Coin) only after initialization
        $('.supsystic-slider').css('visibility', 'visible');

		window.onYouTubeIframeAPIReady = function() {
			g_sslYoutubeAPIReady = true;
		};

		var $container = $('.supsystic-slider-wrapper');

		$container.each(function() {
			socialShareInit($(this), $(this).find('.supsystic-slider').data('settings'));
		});

    }).ajaxComplete(function() {
        $('.supsystic-slider').css('visibility', 'visible');
        //app.init();
    });

	function socialShareInit($slider, settings) {
		if(settings && settings.socialSharing && settings.socialSharing.status == 'enable') {
			var $socialShare = $slider.find('.slider-social-share-html'),
				sliderSharing = settings.socialSharing.sliderSharing && settings.socialSharing.sliderSharing.status == 'enable' ? settings.socialSharing.sliderSharing : false,
				imageSharing = settings.socialSharing.imageSharing && settings.socialSharing.imageSharing.status == 'enable' ? settings.socialSharing.imageSharing : false,
				socialButtonsUrl = getSocialButtonsUrl();

			if(sliderSharing) {
				var $socialButtons = getSocialButtons($slider, '', socialButtonsUrl, '', '', ''),
					buttons;
				if (sliderSharing.buttonsPosition == 'top' || sliderSharing.buttonsPosition == 'all') {
					buttons = $slider.find('.slider-sharing-top')
						.html($socialButtons.html())
						.find('.supsystic-social-sharing');
				}
				if (sliderSharing.buttonsPosition == 'bottom' || sliderSharing.buttonsPosition == 'all'){
					buttons = $slider.find('.slider-sharing-bottom')
						.html($socialButtons.html())
						.find('.supsystic-social-sharing');
				}
				window.initSupsysticSocialSharing(buttons);
				initEvent($slider.find('.slider-sharing-top, .slider-sharing-bottom'));
			}

			if(imageSharing) {
				var $images = $slider.find('.slide'),
					socialButtonsClass = 'supsystic-slider-image-sharing ' + imageSharing.buttonsPosition + ' ' + imageSharing.buttonsAlign;

				$images.each(function() {
					var $this = $(this),
						btns = getSocialButtonsByImage($slider, socialButtonsClass, $this);
					if(btns) {
						$this.append(btns);
					}
				});
				changeImageSocialHref($images.children('.supsystic-slider-image-sharing'));
				correctImageSocialButtons($images.children('.supsystic-slider-image-sharing'));
				initEvent($images.children('.supsystic-slider-image-sharing'));
			}
		}
	}

	function initEvent($elements){
		if(!$elements.size()){
			return;
		}
		$elements.find('.supsystic-social-sharing a.social-sharing-button').on('click',function (e) {
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();
			$(document).trigger('ssSocialClick', this);
			if (e.currentTarget.href.slice(-1) !== '#') {
				window.open(e.currentTarget.href, 'mw' + e.timeStamp, 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
			}
		});
	}

	function getSocialButtonsUrl() {
		var socialButtonsUrl = window.location.href.replace(window.location.hash,'');

		socialButtonsUrl = removePopUpHashFromUrl(socialButtonsUrl);

		if(socialButtonsUrl.indexOf('#') + 1 == socialButtonsUrl.length){
			socialButtonsUrl = socialButtonsUrl.substr(0, socialButtonsUrl.length - 1);
		}

		return socialButtonsUrl;
	}

	function removePopUpHashFromUrl(url){
		var match = url.match(/gg-\d+-\d+/);

		return url.replace(url[url.indexOf(match)-1] + match,"");
	}

	function getSocialButtons($slider, wrapper_class, url, img_id, img_src, title, noCounter) {
		title = title || null;

		var html = $slider.find('.slider-social-share-html').html();
		if (html !== undefined && html.length){
			html = html.replace(/{url}/g, url).replace(/{title}/g, title);
			if(noCounter) {
				// cut counter div
				html = html.replace(/<div class="counter-wrap.*?>.*?<\/div>/g, '');
			}
		}

		return $('<div>', {
			class: wrapper_class,
			'data-img-thumbnail': img_src,
			'data-img-id': img_id,
			'data-img-title': title
		}).html(html);
	}

	function getSocialButtonsByImage($slider, wrapper_class, $element) {
		var type = $slider.find('.supsystic-slider').data('type'),
			$img = $element.find('img').first(),
			imgSrc = $img.attr('src') ? $img.attr('src') : $img.attr('src2'),
			$captionContainer,
			url = imgSrc;

		if(url) {
			var title = $element.attr('title'),
				imageId = $element.data('id');

			switch(type) {
				case 'bx':
					$captionContainer = $element.find('.bx-caption');
					break;
				case 'coin':
					$captionContainer = $slider.find('.cs-title');
					break;
				case 'jssor':
					$captionContainer = $element.find('.jssor-caption');
					break;
				default:
					$captionContainer = [];
					break;
			}
			if ($captionContainer.length) {
				var caption = $.trim(
					$captionContainer.clone().html($captionContainer.html()
						.replace(/<br\s*[\/]?>/gi, ' '))
						.text()
						.replace(/\s+/, ' ')
				);

				if (caption.length) {
					title = caption;
				}
			}
			if (imgSrc && imgSrc.indexOf('http') !== 0) {
				imgSrc = 'http:' + imgSrc;
			}

			function updateQueryStringParameter(uri, key, value) {
				var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i"),
					separator = uri.indexOf('?') !== -1 ? "&" : "?";

				if (uri.match(re)) {
					return uri.replace(re, '$1' + key + "=" + value + '$2');
				} else {
					return uri + separator + key + "=" + value;
				}
			}
			url = encodeURIComponent(updateQueryStringParameter(url, 'shared-image', imageId));
			return getSocialButtons($slider, wrapper_class, url, '', imgSrc, title, true);
		}
		return false;
	}

	function correctImageSocialButtons($imageSharing) {
		if(!$imageSharing.size()){
			return;
		}
		var $example = $imageSharing.eq(0),
			width = $example.width(),
			height = $example.height(),
			correctCss = {},
			self = this;

		if($example.hasClass('vertical')){
			var buttonWidth = $example.find('.social-sharing-button').eq(0).outerWidth();

			correctCss.width = buttonWidth;
			$example.width(buttonWidth);
		}
		/* css is used now: transform: translateX(-50%); */
		/*if($example.hasClass('center')){
			$.extend(correctCss,{'margin-left': '-' + (width/2) + 'px'})
		}
		if($example.hasClass('middle')){
			$.extend(correctCss,{'margin-top': '-' + (height/2) + 'px'})
		}*/
		$imageSharing.find('.social-sharing-button.print').on('click',function(){
			var image_url = $(this).closest('.supsystic-slider-image-sharing').data('img-thumbnail');
			window.open(image_url).print();
		});
		$imageSharing.find('.social-sharing-button.bookmark').on('click',function(){
			if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
				window.sidebar.addPanel(document.title, window.location.href, '');
			} else if (window.external && ('AddFavorite' in window.external)) { // IE Favorite
				window.external.AddFavorite(location.href, document.title);
			} else if (window.opera && window.print) { // Opera Hotlist
				this.title = document.title;
				return true;
			} else { // webkit - safari/chrome
				alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
			}
		});
		$imageSharing.find('.social-sharing-button.mail').on('click',function(){
			var $infoElement = $(this).closest('.supsystic-slider-image-sharing'),
				image_id = $infoElement.data('img-id'),
				image_title = typeof $infoElement.data('img-title') !== "undefined" ? ', ' + $infoElement.data('img-title') : '',
				url = $infoElement.attr('data-img-thumbnail'),
				mailTo = (jQuery(this).attr('data-mailto').length > 0) ? jQuery(this).attr('data-mailto') : '',
				src = 'mailto:'+mailTo+'?subject=' + encodeURIComponent(document.title) + image_title + '&body=' + url,
				iframe = $('<iframe id="mailtoFrame" src="' + src + '" width="1" height="1" border="0" frameborder="0"></iframe>');

			$('body').append(iframe);
			window.setTimeout(function(){
				iframe.remove();
			}, 500);
		});
		$imageSharing.each(function(){
			$(this).css(correctCss);

			var thumbnail = $(this).data('img-thumbnail');

			if(thumbnail) {
				var socialSharingImageOperators = {
					'pinterest': 'media'
				};
				for(var sharingClass in socialSharingImageOperators){
					var $button = $(this).find('.social-sharing-button.' + sharingClass);

					if($button.size()){
						var img_url = $(this).data('img-url'),
							img_id = $(this).data('img-id'),
							url = getSocialButtonsUrl(),
							href =  $button.attr('href').replace(img_url, addPopUpHashToUrl(url, img_id)) +
								'&' + socialSharingImageOperators[sharingClass] + '=' + thumbnail;

						$button.attr('href', href);
					}
				}
			}
		});
	}

	function changeImageSocialHref($imageSharing) {
		if(!$imageSharing.size()){
			return;
		}
		$imageSharing.each(function(){

			var $buttons = $(this).find('.social-sharing-button');

			$buttons.each(function () {
				var button = $(this);
				var buttonHref = button.attr('data-main-href');
				button.attr('href', buttonHref);
			});

		});
	}

	function addPopUpHashToUrl(url, hash){
		if(hash.length = 0){
			return url;
		}
		var prefix = url.indexOf(prefix) != -1 ? '&' : '?';

		return url + prefix + hash;
	}

}(jQuery, window.SupsysticSlider = window.SupsysticSlider || {}, document.location.hash == '#debug'));
