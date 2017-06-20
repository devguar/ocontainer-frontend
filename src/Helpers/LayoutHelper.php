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
    const sizeSmall = 1;
    const sizeMedium = 2;
    const sizeLarge = 3;

    /*
     * Criar o card
     */
    public static function openCard($title = null){
        $panel = '<div class="panel panel-default">';

        if ($title){
            $panel .= '    <div class="panel-heading">'.$title.'</div>';
        }

        $panel .= '    <div class="panel-body">';

        return $panel;
    }

    /*
     * Fechar o card
     */
    public static function closeCard(){
        return '</div></div>';
    }

    /*
     * Criar o card com form
     */

    public static function openCardForm($details){
        $title = isset($details['title']) ? $details['title'] : null;
        $div = self::openCard($title);
        $div .= \Form::open($details);
        return $div;
    }

    /*
     * Fechar o card form
     */

    public static function closeCardForm(){
        $div = \Form::close();
        $div .= self::closeCard();

        return $div;
    }



    public static function buttonSave(){
        return self::buttonSubmit('Salvar','salvar_formulario');
    }

    public static function buttonSubmit($label,$name = null){
        return \Form::submit($label, array('class' => 'btn btn-primary','name'=>$name));
    }

    public static function buttonPrevious(){
        return '<a href="'.\URL::previous().'" name="previous" class="btn btn-default">Voltar</a>';
    }
}