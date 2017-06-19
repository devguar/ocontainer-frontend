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
            $panel .= '<div class="panel-heading">';
            $panel .= $title;
            $panel .= '</div>';
        }

        $panel .= '<div class="panel-body">';

        return $panel;
    }

    public static function closeCard(){
        return '</div></div>';
    }

    public static function openSmallFormCard($title = null){
        return '<div class="row"><div class="col-lg-8 col-md-10 col-sm-12">'.self::openCard($title);
    }

    public static function closeFormCard(){
        return self::closeCard().'</div></div>';
    }

    public static function buttonsSubmitAndBack(){
        $div = '<div class="form-group">';
        $div .= '<div class="col-sm-offset-2 col-sm-10">';
        $div .= \Form::submit('Salvar', array('class' => 'btn btn-primary'));
        $div .= '<a href="'.\URL::previous().'" name="previous" class="btn btn-default">Voltar</a>';
        $div .= '</div>';
        $div .= '</div>';
        return $div;
    }
}