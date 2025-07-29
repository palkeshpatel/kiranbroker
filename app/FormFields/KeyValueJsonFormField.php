<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class KeyValueJsonFormField extends AbstractHandler
{
    protected $codename = 'key-value_to_json';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.key_value_json', [
            'row'             => $row,
            'options'         => $options,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent,
        ]);
    }


}
