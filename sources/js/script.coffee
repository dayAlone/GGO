spinOptions = 
	lines		 : 13
	length		: 21
	width		 : 2
	radius		: 24
	corners	 : 0
	rotate		: 0
	direction : 1
	color		 : '#0d5bcb'
	speed		 : 1
	trail		 : 68
	shadow		: false
	hwaccel	 : false
	className : 'spinner'
	zIndex		: 2e9
	top			 : '50%'
	left			: '50%'

end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd'

delay = (ms, func) -> setTimeout func, ms

sizeAction = ->
	autoHeight $('.certs'), '.cert'
	if $('.slider').length > 0
		$('.slider__item').height $(window).height() - $('.slider').offset().top
		$('.slider').data('fotorama').resize
			height: $(window).height() - $('.slider').offset().top
	
autoHeight = (el, selector='', height_selector = false, use_padding=false, debug=false)->
	if el.length > 0
		item = el.find(selector)

		if height_selector
			el.find(height_selector).removeAttr 'style'
		else
			el.find(selector).removeAttr 'style'
		
		item_padding = item.css('padding-left').split('px')[0]*2
		padding			= el.css('padding-left').split('px')[0]*2
		if debug
			step = Math.round((el.width()-padding)/(item.width()+item_padding))
		else
			step = Math.round(el.width()/item.width())
		
		count = item.length-1
		loops = Math.ceil(count/step)
		i		 = 0
		
		if debug
			console.log count, step, item_padding, padding, el.width(), item.width()

		while i < count
			items = {}
			for x in [0..step-1]
				items[x] = item[i+x] if item[i+x]
			
			heights = []
			$.each items, ()->
				if height_selector
					heights.push($(this).find(height_selector).height())
				else
					heights.push($(this).height())
			
			if debug
				console.log heights

			$.each items, ()->
				if height_selector
					$(this).find(height_selector).height Math.max.apply(Math,heights)
				else
					$(this).height Math.max.apply(Math,heights)

			i += step

initContacts = ->
	myMap = new ymaps.Map 'contacts-map', {
		center : [55.79331828, 37.82019650],
		zoom	 : 15
	}
	myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
	}, {
		iconLayout: 'default#image',
		iconImageHref: '/layout/images/pin.png',
		iconImageSize: [30, 44],
		iconImageOffset: [15, -44]
	});
	$('#Map').data('map', true)
	myMap.geoObjects.add(myPlacemark);

timer = false

@openDropdown = (x)->
	clearTimeout timer
	text = x.elem('text').text()
	x.elem('item').show()
	x.elem('frame').find("a").each ->
		if $(this).text() == text && $(this).parents('li').find('ul').length == 0
			$(this).hide()
	x.elem('frame').velocity
		properties: "transition.slideDownIn"
		options:
			duration: 300
			complete: ()->
				x.mod('open', true)
				#timer = delay 6000, ()->
					#closeDropdown x

@closeDropdown = (x)->
	x.mod('open', false)
	x.elem('frame').velocity
		properties: "transition.slideUpOut"
		options:
			duration: 300

@initDropdown = ->
	$('.dropdown').elem('item').off('change').on 'click', (e)->

		if $(this).attr('href')[0] == "#"
			$(this).block().elem('text').html($(this).text())
			$(this).block().elem('frame').velocity
					properties: "transition.slideUpOut"
					options:
						duration: 300
			e.preventDefault()
		else
			window.location.href = $(this).attr('href')
	
	$('.dropdown').elem('trigger').on 'click', (e)->
		e.preventDefault()

	$('.dropdown').elem('select').off('change').on 'change', ()->
		
		val = $(this).val()
		$(this).block().find("a[href='#{val}']").trigger 'click'
		$(this).mod 'open', true
		
	$('.dropdown').hoverIntent
			over : ()->
				if $(window).width() > 970
					openDropdown $(this)
				else
					$(this)
						.elem('select').focus()
						.mod 'open', true
			out : ()->
				if $(window).width() > 970
					closeDropdown $(this)

