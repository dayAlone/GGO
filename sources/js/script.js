(function() {
  var autoHeight, checkArrows, checkStructure, delay, end, initContacts, initPhotoSwipeFromDOM, sizeAction, spinOptions, timer;

  spinOptions = {
    lines: 13,
    length: 21,
    width: 2,
    radius: 24,
    corners: 0,
    rotate: 0,
    direction: 1,
    color: '#0d5bcb',
    speed: 1,
    trail: 68,
    shadow: false,
    hwaccel: false,
    className: 'spinner',
    zIndex: 2e9,
    top: '50%',
    left: '50%'
  };

  end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd';

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  sizeAction = function() {
    autoHeight($('.certs'), '.cert');
    if ($('.slider').length > 0) {
      $('.slider__item').height($(window).height() - $('.slider').offset().top);
      return $('.slider').data('fotorama').resize({
        height: $(window).height() - $('.slider').offset().top
      });
    }
  };

  autoHeight = function(el, selector, height_selector, use_padding, debug) {
    var count, heights, i, item, item_padding, items, j, loops, padding, ref, results, step, x;
    if (selector == null) {
      selector = '';
    }
    if (height_selector == null) {
      height_selector = false;
    }
    if (use_padding == null) {
      use_padding = false;
    }
    if (debug == null) {
      debug = false;
    }
    if (el.length > 0) {
      item = el.find(selector);
      if (height_selector) {
        el.find(height_selector).removeAttr('style');
      } else {
        el.find(selector).removeAttr('style');
      }
      item_padding = item.css('padding-left').split('px')[0] * 2;
      padding = el.css('padding-left').split('px')[0] * 2;
      if (debug) {
        step = Math.round((el.width() - padding) / (item.width() + item_padding));
      } else {
        step = Math.round(el.width() / item.width());
      }
      count = item.length - 1;
      loops = Math.ceil(count / step);
      i = 0;
      if (debug) {
        console.log(count, step, item_padding, padding, el.width(), item.width());
      }
      results = [];
      while (i < count) {
        items = {};
        for (x = j = 0, ref = step - 1; 0 <= ref ? j <= ref : j >= ref; x = 0 <= ref ? ++j : --j) {
          if (item[i + x]) {
            items[x] = item[i + x];
          }
        }
        heights = [];
        $.each(items, function() {
          if (height_selector) {
            return heights.push($(this).find(height_selector).height());
          } else {
            return heights.push($(this).height());
          }
        });
        if (debug) {
          console.log(heights);
        }
        $.each(items, function() {
          if (height_selector) {
            return $(this).find(height_selector).height(Math.max.apply(Math, heights));
          } else {
            return $(this).height(Math.max.apply(Math, heights));
          }
        });
        results.push(i += step);
      }
      return results;
    }
  };

  initContacts = function() {
    var myMap, myPlacemark;
    myMap = new ymaps.Map('contacts-map', {
      center: [55.79331828, 37.82019650],
      zoom: 15
    });
    myPlacemark = new ymaps.Placemark(myMap.getCenter(), {}, {
      iconLayout: 'default#image',
      iconImageHref: '/layout/images/pin.png',
      iconImageSize: [30, 44],
      iconImageOffset: [15, -44]
    });
    $('#Map').data('map', true);
    return myMap.geoObjects.add(myPlacemark);
  };

  timer = false;

  this.openDropdown = function(x) {
    var text;
    clearTimeout(timer);
    text = x.elem('text').text();
    x.elem('item').show();
    x.elem('frame').find("a").each(function() {
      if ($(this).text() === text && $(this).parents('li').find('ul').length === 0) {
        return $(this).hide();
      }
    });
    return x.elem('frame').velocity({
      properties: "transition.slideDownIn",
      options: {
        duration: 300,
        complete: function() {
          return x.mod('open', true);
        }
      }
    });
  };

  this.closeDropdown = function(x) {
    x.mod('open', false);
    return x.elem('frame').velocity({
      properties: "transition.slideUpOut",
      options: {
        duration: 300
      }
    });
  };

  this.initDropdown = function() {
    $('.dropdown').elem('item').off('change').on('click', function(e) {
      if ($(this).attr('href')[0] === "#") {
        $(this).block().elem('text').html($(this).text());
        $(this).block().elem('frame').velocity({
          properties: "transition.slideUpOut",
          options: {
            duration: 300
          }
        });
        return e.preventDefault();
      } else {
        return window.location.href = $(this).attr('href');
      }
    });
    $('.dropdown').elem('trigger').on('click', function(e) {
      return e.preventDefault();
    });
    $('.dropdown').elem('select').off('change').on('change', function() {
      var val;
      val = $(this).val();
      $(this).block().find("a[href='" + val + "']").trigger('click');
      return $(this).mod('open', true);
    });
    return $('.dropdown').hoverIntent({
      over: function() {
        if ($(window).width() > 970) {
          return openDropdown($(this));
        } else {
          return $(this).elem('select').focus().mod('open', true);
        }
      },
      out: function() {
        if ($(window).width() > 970) {
          return closeDropdown($(this));
        }
      }
    });
  };

  initPhotoSwipeFromDOM = function(gallerySelector) {
    var closest, galleryElements, i, l, onThumbnailsClick, openPhotoSwipe, parseThumbnailElements, photoswipeParseHash, results;
    parseThumbnailElements = function(el) {
      var figureEl, i, item, items, linkEl, numNodes, size, thumbElements;
      thumbElements = el.childNodes;
      numNodes = thumbElements.length;
      items = [];
      figureEl = void 0;
      linkEl = void 0;
      size = void 0;
      item = void 0;
      i = 0;
      while (i < numNodes) {
        figureEl = thumbElements[i];
        if (figureEl.nodeType !== 1) {
          i++;
          continue;
        }
        linkEl = figureEl.children[0];
        size = linkEl.getAttribute('data-size').split('x');
        item = {
          src: linkEl.getAttribute('href'),
          w: parseInt(size[0], 10),
          h: parseInt(size[1], 10)
        };
        if (figureEl.children.length > 1) {
          item.title = figureEl.children[1].innerHTML;
        }
        if (linkEl.children.length > 0) {
          item.msrc = linkEl.children[0].getAttribute('src');
        }
        item.el = figureEl;
        items.push(item);
        i++;
      }
      return items;
    };
    closest = function(el, fn) {
      return el && (fn(el) ? el : closest(el.parentNode, fn));
    };
    onThumbnailsClick = function(e) {
      var childNodes, clickedGallery, clickedListItem, eTarget, i, index, nodeIndex, numChildNodes;
      e = e || window.event;
      if (e.preventDefault) {
        e.preventDefault();
      } else {
        e.returnValue = false;
      }
      eTarget = e.target || e.srcElement;
      clickedListItem = closest(eTarget, function(el) {
        return el.tagName && el.tagName.toUpperCase() === 'FIGURE';
      });
      if (!clickedListItem) {
        return;
      }
      clickedGallery = clickedListItem.parentNode;
      childNodes = clickedListItem.parentNode.childNodes;
      numChildNodes = childNodes.length;
      nodeIndex = 0;
      index = void 0;
      i = 0;
      while (i < numChildNodes) {
        if (childNodes[i].nodeType !== 1) {
          i++;
          continue;
        }
        if (childNodes[i] === clickedListItem) {
          index = nodeIndex;
          break;
        }
        nodeIndex++;
        i++;
      }
      if (index >= 0) {
        openPhotoSwipe(index, clickedGallery);
      }
      return false;
    };
    photoswipeParseHash = function() {
      var hash, i, pair, params, vars;
      hash = window.location.hash.substring(1);
      params = {};
      if (hash.length < 5) {
        return params;
      }
      vars = hash.split('&');
      i = 0;
      while (i < vars.length) {
        if (!vars[i]) {
          i++;
        }
        continue;
        pair = vars[i].split('=');
        if (pair.length < 2) {
          i++;
        }
        continue;
        params[pair[0]] = pair[1];
        i++;
      }
      if (params.gid) {
        params.gid = parseInt(params.gid, 10);
      }
      if (!params.hasOwnProperty('pid')) {
        return params;
      }
      params.pid = parseInt(params.pid, 10);
      return params;
    };
    openPhotoSwipe = function(index, galleryElement, disableAnimation) {
      var gallery, items, options, pswpElement;
      pswpElement = document.querySelectorAll('.pswp')[0];
      gallery = void 0;
      options = void 0;
      items = void 0;
      items = parseThumbnailElements(galleryElement);
      options = {
        showAnimationDuration: 100,
        index: index,
        galleryUID: galleryElement.getAttribute('data-pswp-uid'),
        getThumbBoundsFn: function(index) {
          var data, pageYScroll, rect, thumbnail;
          return;
          thumbnail = items[index].el.getElementsByTagName('img')[0];
          pageYScroll = window.pageYOffset || document.documentElement.scrollTop;
          rect = thumbnail.getBoundingClientRect();
          data = {
            x: rect.left,
            y: rect.top + pageYScroll,
            w: rect.width
          };
          return data;
        }
      };
      if (disableAnimation) {
        options.showAnimationDuration = 0;
      }
      gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
      gallery.init();
    };
    galleryElements = document.querySelectorAll(gallerySelector);
    i = 0;
    l = galleryElements.length;
    results = [];
    while (i < l) {
      galleryElements[i].setAttribute('data-pswp-uid', i + 1);
      galleryElements[i].onclick = onThumbnailsClick;
      results.push(i++);
    }
    return results;
  };

  this.initGeography = function() {
    var MyIconContentLayout, clusterer, i, icon, myMap, open, points;
    myMap = new ymaps.Map('map', {
      center: [57.59224209, 72.07521800],
      zoom: 4,
      type: 'yandex#map',
      controls: ['geolocationControl', 'fullscreenControl', 'zoomControl']
    });
    MyIconContentLayout = ymaps.templateLayoutFactory.createClass('<div style="color: #FFFFFF; font-family: PT Sans; font-size: 12px;line-height:21px;">{{ properties.geoObjects.length }}</div>');
    clusterer = new ymaps.Clusterer({
      clusterIconContentLayout: MyIconContentLayout,
      clusterIcons: [
        {
          href: '/layout/images/cluster.png',
          size: [20, 20],
          offset: [-10, -10]
        }
      ],
      clusterNumbers: [100],
      gridSize: 12
    });
    open = [];
    points = [];
    icon = {
      iconLayout: 'default#image',
      iconImageHref: '/layout/images/pin-open.png',
      iconImageSize: [20, 29],
      iconImageOffset: [-10, -31]
    };
    i = 0;
    $.each(mapItems.concat(mapRefItems), function(key, point) {
      points[i] = new ymaps.Placemark(point.coords.split(',').map(function(val) {
        return parseFloat(val);
      }), {
        hintContent: ''
      }, icon);
      points[i].events.add('click', function(e) {
        if ($.inArray(e.originalEvent.target, open) === -1) {
          e.originalEvent.target.options.set({
            iconImageHref: '/layout/images/pin-white.png'
          });
          showGeographyDetail("/ajax" + point.url);
          $('.geography__popup_close').one('click', function() {
            $.each(open, function() {
              this.options.set({
                iconImageHref: '/layout/images/pin-open.png'
              });
            });
            open = [];
          });
          $.each(open, function() {
            this.options.set({
              iconImageHref: '/layout/images/pin-open.png'
            });
          });
          open = [e.originalEvent.target];
        }
      });
      return i++;
    });
    clusterer.add(points);
    return myMap.geoObjects.add(clusterer);
  };

  this.showGeographyDetail = function(url) {
    if (!$('.geography__popup').is(':visible')) {
      $('.geography__popup').velocity({
        properties: "transition.slideRightIn",
        options: {
          duration: 400
        }
      });
    } else {
      $('.geography__popup_content').spin(spinOptions);
    }
    $('.geography__popup_content').load(url, function() {
      $('.geography__popup_content').spin(false);
      $('.geography__popup_content').perfectScrollbar('destroy');
      return $('.geography__popup_content').perfectScrollbar({
        suppressScrollX: true
      });
    });
    return $('.geography__popup_close').one('click', function(e) {
      $('.geography__popup').velocity({
        properties: "transition.slideRightOut",
        options: {
          duration: 400,
          complete: function() {
            return $('.geography__popup_content').spin(spinOptions);
          }
        }
      });
      return e.preventDefault();
    });
  };

  checkArrows = function() {
    if ($('.history .slick-slide:last').hasClass('active')) {
      $('.slick-next').addClass('slick-disabled');
    } else {
      $('.slick-next').removeClass('slick-disabled');
    }
    if ($('.history .slick-slide:first').hasClass('active')) {
      return $('.slick-prev').addClass('slick-disabled');
    } else {
      return $('.slick-prev').removeClass('slick-disabled');
    }
  };

  checkStructure = function(hide) {
    var selector;
    if (hide == null) {
      hide = false;
    }
    if ($('.structure__content--open').length > 0) {
      $("a[href*='" + ($('.structure__content--open').attr('id')) + "']").mod('open', false);
      selector = '.structure__content--open';
      if (hide) {
        selector += " , .structure .button";
      }
      return $(selector).velocity({
        properties: "transition.fadeOut",
        options: {
          duration: 300,
          complete: function() {
            $(this).mod('open', false);
            if (hide) {
              return $('.structure').elem('intro').velocity({
                properties: "transition.fadeIn",
                options: {
                  duration: 300
                }
              });
            }
          }
        }
      });
    } else {
      return $('.structure .button').velocity({
        properties: "transition.fadeIn",
        options: {
          duration: 300
        }
      });
    }
  };

  this.getCaptcha = function() {
    return $.get('/include/captcha.php', function(data) {
      return setCaptcha(data);
    });
  };

  this.setCaptcha = function(code) {
    $('input[name=captcha_sid]').val(code);
    return $('.captcha').css('background-image', "url(/include/captcha.php?captcha_sid=" + code + ")");
  };

  $(document).ready(function() {
    var sHeight, scrollTimer, x;
    if ($('.geography').length > 0) {
      $('.geography__popup_content').spin(spinOptions);
      $.getScript('http://api-maps.yandex.ru/2.1/?lang=' + $('.geography #map').data('lang'), function() {
        if (window.location.hash) {
          $('.geography-filter a[href^="' + window.location.hash + '"]').trigger('click');
        }
        return ymaps.ready(initGeography);
      });
    }
    initPhotoSwipeFromDOM('.news__gallery');
    initPhotoSwipeFromDOM('.gallery');
    if ($('.slider').length > 0) {
      $('.slider').on('fotorama:ready', function() {
        $('.slider .fotorama__arr--prev').load('/layout/images/svg/slider-arrow-left.svg');
        return $('.slider .fotorama__arr--next').load('/layout/images/svg/slider-arrow-right.svg');
      }).fotorama({
        height: $(window).height() - $('.slider').offset().top
      });
    }
    $('.search a').click(function(e) {
      $('.search').elem('form').velocity({
        properties: "transition.slideDownIn",
        options: {
          duration: 300
        }
      });
      delay(10000, function() {
        if ($('.search input').val() === '') {
          return $('.search').elem('form').velocity({
            properties: "transition.slideUpOut",
            options: {
              duration: 300
            }
          });
        }
      });
      $('.search').on('mouseleave', function() {
        return $('.search').elem('form').velocity({
          properties: "transition.slideUpOut",
          options: {
            duration: 300
          }
        });
      });
      return e.preventDefault();
    });

    /*
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
     */
    $('.cert').elem('picture').click(function(e) {
      var gallery, galleryOptions, items, pswpElement;
      pswpElement = document.querySelectorAll('.pswp')[0];
      items = $(this).data('pictures');
      galleryOptions = {
        history: false,
        focus: false,
        shareEl: false
      };
      gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, galleryOptions);
      gallery.init();
      return e.preventDefault();
    });
    $('.slider__down').click(function(e) {
      var offset;
      offset = $(".sections").offset().top;
      $('html, body').animate({
        'scrollTop': offset
      }, 300);
      return e.preventDefault();
    });
    $('.history__slider a').click(function(e) {
      var id;
      $('.history .slick-active.active').removeClass('active');
      $(this).parents('.slick-slide').addClass('active');
      $('.history__content-block').mod('active', false);
      id = $(this).attr('href');
      $(id).addClass('history__content-block--active');
      checkArrows();
      return e.preventDefault();
    });
    $('.history').elem('slider').on('init', function(event, slick, direction) {
      $('.history .slick-active:last').addClass('last');
      $('.history .slick-active:first').addClass('active');
      return $('.history button').off('click').on('click', function(e) {
        var id, index;
        if (!$('.history').elem('slider').data('action')) {
          if (!$(this).hasClass('slick-disabled')) {
            index = $('.history .slick-active.active').data('slick-index');
            if ($(this).hasClass('slick-next')) {
              index += 2;
              if ($('.history .slick-active:last').hasClass('active')) {
                $('.history').elem('slider').slick('slickNext');
              }
            } else if ($(this).hasClass('slick-prev')) {
              if ($('.history .slick-active:first').hasClass('active')) {
                $('.history').elem('slider').slick('slickPrev');
              }
            }
            $('.history .slick-active.active').removeClass('active');
            $(".history .slick-slide:nth-child(" + index + ")").addClass('active');
            $('.history__content-block').mod('active', false);
            id = $('.history .slick-active.active a').attr('href');
            $(id).addClass('history__content-block--active');
          }
          checkArrows();
        }
        return e.preventDefault();
      });
    }).on('beforeChange', function(event, slick, direction) {
      $('.history').elem('slider').data('action', true);
      return $('.history .slick-active.last').removeClass('last');
    }).on('afterChange', function(event, slick, direction) {
      $('.history').elem('slider').data('action', false);
      $('.history .slick-active:last').addClass('last');
      return false;
    }).slick({
      infinite: false,
      draggable: false,
      slidesToShow: 8,
      slidesToScroll: 1,
      nextArrow: "<button type=\"button\" class=\"slick-next\">" + ($('.arrow__next').html()) + "</button>",
      prevArrow: "<button type=\"button\" class=\"slick-prev\">" + ($('.arrow__prev').html()) + "</button>",
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 7
          }
        }, {
          breakpoint: 992,
          settings: {
            slidesToShow: 5
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 4
          }
        }, {
          breakpoint: 480,
          settings: {
            slidesToShow: 2
          }
        }
      ]
    });
    $('.steps').elem('title').click(function(e) {
      var section;
      section = $(this).parents('.steps__section');
      if (!section.hasMod('open')) {
        section.mod('open', true);
        section.find('.steps__content').velocity({
          properties: "transition.fadeIn",
          options: {
            duration: 300
          }
        });
      } else {
        section.mod('open', false);
        section.find('.steps__content').velocity({
          properties: "transition.fadeOut",
          options: {
            duration: 300
          }
        });
      }
      return e.preventDefault();
    });
    $('.steps').elem('sub-title').click(function(e) {
      var section;
      section = $(this).parents('.steps__sub-content');
      if (!section.hasMod('open')) {
        section.mod('open', true);
        section.find('.steps__text').velocity({
          properties: "transition.fadeIn",
          options: {
            duration: 300
          }
        });
      } else {
        section.mod('open', false);
        section.find('.steps__text').velocity({
          properties: "transition.fadeOut",
          options: {
            duration: 300
          }
        });
      }
      return e.preventDefault();
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('.reference-wrap').elem('trigger').click(function(e) {
      var block, content;
      block = $(this).block();
      content = $(this).block('content');
      if (!block.hasMod('open')) {
        content.velocity({
          properties: "transition.fadeIn",
          options: {
            duration: 300,
            complete: function() {
              return block.mod('open', true);
            }
          }
        });
      } else {
        content.velocity({
          properties: "transition.fadeOut",
          options: {
            duration: 300,
            complete: function() {
              return block.mod('open', false);
            }
          }
        });
      }
      return e.preventDefault();
    });
    $('.reference').elem('trigger').click(function(e) {
      var block, content;
      block = $(this).block();
      content = $(this).block('content');
      if (!block.hasMod('open')) {
        content.velocity({
          properties: "transition.fadeIn",
          options: {
            duration: 300,
            complete: function() {
              return block.mod('open', true);
            }
          }
        });
      } else {
        content.velocity({
          properties: "transition.fadeOut",
          options: {
            duration: 300,
            complete: function() {
              return block.mod('open', false);
            }
          }
        });
      }
      return e.preventDefault();
    });
    $('.structure').elem('link').on('click', function(e) {
      var id, link;
      id = $(this).attr('href');
      link = $(this);
      if ($(id).length > 0 && !link.hasMod('open')) {
        link.mod('open', true);
        $('.structure').elem('intro').velocity({
          properties: "transition.fadeOut",
          options: {
            duration: 300,
            complete: function() {
              checkStructure();
              return $(id).velocity({
                properties: "transition.fadeIn",
                options: {
                  duration: 300,
                  complete: function() {
                    return $(id).mod('open', true);
                  }
                }
              });
            }
          }
        });
      }
      return e.preventDefault();
    });
    $('.structure .button').on('click', function(e) {
      checkStructure(true);
      return e.preventDefault();
    });
    sHeight = 490;
    if ($(window).width() <= 375) {
      sHeight = 420;
    }
    $('.success-story').on('fotorama:ready', function() {
      $('.fotorama__arr--prev').html($('.arrow__prev').html());
      return $('.fotorama__arr--next').html($('.arrow__next').html());
    }).fotorama({
      height: sHeight
    });
    $('.file-trigger').click(function(e) {
      $(this).parent().find('input[type=file]').trigger('click');
      return e.preventDefault();
    });
    $('input[type=file]').on('change', function() {
      $('.form .file-trigger').removeClass('error');
      return $('.file-name').text($(this).val().replace(/.+[\\\/]/, ""));
    });
    $('#vacancyDetail').on('show.bs.modal', function(e) {
      $('#vacancyDetail .form').show();
      $('#vacancyDetail .success').hide();
      if ($(e.relatedTarget).parents('.vacancy').length > 0) {
        $('#vacancyDetail h3').text($(e.relatedTarget).parents('.vacancy').elem('title').text());
        $('#vacancyDetail h3').prepend("<span>Отклик на вакансию</span>");
        return $('input[name="vacancy"]').val($(e.relatedTarget).parents('.vacancy').data('id'));
      } else {
        $('#vacancyDetail h3').text('Отправка резюме в базу соискателей');
        $('#vacancyDetail h3 span').remove();
        return $('input[name="vacancy"]').val(false).removeAttr('value');
      }
    });
    $('#Map').on('show.bs.modal', function() {
      if (!$('#Map').data('map')) {
        return $.getScript('//api-maps.yandex.ru/2.1/?lang=ru_RU', function() {
          return ymaps.ready(initContacts);
        });
      }
    });
    $('.feedback').elem('form').submit(function(e) {
      var data;
      e.preventDefault();
      data = $(this).serialize();
      return $.post('/include/send.php', data, function(data) {
        data = $.parseJSON(data);
        if (data.status === "ok") {
          $('.feedback').elem('form').hide().addClass('hidden');
          return $('.feedback').elem('success').show().removeClass('hidden');
        } else if (data.status === "error") {
          $('input[name=captcha_word]').addClass('parsley-error');
          return getCaptcha();
        }
      });
    });
    $('#vacancyDetail .form').submit(function(e) {
      var data;
      data = new FormData(this);
      $.ajax({
        type: 'POST',
        url: '/include/send.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        success: function(data) {
          data = $.parseJSON(data);
          if (data.status === "ok") {
            $('#vacancyDetail .form').hide();
            return $('#vacancyDetail .success').show();
          } else if (data.status === "error") {
            $('#vacancyDetail input[name=captcha_word]').addClass('parsley-error');
            return getCaptcha();
          }
        }
      });
      return e.preventDefault();
    });
    $('a.captcha_refresh, a.captcha__refresh').click(function(e) {
      getCaptcha();
      return e.preventDefault();
    });
    initDropdown();
    x = void 0;
    $(window).resize(function() {
      clearTimeout(x);
      return x = delay(200, function() {
        return sizeAction();
      });
    });
    scrollTimer = false;
    $(window).scroll(function() {
      clearTimeout(scrollTimer);
      if (!$('.scroll-fix').hasMod('on')) {
        $('.scroll-fix').mod('on', true);
      }
      return scrollTimer = delay(300, function() {
        return $('.scroll-fix').mod('on', false);
      });
    });
    return delay(300, function() {
      return sizeAction();
    });
  });

}).call(this);
