<?php

//abstract
class WebController extends BaseController
{
    public function render($templateName, $context = array())
    {
        ob_start();
        extract($context);
        if (!file_exists($templateName)) {
            throw new TemplateDoesExist();
        }
        include($templateName);
        return ob_get_clean();
    }
}