initPhotoSwipeFromDOM = (gallerySelector) ->
	# parse slide data (url, title, size ...) from DOM elements 
	# (children of gallerySelector)

	parseThumbnailElements = (el) ->
		thumbElements = el.childNodes
		numNodes = thumbElements.length
		items = []
		figureEl = undefined
		linkEl = undefined
		size = undefined
		item = undefined
		i = 0
		while i < numNodes
			figureEl = thumbElements[i]
			# <figure> element
			# include only element nodes 
			if figureEl.nodeType != 1
				i++
				continue
			linkEl = figureEl.children[0]
			# <a> element
			size = linkEl.getAttribute('data-size').split('x')
			# create slide object
			item =
				src: linkEl.getAttribute('href')
				w: parseInt(size[0], 10)
				h: parseInt(size[1], 10)
			if figureEl.children.length > 1
				# <figcaption> content
				item.title = figureEl.children[1].innerHTML
			if linkEl.children.length > 0
				# <img> thumbnail element, retrieving thumbnail url
				item.msrc = linkEl.children[0].getAttribute('src')
			item.el = figureEl
			# save link to element for getThumbBoundsFn
			items.push item
			i++
		return items

	# find nearest parent element

	closest = (el, fn) ->
		el and (if fn(el) then el else closest(el.parentNode, fn))

	# triggers when user clicks on thumbnail

	onThumbnailsClick = (e) ->
		e = e or window.event
		if e.preventDefault then e.preventDefault() else (e.returnValue = false)
		eTarget = e.target or e.srcElement
		# find root element of slide
		clickedListItem = closest(eTarget, (el) ->
			el.tagName and el.tagName.toUpperCase() == 'FIGURE'
		)
		if !clickedListItem
			return
		# find index of clicked item by looping through all child nodes
		# alternatively, you may define index via data- attribute
		clickedGallery = clickedListItem.parentNode
		childNodes = clickedListItem.parentNode.childNodes
		numChildNodes = childNodes.length
		nodeIndex = 0
		index = undefined
		i = 0
		while i < numChildNodes
			if childNodes[i].nodeType != 1
				i++
				continue
			if childNodes[i] == clickedListItem
				index = nodeIndex
				break
			nodeIndex++
			i++
		
		if index >= 0
			# open PhotoSwipe if valid index found
			openPhotoSwipe index, clickedGallery
		false

	# parse picture index and gallery index from URL (#&pid=1&gid=2)

	photoswipeParseHash = ->
		hash = window.location.hash.substring(1)
		params = {}
		if hash.length < 5
			return params
		vars = hash.split('&')
		i = 0
		while i < vars.length
			if !vars[i]
								i++
				continue
			pair = vars[i].split('=')
			if pair.length < 2
								i++
				continue
			params[pair[0]] = pair[1]
			i++
		if params.gid
			params.gid = parseInt(params.gid, 10)
		if !params.hasOwnProperty('pid')
			return params
		params.pid = parseInt(params.pid, 10)
		params

	openPhotoSwipe = (index, galleryElement, disableAnimation) ->
		pswpElement = document.querySelectorAll('.pswp')[0]

		gallery = undefined
		options = undefined
		items = undefined
		items = parseThumbnailElements(galleryElement)
		# define options (if needed)
		options =
			showAnimationDuration: 100
			index: index
			galleryUID: galleryElement.getAttribute('data-pswp-uid')
			getThumbBoundsFn: (index) ->
				return
				# See Options -> getThumbBoundsFn section of documentation for more info
				thumbnail = items[index].el.getElementsByTagName('img')[0]
				pageYScroll = window.pageYOffset or document.documentElement.scrollTop
				rect = thumbnail.getBoundingClientRect()

				data = {
					x: rect.left
					y: rect.top + pageYScroll
					w: rect.width
				}
				return data
		if disableAnimation
			options.showAnimationDuration = 0

		# Pass data to PhotoSwipe and initialize it
		gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options)
		gallery.init()
		return

	# loop through all gallery elements and bind events

	galleryElements = document.querySelectorAll(gallerySelector)
	i = 0
	l = galleryElements.length
	while i < l
		galleryElements[i].setAttribute 'data-pswp-uid', i + 1
		galleryElements[i].onclick = onThumbnailsClick
		i++

