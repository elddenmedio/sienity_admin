<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Get picture by weather
 */
if ( ! function_exists ( 'get_img_type' ) ) {
    function get_img_type ( $opt = '' ) {
        switch(strtolower($opt)){
            case 'cloudy'://nublado
                $_img   = 'cloudy';
                break;
            case 'rain'://lluvioso
                $_img   = 'rain';
                break;
            case 'showers'://chuvascos
            case 'scattered showers'://chuvascos dispersos
                $_img   = 'showers';
                break;
            case 'mostly cloudy'://mayormente nublado
            case 'partly cloudy'://parcialmente nublado
                $_img   = 'cloudy2';
                break;
            case 'scattered thunderstorms'://tormentas electricas dispersas
                $_img   = 'thunderstorms';
                break;
            default:
                $_img   = 'unknow';
                break;
        }

        return $_img;
    }   
}

/*
 * Get F or C by language
 */
if ( ! function_exists ( 'get_c_f' )){
    function get_c_f ( $opt, $lang ) {
        switch($lang){
            case 'en':
                $return = round((int) $opt) . ' °F';
                break;
            case 'es':
                $return = round(( (int) $opt - 32) / 1.8) . ' °C';
            default:
                break;
        }
        
        return $return;
    }
}

