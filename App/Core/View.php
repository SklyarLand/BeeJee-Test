<?php


namespace App\Core;


class View
{
    public $gate;

    function generate($content_view, $template_view, $data = null)
    {
        if ($data != null) {
            extract($data);
        }
        include dirname(__FILE__)."/../views/layouts/$template_view";
    }
}