@initGeography = ->
	myMap = new (ymaps.Map)('map',
		center: [
			57.59224209
			72.07521800
		]
		zoom: 4
		type: 'yandex#map'
		controls: [
			'geolocationControl'
			'fullscreenControl'
			'zoomControl'
		])

	MyIconContentLayout = ymaps.templateLayoutFactory.createClass '<div style="color: #FFFFFF; font-family: PT Sans; font-size: 12px;line-height:21px;">{{ properties.geoObjects.length }}</div>'
	clusterer = new (ymaps.Clusterer)(
		clusterIconContentLayout: MyIconContentLayout
		clusterIcons: [ {
			href: '/layout/images/cluster.png'
			size: [
				20
				20
			]
			offset: [
				-10
				-10
			]
		} ]
		clusterNumbers: [ 100 ]
		gridSize: 12
	)
	
	open	 = []
	points = []

	icon =
		iconLayout: 'default#image'
		iconImageHref: '/layout/images/pin-open.png'
		iconImageSize: [
			20
			29
		]
		iconImageOffset: [
			-10
			-31
		]
	
	i = 0
	$.each mapItems.concat(mapRefItems), (key, point)->
		points[i] = new (ymaps.Placemark)(point.coords.split(',').map((val)->parseFloat(val)), { hintContent: '' }, icon)
		points[i].events.add 'click', (e) ->
			if $.inArray(e.originalEvent.target, open) == -1
				e.originalEvent.target.options.set iconImageHref: '/layout/images/pin-white.png'
				showGeographyDetail "/ajax#{point.url}"
				$('.geography__popup_close').one 'click', ->
					$.each open, ->
						@options.set iconImageHref: '/layout/images/pin-open.png'
						return
					open = []
					return
				$.each open, ->
					@options.set iconImageHref: '/layout/images/pin-open.png'
					return
				open = [ e.originalEvent.target ]
			return
		#myMap.geoObjects.add points[i]
		i++
	clusterer.add points
	myMap.geoObjects.add clusterer
	
@showGeographyDetail = (url)->
	if !$('.geography__popup').is ':visible'
		$('.geography__popup').velocity
				properties: "transition.slideRightIn"
				options:
					duration: 400
	else
		$('.geography__popup_content').spin spinOptions
	
	$('.geography__popup_content').load url, ()->
		$('.geography__popup_content').spin(false);
		$('.geography__popup_content').perfectScrollbar('destroy');
		$('.geography__popup_content').perfectScrollbar
			suppressScrollX: true
	
	$('.geography__popup_close').one 'click', (e)->
		$('.geography__popup').velocity
			properties: "transition.slideRightOut"
			options:
				duration: 400
				complete: ()->
					$('.geography__popup_content').spin spinOptions

		e.preventDefault()

checkArrows = ->
	if $('.history .slick-slide:last').hasClass 'active'
		$('.slick-next').addClass 'slick-disabled' 
	else
		$('.slick-next').removeClass 'slick-disabled'
	
	if $('.history .slick-slide:first').hasClass 'active'
		$('.slick-prev').addClass 'slick-disabled' 
	else
		$('.slick-prev').removeClass 'slick-disabled'
checkStructure = (hide = false)->
	if $('.structure__content--open').length > 0
		$("a[href*='#{$('.structure__content--open').attr('id')}']").mod 'open', false
		selector = '.structure__content--open'
		if hide
			selector += " , .structure .button"
		$(selector).velocity
			properties: "transition.fadeOut"
			options:
				duration: 300
				complete: ()->
					$(this).mod 'open', false
					if hide
						$('.structure').elem('intro').velocity
							properties: "transition.fadeIn"
							options:
								duration: 300

	else
		$('.structure .button').velocity
			properties: "transition.fadeIn"
			options:
				duration: 300
@getCaptcha = ()->
	$.get '/include/captcha.php', (data)->
		setCaptcha data

@setCaptcha = (code)->
	$('input[name=captcha_sid]').val(code)
	$('.captcha').css 'background-image', "url(/include/captcha.php?captcha_sid=#{code})"

