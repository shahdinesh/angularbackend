<?php

namespace App\Helpers;

class FormHelper
{
    private function makeAttr($attr)
    {
        $attrStr = "";
        foreach ($attr as $key => $value)
            $attrStr .= '' . $key . '="' . $value . '" ';

        return $attrStr;
    }

    public function getFormPresetData($form_name, $attribute_config, $data, $implode = NULL)
    {
        if (!isset($attribute_config['relation']) || $attribute_config['relation']['type'] == 'OO') {
            if ($data)
                return $data[$form_name];
        } elseif (isset($attribute_config['relation']) && $data && $data[$attribute_config['relation']['name']]) {
            if ($attribute_config['relation']['type'] == 'OM') {
                $values = array_column($data[$attribute_config['relation']['name']], $attribute_config['options']['value']);
                if ($implode)
                    $values = implode($implode, $values);

                return $values;
            } elseif ($attribute_config['relation']['type'] == 'MM') {
                $values = array_column($data[$attribute_config['relation']['name']], $attribute_config['options']['id']);
                if ($implode)
                    $values = implode($implode, $values);

                return $values;
            }
        }
    }

    private function getOldValue($name, $value = NULL)
    {
        if (is_NULL($name)) return $value;

        $old = old($name);

        if (!is_NULL($old) && $name !== '_method')
            return $old;
        else
            return $value;
    }

    /*
        ToDos:
            -image
    */
    private function makeInput($type, $name, $value, $attr)
    {
        $attr['type'] = $type;
        $attr['name'] = $name;
        $attr['value'] = $this->getOldValue($name, $value);

        return '<input ' . $this->makeAttr($attr) . '>';
    }


    protected function getAction(array $options)
    {

        if (isset($options['url']))
            return $this->getUrlAction($options['url']);

        if (isset($options['route']))
            return $this->getRouteAction($options['route']);
        elseif (isset($options['action']))
            return $this->getControllerAction($options['action']);

        return url()->current();
    }

    protected function getUrlAction($options)
    {
        if (is_array($options))
            return url()->to($options[0], array_slice($options, 1));

        return url()->to($options);
    }

    protected function getRouteAction($options)
    {
        if (is_array($options))
            return url()->route($options[0], array_slice($options, 1));

        return url()->route($options);
    }

    protected function getControllerAction($options)
    {
        if (is_array($options))
            return url()->action($options[0], array_slice($options, 1));

        return url()->action($options);
    }

    public function open($options = [])
    {
        $append = "";

        $attr['accept-charset'] = 'UTF-8';
        $method = array_key_exists('method', $options) ? strtoupper($options['method']) : 'POST';

        if (!in_array($method, ['GET', 'POST', 'DELETE', 'PATCH', 'PUT']))
            $method = "POST";

        $attr['method'] = $method;
        $attr['action'] = $this->getAction($options);
        if (isset($options['files']) && $options['files'])
            $attr['enctype'] = 'multipart/form-data';

        if ($method !== 'GET')
            $append .= '<input type="hidden" name="_token" value="' . csrf_token() . '"/>';

        if (in_array($method, ['DELETE', 'PATCH', 'PUT']))
            $append .= $this->hidden('_method', $method);

        return "<form " . $this->makeAttr($attr) . ">" . $append;
    }

    public function close()
    {
        return '</form>';
    }

    public function submit($value = NULL, $attr = [])
    {
        return $this->makeInput('submit', NULL, $value, $attr);
    }

    public function input($type, $name, $value = NULL, $attr = [])
    {
        return $this->makeInput($type, $name, $value, $attr);
    }

    public function hidden($name, $value = NULL, $attr = [])
    {
        return $this->makeInput('hidden', $name, $value, $attr);
    }

    public function text($name, $value = NULL, $attr = [])
    {
        return $this->makeInput('text', $name, $value, $attr);
    }

    public function email($name, $value = NULL, $attr = [])
    {
        return $this->makeInput('email', $name, $value, $attr);
    }

    public function number($name, $value = NULL, $attr = [])
    {
        return $this->makeInput('number', $name, $value, $attr);
    }

    public function tel($name, $value = NULL, $attr = [])
    {
        return $this->makeInput('tel', $name, $value, $attr);
    }

    public function password($name, $value = NULL, $attr = [])
    {
        return $this->makeInput('password', $name, $value, $attr);
    }

    public function file($name, $value = NULL, $attr = [])
    {
        return $this->makeInput('file', $name, $value, $attr);
    }


    public function range($name, $value = NULL, $attr = [])
    {
        return $this->makeInput('range', $name, $value, $attr);
    }

    public function search($name, $value = NULL, $attr = [])
    {
        return $this->makeInput('search', $name, $value, $attr);
    }

    public function date($name, $value = NULL, $attr = [])
    {
        if ($value instanceof DateTime)
            $value = $value->format('Y-m-d');
        return $this->makeInput('date', $name, $value, $attr);
    }

    public function datetime($name, $value = NULL, $attr = [])
    {
        if ($value instanceof DateTime)
            $value = $value->format(DateTime::RFC3339);
        return $this->makeInput('datetime', $name, $value, $attr);
    }

    public function time($name, $value = NULL, $attr = [])
    {
        if ($value instanceof DateTime)
            $value = $value->format('H:i');
        return $this->makeInput('time', $name, $value, $attr);
    }

    public function week($name, $value = NULL, $attr = [])
    {
        if ($value instanceof DateTime)
            $value = $value->format('Y-\WW');
        return $this->makeInput('week', $name, $value, $attr);
    }

