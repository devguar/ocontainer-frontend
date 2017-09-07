<?php
/**
 * Created by PhpStorm.
 * User: lucas.guarnieri
 * Date: 19/06/2017
 * Time: 14:47
 */

namespace Devguar\OContainer\Frontend\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class LayoutHelper
{
    protected static $classCard = 'panel-default';
    protected static $classCardHeader = 'header';
    protected static $classCardBody = 'body';

    protected static $iconEdit = 'pencil';
    protected static $iconDelete = 'trash';
    protected static $iconRead = 'zoom-in';
    protected static $iconEmail = 'envelope';
    protected static $iconPay = 'ok';
    protected static $iconBack = 'back';
    protected static $iconCancel = 'remove';

    protected static function makeHeaderCard($title){
        return '<div class="'.static::$classCardHeader.'">' . $title . '</div>';
    }

    protected static function makeIcon($icon){
        return '<span class="glyphicon glyphicon-'.$icon.'"></span>';
    }

    protected static function makeButtonClass($color, $justIcon){
        return 'btn btn-'.$color;
    }

    protected static function makeButtonLabel($label){
        return " $label";
    }


    /*
     * Criar o card
     */
    public static function openCard($title = null, $options = array())
    {
        $class = static::$classCard;

        if (isset($options['class'])){
            $class .= ' '.$options['class'];

            if(App::environment('testing')){
                $class .= '-testing';
            }
        }

        $panel = '<div class="'.$class.'">';

        if ($title) {
            $panel .= static::makeHeaderCard($title);
        }

        $panel .= '<div class="'.static::$classCardBody.'">';

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

    public static function buttonDinamic($url, $name, $color, $icon, $label, $justIcon = false, $options = array())
    {
        $element = "<a href='$url' name='btn_$name' id='btn_$name' title='$label' class='".static::makeButtonClass($color, $justIcon);

        if ($justIcon){
            $element .= " mask-tooltip";
        }

        $element .= "'";

        if (count($options) > 0){
            foreach ($options as $option => $value){
                $element .= " $option = '$value'";
            }
        }

        $element .= ">";

        if(App::environment('testing')){
            $element .= $label;
        }else{
            $element .= static::makeIcon($icon);

            if (!$justIcon){
                $element .= static::makeButtonLabel($label);
            }
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
        return \Form::submit($label, array('class' => static::makeButtonClass('primary', false), 'name' => 'btn_'.strtolower($name), 'id' => 'btn_'.strtolower($name)));
    }

    public static function buttonPrevious()
    {
        return self::buttonDinamic(\URL::previous(), "previous", "default", static::$iconBack, "Voltar");
    }

    public static function buttonPreviousIcon()
    {
        return self::buttonDinamic(\URL::previous(), "previous", "default", static::$iconBack, "Voltar", true);
    }

    public static function buttonRead($url)
    {
        return self::buttonDinamic($url, "read", "default", static::$iconRead, "Visualizar");
    }

    public static function buttonReadIcon($url)
    {
        return self::buttonDinamic($url, "read", "default", static::$iconRead, "Visualizar", true);
    }

    public static function buttonEdit($url)
    {
        return self::buttonDinamic($url, "edit", "default", static::$iconEdit, "Editar");
    }

    public static function buttonEditIcon($url)
    {
        return self::buttonDinamic($url, "edit", "default", static::$iconEdit, "Editar", true);
    }

    public static function buttonDelete($url)
    {
        return self::buttonDinamic($url, "delete", "danger", static::$iconDelete, "Excluir");
    }

    public static function buttonDeleteIcon($url)
    {
        return self::buttonDinamic($url, "delete", "danger", static::$iconDelete, "Excluir", true);
    }

    public static function buttonPay($url)
    {
        return self::buttonDinamic($url, "pay", "success", static::$iconPay, "Pagar");
    }

    public static function buttonPayIcon($url)
    {
        return self::buttonDinamic($url, "pay", "success", static::$iconPay, "Pagar", true);
    }

    public static function buttonCancel($url)
    {
        return self::buttonDinamic($url, "cancel", "danger", static::$iconCancel, "Cancelar");
    }

    public static function buttonCancelIcon($url)
    {
        return self::buttonDinamic($url, "cancel", "danger", static::$iconCancel, "Cancelar", true);
    }

    public static function buttonEmail($url)
    {
        return self::buttonDinamic($url, "email", "default", static::$iconEmail, "Enviar email");
    }

    public static function buttonEmailIcon($url)
    {
        return self::buttonDinamic($url, "email", "default", static::$iconEmail, "Enviar email", true);
    }

    private static function inputAutocompleteDinamic($id, $name, $url, $modelClass, $cssClass, $multiple, $allowInsert, $allowDeselect)
    {
        $model = new $modelClass;

        if (!$cssClass){
            $cssClass = "mask-chosen-autocomplete";

            if ($allowDeselect){
                $cssClass .= "-allow-deselect";
            }elseif ($allowInsert){
                $cssClass .= "-allow-insert";
            }

            $cssClass .= "-autoload";
        }

        $element = '';
        $element .= "<select class='$cssClass' name='$name' id='$name'";

        if ($url){
            $element .= " data-ajax--url='$url'";
        }

        if ($multiple){
            $element .= " multiple='multiple' ";
        }

        $element .= ">";

        if ($id){
            $element .= "<option value='$id' selected>".$model::formatInline($id)."</option>";
        }

        $element .= "<option></option>";

//        @if (\Illuminate\Support\Facades\App::environment('testing'))
//        @php
//            $model = new \App\Models\Configuracoes\FormaPagamento();
//            $objetos = $model->all();
//        @endphp
//
//        @foreach($objetos as $objeto)
//            <option value="{{$objeto->id}}">{{$objeto->nome}}</option>
//    @endforeach
//    @endif

        $element .= "</select>";

        return $element;
    }

    private static function inputAutocompletePreloadedDinamic($id, $fieldName, $url, $cssClass, $multiple, $allowInsert, $allowDeselect)
    {
        $url = explode("@",$url);
        $controller = $url[0];
        $action = $url[1];

        if (!$cssClass){
            $cssClass = "mask-chosen";

            if ($allowDeselect){
                $cssClass .= "-allow-deselect";
            }elseif ($allowInsert){
                $cssClass .= "-allow-insert";
            }
        }

        $content = (app('App\Http\Controllers\\'.$controller)->{$action}());
        $content = json_decode($content->getContent());

        $element = "<select id='$fieldName' name='$fieldName' class='form-control $cssClass'";

        if ($multiple){
            $element .= " multiple='multiple' ";
        }

        $element .= ">";
        $element .= "<option></option>";

        foreach ($content as $objeto) {
            $element .= "<option value='$objeto->id' ".($objeto->id == $id ? 'selected' : '').">$objeto->text</option>";
        }

        $element .= "</select>";

        return $element;
    }

    public static function inputAutocomplete($options)
    {
        $id = (isset($options['idrec']) ? $options['idrec'] : null);
        $oldValue = (isset($options['oldvalue']) ? $options['oldvalue'] : true);
        $name = (isset($options['name']) ? $options['name'] : null);
        $allowInsert = (isset($options['allowinsert']) ? $options['allowinsert'] : false);
        $allowDeselect = (isset($options['allowdeselect']) ? $options['allowdeselect'] : false);
        $cssClass = (isset($options['class']) ? $options['class'] : false);
        $action = (isset($options['action']) ? $options['action'] : null);
        $preloaded = (isset($options['preloaded']) ? $options['preloaded'] : true);
        $multiple = (isset($options['multiple']) ? $options['multiple'] : false);

        if ($oldValue){
            if (old($name)){
                $id = old($name);
            }
        }

        if (!$preloaded) {
            if (\Illuminate\Support\Facades\App::environment('testing')){
                $preloaded = true;
            }
        }

        if ($preloaded) {
            return self::inputAutocompletePreloadedDinamic($id, $name, $action, $cssClass, $multiple, $allowInsert, $allowDeselect);
        }else{
            $url = (isset($options['url']) ? $options['url'] : ($action ? \URL::action($action) : null));
            $model = (isset($options['model']) ? $options['model'] : false);

            return self::inputAutocompleteDinamic($id, $name, $url, $model, $cssClass, $multiple, $allowInsert, $allowDeselect);
        }
    }
}