$(document).ready ->
	#$('#vacancyDetail').modal()
	
	if $('.geography').length > 0

		$('.geography__popup_content').spin spinOptions

		$.getScript 'http://api-maps.yandex.ru/2.1/?lang=' + $('.geography #map').data('lang'), ->
			if(window.location.hash)
				$('.geography-filter a[href^="'+window.location.hash+'"]').trigger('click')
			
			ymaps.ready(initGeography);

	initPhotoSwipeFromDOM('.news__gallery');
	initPhotoSwipeFromDOM('.gallery');

	if $('.slider').length > 0
		$('.slider')
		.on( 'fotorama:ready', ()->
			$('.slider .fotorama__arr--prev').load('/layout/images/svg/slider-arrow-left.svg')
			$('.slider .fotorama__arr--next').load('/layout/images/svg/slider-arrow-right.svg')
		)
		.fotorama
			height: $(window).height() - $('.slider').offset().top
	
	$('.search a').click (e)->
		$('.search').elem('form').velocity
			properties: "transition.slideDownIn"
			options:
				duration: 300
				
		delay 10000, ->
			if $('.search input').val() == ''
				$('.search').elem('form').velocity
					properties: "transition.slideUpOut"
					options:
						duration: 300
		$('.search').on 'mouseleave', ->
			$('.search').elem('form').velocity
				properties: "transition.slideUpOut"
				options:
					duration: 300
		e.preventDefault()

	###
	$('.project').click (e)->
		pswpElement = document.querySelectorAll('.pswp')[0];
		items = $(this).data('pictures')
		if items.length > 0
			galleryOptions = 
				history : false
				focus   : false
				shareEl : false
			gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, galleryOptions);
			gallery.init();
			e.preventDefault()
	###
	$('.cert').elem('picture').click (e)->
		pswpElement = document.querySelectorAll('.pswp')[0];
		items = $(this).data('pictures')
		galleryOptions = 
			history : false
			focus   : false
			shareEl : false
		gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, galleryOptions);
		gallery.init();
		e.preventDefault()

	$('.slider__down').click (e)->
		offset = $(".sections").offset().top
		$('html, body').animate({'scrollTop' : offset },300)
		e.preventDefault()

	$('.history__slider a').click (e)->
		$('.history .slick-active.active').removeClass 'active'
		$(this).parents('.slick-slide').addClass 'active'
		
		$('.history__content-block').mod 'active', false
		
		id = $(this).attr 'href'
		$(id).addClass 'history__content-block--active'

		checkArrows()

		e.preventDefault()

	$('.history').elem('slider')
		.on('init', (event, slick, direction)->
			$('.history .slick-active:last').addClass 'last'
			$('.history .slick-active:first').addClass 'active'
			
			$('.history button').off('click').on 'click', (e)->
				if !$('.history').elem('slider').data 'action'
					if !$(this).hasClass 'slick-disabled'
						index = $('.history .slick-active.active').data('slick-index')
						
						if $(this).hasClass 'slick-next'
							index += 2
							if $('.history .slick-active:last').hasClass 'active'
								$('.history').elem('slider').slick('slickNext')
						else if $(this).hasClass 'slick-prev'
							if $('.history .slick-active:first').hasClass 'active'
								$('.history').elem('slider').slick('slickPrev')

						$('.history .slick-active.active').removeClass 'active'
						$(".history .slick-slide:nth-child(#{index})").addClass 'active'
						
						$('.history__content-block').mod 'active', false
						id = $('.history .slick-active.active a').attr 'href'
						$(id).addClass 'history__content-block--active'
					
					checkArrows()

				e.preventDefault()
		)
		.on('beforeChange', (event, slick, direction)->
			
			$('.history').elem('slider').data 'action', true

			$('.history .slick-active.last').removeClass 'last'
		
		).on('afterChange', (event, slick, direction)->
			$('.history').elem('slider').data 'action', false
			$('.history .slick-active:last').addClass 'last'
			
			return false
		).slick
			infinite       : false
			draggable      : false
			slidesToShow   : 8
			slidesToScroll : 1
			nextArrow      : "<button type=\"button\" class=\"slick-next\">#{$('.arrow__next').html()}</button>"
			prevArrow      : "<button type=\"button\" class=\"slick-prev\">#{$('.arrow__prev').html()}</button>"
			responsive: [
				{
					breakpoint: 1200
					settings:
						slidesToShow: 7
				}
				{
					breakpoint: 992
					settings:
						slidesToShow: 5
				}
				{
					breakpoint: 768
					settings:
						slidesToShow: 4
				}
				{
					breakpoint: 480
					settings:
						slidesToShow: 2
				}
			]

	$('.steps').elem('title').click (e)->
		section = $(this).parents('.steps__section')
		if !section.hasMod 'open'
			section.mod 'open', true

			section.find('.steps__content').velocity
				properties: "transition.fadeIn"
				options:
					duration: 300
		else
			section.mod 'open', false

			section.find('.steps__content').velocity
				properties: "transition.fadeOut"
				options:
					duration: 300
		e.preventDefault()

	$('.steps').elem('sub-title').click (e)->
		section = $(this).parents('.steps__sub-content')
		if !section.hasMod 'open'
			section.mod 'open', true

			section.find('.steps__text').velocity
				properties: "transition.fadeIn"
				options:
					duration: 300
		else
			section.mod 'open', false

			section.find('.steps__text').velocity
				properties: "transition.fadeOut"
				options:
					duration: 300
		e.preventDefault()

	$('.reference').elem('trigger').click (e)->
		block = $(this).block()
		content = $(this).block('content')
		if !block.hasMod 'open'
			content.velocity
				properties: "transition.fadeIn"
				options:
					duration: 300
					complete: ->
						block.mod 'open', true
		else
			content.velocity
				properties: "transition.fadeOut"
				options:
					duration: 300
					complete: ->
						block.mod 'open', false
		e.preventDefault()

	$('.structure').elem('link').on 'click', (e)->
		id = $(this).attr 'href'
		link = $(this)
		if $(id).length >0 && !link.hasMod 'open'
			link.mod 'open', true
			$('.structure').elem('intro').velocity
				properties: "transition.fadeOut"
				options:
					duration: 300
					complete: ()->
						checkStructure()
						$(id).velocity
							properties: "transition.fadeIn"
							options:
								duration: 300
								complete: ->
									$(id).mod 'open', true					
		e.preventDefault()
	$('.structure .button').on 'click', (e)->
		checkStructure(true)
		e.preventDefault()

	sHeight = 490
	if $(window).width() <= 375
		sHeight = 420

	$('.success-story')
	.on('fotorama:ready',->
		$('.fotorama__arr--prev').html $('.arrow__prev').html()
		$('.fotorama__arr--next').html $('.arrow__next').html()
	)
	.fotorama
		height: sHeight
	
	
	$('.file-trigger').click (e)->
		$(this).parent().find('input[type=file]').trigger 'click'
		e.preventDefault()

	$('input[type=file]').on 'change', ()->
		$('.form .file-trigger').removeClass 'error'
		$('.file-name').text($(this).val().replace(/.+[\\\/]/, ""))

	$('#vacancyDetail')
		.on 'show.bs.modal', (e)->
			if $(e.relatedTarget).parents('.vacancy').length > 0
				$('#vacancyDetail h3').text $(e.relatedTarget).parents('.vacancy').elem('title').text()
				$('#vacancyDetail h3').prepend "<span>Отклик на вакансию</span>"
				$('input[name="vacancy"]').val $(e.relatedTarget).parents('.vacancy').data 'id'
			else
				$('#vacancyDetail h3').text 'Отправка резюме в базу соискателей'
				$('#vacancyDetail h3 span').remove()
				$('input[name="vacancy"]').val(false).removeAttr 'value'
	$('#Map')
		.on 'show.bs.modal', ->
			if !$('#Map').data('map')
				$.getScript '//api-maps.yandex.ru/2.1/?lang=ru_RU', ->
					ymaps.ready initContacts


	$('.feedback').elem('form').submit (e)->
		e.preventDefault()
		data = $(this).serialize()
		$.post '/include/send.php', data,
	        (data) ->
	        	data = $.parseJSON(data)
	        	if data.status == "ok"
	        		$('.feedback').elem('form').hide().addClass 'hidden'
	        		$('.feedback').elem('success').show().removeClass 'hidden'
	        	else if data.status == "error"
	        		$('input[name=captcha_word]').addClass('parsley-error')
	        		getCaptcha()
	
	$('a.captcha_refresh, a.captcha__refresh').click (e)->
		getCaptcha()
		e.preventDefault()	

	initDropdown()




	x = undefined
	$(window).resize ->
		clearTimeout(x)
		x = delay 200, ()->
			sizeAction()

	scrollTimer = false
	$(window).scroll ->
		clearTimeout scrollTimer
		if !$('.scroll-fix').hasMod 'on'
			$('.scroll-fix').mod 'on', true
		scrollTimer = delay 300, ()->
			$('.scroll-fix').mod 'on', false

	delay 300, ()->
		sizeAction()
