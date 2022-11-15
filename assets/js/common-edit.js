$(function(){
  const chat_id = '-1001200543787';
  const heightRevBlock = 207;

  const showPosts = function( config, data ) {
    let containerClass = config.containerClass;
    let limit = config.limit;
    console.log(config);
    console.log('check page exist',"page" in config);
    let i = 0;

    let result = data.map((post) => {
      let date = new Date(post.date * 1000);
      date = date.toLocaleString().slice(0, 10);

      if(post.message === ''){
        return '';
      }
      i++;
      if(i > limit){
        return '';
      }
      return `<div class="blog-item"><div class="date">${date}</div><div class="desc" style="max-height: ${heightRevBlock}px"> <div class="text">${post.message}</div></div> <div class="show-all" style="padding-top: 30px">${LANG_ARR['show_all']}</div></div>`;
    }).join('');
    if(containerClass === '.blog-container'){
      result = '<div class="blog-grid">'+result+'</div>';
    }
    document.querySelector(containerClass).innerHTML = result;
    document.querySelectorAll( `${containerClass} .blog-item`).forEach(item=>{
      if(item.querySelector('.text').clientHeight < heightRevBlock){
        item.querySelector('.show-all').remove();
      }
    })
  }
  const preloaderHTML = `
      <div class="lds-roller">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
      `;
  if(!!document.querySelector('.home-page')){
    const containerClass = '.blog-last-slider';
    $.ajax({
      url: "https://shcerbina.oleksandr.pravoedelo.ua/showMessages.php",
      method: 'POST',
      data: {limit:3,chat_id:chat_id},
      dataType: 'json',
      beforeSend: function(  ) {
        document.querySelector(containerClass).innerHTML = preloaderHTML;
      }
    })
      .done(showPosts.bind(null, {containerClass, limit: 3}))
      .fail(function (){
        document.querySelector(containerClass).innerHTML = '<div>Error</div>';
      });

    $.ajax({
      url: "https://shcerbina.oleksandr.pravoedelo.ua/getAllMessages.php",
      method: 'POST',
      data: {limit:100,chat_id:chat_id},
      dataType: 'json',
    })
      .done(showPosts.bind(null, {containerClass, limit: 3}))
      .fail(function (){
        console.log('error parse all posts')
      });
  }


  if(!!document.querySelector('.blog-page')){
    const containerClass = '.blog-container';
    const limit = 12;

    $.ajax({
      url: "https://shcerbina.oleksandr.pravoedelo.ua/showMessages.php",
      method: 'POST',
      data: {chat_id},
      dataType: 'json',
      beforeSend: function(  ) {
        document.querySelector(containerClass).innerHTML = preloaderHTML;
      }
    })
      .done(showPosts.bind(null, {containerClass, limit: 12}))
      .fail(function (){
        document.querySelector(containerClass).innerHTML = '<div>Error</div>';
      });

    $.ajax({
      url: "https://shcerbina.oleksandr.pravoedelo.ua/getAllMessages.php",
      method: 'POST',
      data: {limit:100,chat_id:chat_id},
      dataType: 'json',
    })
      .fail(function (){
        console.log('error parse all posts')
      });


    $('.show-posts').on('click', function(){
      let page = parseInt(this.getAttribute('data-page'));
      let offset = (page - 1) * limit;
      let postsHTML = '';
      let textShowMore = document.querySelector('.show-posts').innerHTML;
      const stringToHTML = function (str) {
        let parser = new DOMParser();

        let doc = parser.parseFromString(str, 'text/html');
        // let containerBlog = document.createElement('div').classList().add('blog-grid');
        return doc.querySelectorAll('.blog-item');
      };
      $.ajax({
        url: "https://shcerbina.oleksandr.pravoedelo.ua/showMessages.php",
        method: 'POST',
        data: {chat_id},
        dataType: 'json',
        beforeSend: function(  ) {
          postsHTML = document.querySelector(containerClass).innerHTML;

          document.querySelector('.show-posts').innerHTML = preloaderHTML;
        }
      })
        .done(function( data ) {
          let i = 0;
          // let show_data = data.slice(offset-1, offset+limit+5);
          data = data.slice(offset-1, offset+limit+5);
          console.log(data);
          let testRes = '<div class="blog-grid">'+data.map((post) => {
            if(post.message === ''){
              return '';
            }
            i++;
            if(i > limit){
              return '';
            }
            let date = new Date(post.date * 1000);
            date = date.toLocaleString().slice(0, 10);

            return `<div class="blog-item"><div class="date">${date}</div><div class="desc" style="max-height: ${heightRevBlock}px"> <div class="text">${post.message}</div></div> <div class="show-all">${LANG_ARR['show_all']}</div></div>`;
          }).join('')+'</div>';

          stringToHTML(testRes).forEach(item=>{
            document.querySelector(containerClass).querySelector('.blog-grid').append(item);
          })
          console.log(data.length);

          document.querySelector('.show-posts').innerHTML = data.length === limit+6?textShowMore:'';
          document.querySelector('.show-posts').setAttribute('data-page',page+1);
          document.querySelectorAll( `${containerClass} .blog-item`).forEach(item=>{
            if(item.querySelector('.text').clientHeight < heightRevBlock && !!item.querySelector('.show-all')){
              item.querySelector('.show-all').remove();
            }
          })
        })
        .fail(function (){
          document.querySelector(containerClass).innerHTML = '<div>Error</div>';
        });
    })
  }

  $('.container').on('click','.show-all', function(){
    if($(this).parent().find('.desc').css('max-height') === heightRevBlock+'px'){
      $(this).parent().find('.desc').css({'max-height':$(this).parent().find('.text').height() })
      $(this).text(LANG_ARR['hide_all']);
    }else{
      $(this).parent().find('.desc').css({'max-height':heightRevBlock+'px'})
      $(this).text(LANG_ARR['show_all']);
    }
  })
  let windowWidth = window.innerWidth;

  let revSlider = new Swiper('.swiper-review', {
    slidesPerView: 3,
    spaceBetween: 30,
    speed: 700,
    centeredSlides: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    loop: true,
    on: {
      click: function(slider, event){
        let slideClicked = slider.clickedSlide.dataset.swiperSlideIndex;
        let $detailBlock = $('.review-contents .review-item[data-testimonial="'+slideClicked+'"]:not(.un-open)');
        if(!$detailBlock.hasClass('view')){
          let $testimonialBlock =  $('section.review-section');
          // $('.testimonial').removeClass('stage2');
          setTimeout(()=>{
            $testimonialBlock.removeClass('stage2');
          },100);
          setTimeout(()=>{
            $testimonialBlock.removeClass('stage1');
          },200);
          setTimeout(()=>{
            $('.review-contents .review-item.view').removeClass('view');
          },350);

          setTimeout(()=>{
            $detailBlock.addClass('view');
          },600);

          setTimeout(()=>{
            $testimonialBlock.addClass('stage1');
          },700);
          setTimeout(()=>{
            $testimonialBlock.addClass('stage2');
          },850);
        }

        if(slider.clickedIndex !== slider.activeIndex){
          let centerWindow = window.innerWidth/2;
          if(event.x > centerWindow){
            this.slideNext();
          }else{
            this.slidePrev();
          }
        }
      },
      transitionEnd: function(slider){
        let slideClicked = slider.realIndex;

        if($('.review-section').hasClass('open-review')){
          let $detailBlock = $('.review-contents .review-item[data-testimonial="'+slideClicked+'"]:not(.un-open)');
          if(!$detailBlock.hasClass('view')){
            let $testimonialBlock =  $('section.review-section');
            // $('.testimonial').removeClass('stage2');
            setTimeout(()=>{
              $testimonialBlock.removeClass('stage2');
            },100);
            setTimeout(()=>{
              $testimonialBlock.removeClass('stage1');
            },200);
            setTimeout(()=>{
              $('.review-contents .review-item.view').removeClass('view');
            },250);

            setTimeout(()=>{
              $detailBlock.addClass('view');
            },600);

            setTimeout(()=>{
              $testimonialBlock.addClass('stage1');
            },700);
            setTimeout(()=>{
              $testimonialBlock.addClass('stage2');
            },750);
          }
          if($('.review-contents .review-item[data-testimonial="'+slideClicked+'"]').hasClass('un-open')){
            $('.review-section').removeClass('open-review');
          }
        }
      }
    }
  });
  $('.review-desktop .review-logo:not(.un-open)').on('click', function(){
    setTimeout(function(){
      $('.review-section').addClass('open-review');
    }, 500);
  });

  $('.review-mobile .review-logo:not(.un-open)').on('click', function(){
    let $this = $(this).parent();
    if($this.is('.open-review')){
      $('.review-item.open-review .review-content').slideUp();
      $('.review-item').removeClass('open-review');
    }else{
      setTimeout(function(){
        $this.addClass('open-review');
        $this.find('.review-content').slideToggle();
      }, 100);
    }
  });

  let clientLogos = new Swiper('.clients-logo-section .swiper', {
    slidesPerView: 3,
    spaceBetween: 20,
    slideToClickedSlide: true,
    autoplay: {
      delay: 2000,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      310: {
        slidesPerView: 1,
      },
      767: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      }
    }

  });

  if($('.swiper-main .swiper').length){
    if($('.swiper-thumbs .swiper').length){
      let revThumb = new Swiper('.swiper-thumbs .swiper', {
        slidesPerView: 3,
        spaceBetween: 10,
        direction: 'vertical',
        centerInsufficientSlides: true,
        slideToClickedSlide: true,
        navigation: {
          nextEl: '.swiper-button-thumb-next',
          prevEl: '.swiper-button-thumb-prev',
        },
        breakpoints: {
          310: {
            direction: 'horizontal',
          },
          991: {
            direction: 'horizontal',
          },
          992: {
            direction: 'vertical',
          }
        }
      });
      let revMain = new Swiper('.swiper-main .swiper', {
        slidesPerView: 1,
        spaceBetween: 0,

        navigation: {
          nextEl: '.swiper-button-rev-next',
          prevEl: '.swiper-button-rev-prev',
        },
        thumbs: {
          swiper: revThumb,
        },
        on: {
          slideChange: function () {
            let activeIndex = this.activeIndex + 1;

            let activeSlide = document.querySelector(`.swiper-thumbs .swiper-slide:nth-child(${activeIndex})`);
            let nextSlide = document.querySelector(`.swiper-thumbs .swiper-slide:nth-child(${activeIndex + 1})`);
            let prevSlide = document.querySelector(`.swiper-thumbs .swiper-slide:nth-child(${activeIndex - 1})`);
            console.log(this.thumbs.swiper);
            if (nextSlide && !nextSlide.classList.contains('swiper-slide-visible')) {
              this.thumbs.swiper.slideNext()
            } else if (prevSlide && !prevSlide.classList.contains('swiper-slide-visible')) {
              this.thumbs.swiper.slidePrev()
            }
          }
        }
      });
    }else{
      let revMain = new Swiper('.swiper-main .swiper', {
        slidesPerView: 1,
        spaceBetween: 0,
      });
    }
  }

  let servicesList = new Swiper('.services-mobile-slider .swiper', {
    slidesPerView: 'auto',
    spaceBetween: 20,
    centeredSlides: 'true',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
  });
  if ($(window).scrollTop() > 50) {
    $('header').addClass('scroll');
  }else{
    $('header').removeClass('scroll');
  }
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $('header').addClass('scroll');
    }else{
      $('header').removeClass('scroll');
    }
  });
  $('.pll-parent-menu-item > a').on('click', function(e){
    e.preventDefault();
  });
  $('.pll-parent-menu-item').hover(function(){
    $('.col-menu').toggleClass('open-lang');
  });
  $('.service-item-wrapper').on('click', function(e){
    let $servItem = $(this);
    let $openServ = $('.service-item-wrapper.open');
    if(!$servItem.is('.open')){
      $openServ.find('.open-service-block').slideUp();
      $openServ.removeClass('open');
    }
    $servItem.toggleClass('open');
    $servItem.find('.open-service-block').slideToggle();
  });

  $('.services-mobile-slider .service-item').on('click', function(){
    let $servItem = $(this);
    let $openServ = $('.service-item.open');
    if(!$servItem.is('.open')){
      $openServ.find('.open-service-block').slideUp();
      $openServ.removeClass('open');
      $servItem.find('.open-service-block').slideDown();
    }else{
      $servItem.find('.open-service-block').slideUp();
    }
    $servItem.toggleClass('open');
  });

  $('.col-mobile-btn').on('click', function(){
    let $body = $('body');
    let $toTop = $(window).scrollTop();
    $body.toggleClass('open-menu');

    if(windowWidth < 992){
      if($body.is('.open-menu')){
        $('header').removeClass('scroll');
      }else{
        if($toTop !== 0){
          $('header').addClass('scroll');
        }
      }
    }
  });
  $('.col-menu nav a').on('click', function(){
    if(windowWidth <= 991){
      $('.col-mobile-btn').trigger('click');
    }
  });
});