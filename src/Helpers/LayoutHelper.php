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

    public static function buttonDinamic($url, $name, $color, $icon, $label, $justIcon = false)
    {
        $element = "<a href='$url' name='btn_$name' id='btn_$name' class='btn btn-$color title='$label'";

        if ($justIcon){
            $element .= " mask-tooltip";
        }

        $element .= "'><span class='glyphicon glyphicon-$icon'></span>";

        if (!$justIcon){
            $element .= " $label";
        }

        $element .= "</a>";

        return $element;
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

    public static function buttonRead($url)
    {
        return self::buttonDinamic($url, "read", "default", "zoom-in", "Visualizar");
    }

    public static function buttonReadIcon($url)
    {
        return self::buttonDinamic($url, "read", "default", "zoom-in", "Visualizar", true);
    }

    public static function buttonEdit($url)
    {
        return self::buttonDinamic($url, "edit", "default", "pencil", "Editar");
    }

    public static function buttonEditIcon($url)
    {
        return self::buttonDinamic($url, "edit", "default", "pencil", "Editar", true);
    }

    public static function buttonDelete($url)
    {
        return self::buttonDinamic($url, "delete", "danger", "trash", "Excluir");
    }

    public static function buttonDeleteIcon($url)
    {
        return self::buttonDinamic($url, "delete", "danger", "trash", "Excluir", true);
    }

    public static function buttonPay($url)
    {
        return self::buttonDinamic($url, "pay", "success", "ok", "Pagar");
    }

    public static function buttonPayIcon($url)
    {
        return self::buttonDinamic($url, "pay", "success", "ok", "Pagar", true);
    }

    public static function buttonCancel($url)
    {
        return self::buttonDinamic($url, "cancel", "danger", "remove", "Cancelar");
    }

    public static function buttonCancelIcon($url)
    {
        return self::buttonDinamic($url, "cancel", "danger", "remove", "Cancelar", true);
    }








}