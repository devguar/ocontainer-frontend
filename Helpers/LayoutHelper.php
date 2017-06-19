<?php
/**
 * Created by PhpStorm.
 * User: lucas.guarnieri
 * Date: 19/06/2017
 * Time: 14:47
 */

namespace Devguar\OContainer\Frontend\Helpers;

class LayoutHelper
{
    public static function openCard($title = null){
        $panel = '<div class="panel panel-default">';

        if ($title){
            $panel .= '<div class="panel-body">';
            $panel .= $title;
            $panel .= '</div>';
        }

        $panel .= '<div class="panel-body">';

        return $panel;
    }

    public static function closeCard(){
        return '</div></div>';
    }
}