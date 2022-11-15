<?php

register_nav_menus(array(
    'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
));

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title' 	=> 'Основные настройки сайта',
        'menu_title'	=> 'Основные настройки',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
    
}
// language function
function myLanguage($stringName){
    
    if(get_locale() == 'uk'){
        // Ukrainian
        $language['blog-page'] = 8;
        $language['swiper-prev'] = 'Назад';
        $language['swiper-next'] = 'Далі';
        
        $language['call-btn'] = 'Подзвонити';
        $language['service-detail-show'] = 'Детальніше';
        $language['service-detail-hide'] = 'Сховати';
        $language['view-all-btn'] = 'Подивитися всі';
        $language['view-more-btn'] = 'Показати ще';
        
        $language['footer-title'] ='Контакти';
        $language['footer-phone-title'] ='Звертайтесь 24/7';
        $language['footer-social'] ='Мої соц. мережі:';
        $language['footer-address'] ='Адреса офісу:';
        $language['footer-map-link'] ='Адреса офісу на мапі';
        $language['footer-telega'] ='Мій телеграм-канал';
        $language['footer-detail'] ='Детальніше про ЮК "Правое дело"';
        $language['footer-detail-btn'] ='Перейти на сайт';
        
        $language['page404-title'] ='На Жаль такої сторінки не існує';
        
    }else{
        // Russian
        $language['blog-page'] = 133;
        
        $language['swiper-prev'] = 'Назад';
        $language['swiper-next'] = 'Дальше';
        
        $language['call-btn'] = 'Позвонить';
        $language['service-detail-show'] = 'Подробнее';
        $language['service-detail-hide'] = 'Скрыть';
        $language['view-all-btn'] = 'Посмотреть все';
        $language['view-more-btn'] = 'Показать еще';
        
        $language['footer-title'] ='Контакты';
        $language['footer-phone-title'] ='Обращайтесь 24/7';
        $language['footer-social'] ='Мои соц. сети:';
        $language['footer-address'] ='Адрес офиса:';
        $language['footer-map-link'] ='Адрес офиса на карте';
        $language['footer-telega'] ='Мой телеграм-канал';
        $language['footer-detail'] ='Подробнее о ЮК "Правое дело"';
        $language['footer-detail-btn'] ='Перейти на сайт';
        
        $language['page404-title'] ='К сожалению такой страницы не существует';
        
        
    }
    return $language[$stringName];
}