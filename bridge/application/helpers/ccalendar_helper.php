<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists ( 'change_day' ) ) {
    function change_day ( $opt = '', $lang ) {
        switch($lang){
            case 'en':
                switch(strtolower($opt)){
                    case 'sun':
                    case 'dom':
                        $day    = 'Sun';
                        break;
                    case 'mon':
                    case 'lun':
                        $day    = 'Mon';
                        break;
                    case 'tue':
                    case 'mar':
                        $day    = 'Tue';
                        break;
                    case 'wed':
                    case 'mie':
                        $day    = 'Wed';
                        break;
                    case 'thu':
                    case 'jue':
                        $day    = 'Thu';
                        break;
                    case 'fri':
                    case 'vie':
                        $day    = 'Fri';
                        break;
                    case 'sat':
                    case 'sab':
                        $day    = 'Sat';
                        break;
                }
                break;
            case 'es':
            default:
                switch(strtolower($opt)){
                    case 'sun':
                    case 'dom':
                        $day    = 'Dom';
                        break;
                    case 'mon':
                    case 'lun':
                        $day    = 'Lun';
                        break;
                    case 'tue':
                    case 'mar':
                        $day    = 'Mar';
                        break;
                    case 'wed':
                    case 'mie':
                        $day    = 'Mie';
                        break;
                    case 'thu':
                    case 'jue':
                        $day    = 'Jue';
                        break;
                    case 'fri':
                    case 'vie':
                        $day    = 'Vie';
                        break;
                    case 'sat':
                    case 'sab':
                        $day    = 'Sab';
                        break;
                }
                break;
        }
        
        return $day;
    }
}
