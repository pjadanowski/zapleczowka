<?php

namespace App\Services;

class TemplateService
{
    public function getTemplateName()
    {
        $name = config('templates.name');
        return $this->templateMapping($name);
    }

    public function templateMapping(string $name)
    {
        return match ($name) {
            'bloggar' => 'bloggar',
            default   => 'bloggar',
        };
    }

    public function getCssLinks()
    {
        return [
            'bloggar' => 'component-name',
        ];
    }

    public function getScriptsLinks()
    {
        return [
            'bloggar' => 'component-name',
        ];
    }
}
