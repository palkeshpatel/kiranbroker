<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class MultipleImagesWithAttrsFormField extends AbstractHandler
{
    protected $codename = 'multiple_images_with_attrs';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.multiple_images_with_attrs', [
            'row'             => $row,
            'options'         => $options,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent,
        ]);
    }
}
