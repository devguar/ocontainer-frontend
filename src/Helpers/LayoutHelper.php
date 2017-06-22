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
    public static function openCard($title = null)
    {
        $panel = '<div class="panel panel-default">';

        if ($title) {
            $panel .= '    <div class="panel-heading">' . $title . '</div>';
        }

        $panel .= '    <div class="panel-body">';

        return $panel;
    }

    /*
     * Fechar o card
     */
    public static function closeCard()
    {
        return '</div></div>';
    }

    /*
     * Criar o card com form
     */

    public static function openCardForm($details)
    {
        $title = isset($details['title']) ? $details['title'] : null;
        $div = self::openCard($title);
        $div .= \Form::open($details);
        return $div;
    }

    /*
     * Fechar o card form
     */

    public static function closeCardForm()
    {
        $div = \Form::close();
        $div .= self::closeCard();

        return $div;
    }

    public static function buttonDinamic($url, $name, $color, $icon, $label)
    {
        return "<a href='$url' name='btn_$name' id='btn_$name' class='btn btn-$color'><span class='glyphicon glyphicon-$icon'></span> $label</a>";
    }

    public static function buttonSave()
    {
        return self::buttonSubmit('Salvar', 'salvar_formulario');
    }

    public static function buttonSubmit($label,$name = null)
    {
        return \Form::submit($label, array('class' => 'btn btn-primary', 'name' => 'btn_'.strtolower($name), 'id' => 'btn_'.strtolower($name)));
    }

    public static function buttonPrevious()
    {
        return self::buttonDinamic(\URL::previous(), "previous", "default", "back", "Voltar");
    }
    
    public static function buttonEdit($url)
    {
        return self::buttonDinamic($url, "edit", "default", "pencil", "Editar");
    }

    public static function buttonDelete($url)
    {
        return self::buttonDinamic($url, "delete", "danger", "trash", "Excluir");
    }



}