    public function url($name, $value = NULL, $attr = [])
    {
        return $this->makeInput('url', $name, $value, $attr);
    }

    public function textarea($name, $value = NULL, $attr = [])
    {
        $_value = $this->getOldValue($name, $value);
        return '<textarea name="' . $name . '" ' . $this->makeAttr($attr) . '>' . $_value . '</textarea>';
    }

    public function checkbox($name, $value = 1, $checked = NULL, $attr = [])
    {
        $_value = $this->getOldValue($name, $value);
        return "<input type=\"checkbox\" name=\"$name\" value=\"$_value\" checked=\"$checked\" " . $this->makeAttr($attr) . "";
    }

    public function radio($name, $value = NULL, $checked = NULL, $attr = [])
    {
        $_value = $this->getOldValue($name, $value);
        return "<input type=\"radio\" name=\"$name\" value=\"$_value\" checked=\"$checked\" " . $this->makeAttr($attr) . "";
    }

    public function image($name, $upload_path, $configs, $value = NULL)
    {
        $id = \Request::segment(3);
        $path = '#';
        if (is_numeric($id))
            $path = \App\Helpers\AssetHepler::getFilePath($value, $configs, $id);

        return "
            <div class='form-group js-image-upload-div'>
                <div id='image-upload'>
                    <input type='hidden' name='{$name}' value='{$value}' class='file_name' data-input>
                    <div>
                        <img class='img-responsive' style='max-height: 500px' src='{$path}' data-image>
                    </div>
                    <div class='progress' style='display: none;' data-progress>
                        <div class='progress-bar progress-bar-striped active' style='width: 0' data-progress-bar>
                            40%
                        </div>
                    </div>
                    <label data-btn-select>
                        <span type='button' class='btn btn-primary'>Select Image</span>
                        <input type='file' accept='image/*' class='hidden image-upload' data-file data-url='{$upload_path}'>
                    </label>
                    <label data-btn-change style='display: none;'>
                        <span type='button' class='btn btn-primary'>Change Image</span>
                        <input type='file' accept='image/*' class='hidden image-upload' data-file data-url='{$upload_path}'>
                    </label>
                    <button type='button' class='btn btn-danger image-remove' style='display: none;' data-btn-remove>Remove Image</button>
                </div>
                <div class='help-block'>
                    <div class='bg-info text-info'>[Preferred Image Size: ***px]</div>
                </div>
            </div>
        ";
    }

    public function plotRadio($name, $list, $checked = NULL, $attr = [])
    {
        $_selected = $this->getOldValue($name, $checked);

        $radios = '<div class="radio">';
        foreach ($list['data'] as $display) {
            $_value = $display->{$list['id']};
            $_text = $display->{$list['value']};
            $_formatedValue = str_replace(' ', '-', $_value);
            $selectedAttr = ($_value == $_selected) ? 'checked' : '';

            $radios .= "<div class=\"col-sm-3\">";
            $radios .= "<input type=\"radio\" name=\"$name\" id=\"$_formatedValue\" value=\"$_value\" $selectedAttr " . $this->makeAttr($attr) . " /><label for=\"$_formatedValue\">$_text</label>";
            $radios .= "</div>";
        }
        $radios .= "</div>";

        return $radios;
    }

    public function plotCheckbox($name, $list, $checked = NULL, $attr = [])
    {
        $_selected = $this->getOldValue($name, $checked);
        $radios = '<div class="checkbox">';
        foreach ($list['data'] as $display) {
            $_value = $display->{$list['id']};
            $_text = $display->{$list['value']};
            $_formatedValue = $name . str_replace(' ', '-', $_value);
            $selectedAttr = (is_array($_selected) && in_array($_value, $_selected) || ($_value == $_selected)) ? 'checked' : '';

            $radios .= "<div class=\"col-sm-3\">";
            $radios .= "<input type=\"checkbox\" name=\"$name\" id=\"$_formatedValue\" value=\"$_value\" $selectedAttr " . $this->makeAttr($attr) . " /><label for=\"$_formatedValue\">$_text</label>";
            $radios .= "</div>";
        }
        $radios .= "</div>";

        return $radios;
    }

    public function select($name, $list, $selected = NULL, $attr = [], $is_multiple = FALSE)
    {
        $_selected = $this->getOldValue($name, $selected);

        $select = '<select name="' . $name . '" ' . $this->makeAttr($attr) . '>';
        if (!$is_multiple)
            $select .= "<option value=\"\" >-- Select --</option>";

        foreach ($list['data'] as $display) {
            $_value = $display->{$list['id']};
            $_text = $display->{$list['value']};
            $selectedAttr = (is_array($_selected) && in_array($_value, $_selected) || ($_value == $_selected)) ? 'selected' : '';

            $additional_data_string = '';
            if (isset($list['additional_data'])) {
                $col_data = $list['additional_data'];
                if (is_array($col_data)) {
                    foreach ($col_data as $additional_data) {
                        $formated_additional_data = str_replace('_', '', $additional_data);
                        $additional_data_string .= "data-$formated_additional_data='{$display->$additional_data}' ";
                    }
                } else
                    $formated_additional_data = str_replace('_', '', $col_data);
                    $additional_data_string .= "data-$formated_additional_data='{$display->$col_data}' ";
            }

            $select .= "<option value=\"$_value\" $selectedAttr $additional_data_string>{$_text}</option>";
        }
        $select .= '</select>';
        return $select;
    }

    private function getAdditionalData() {

    }
}
