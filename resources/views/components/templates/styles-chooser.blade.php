@php
    use App\Services\TemplateService;
    
    $templateService = new TemplateService();
    $name = $templateService->getTemplateName();
@endphp

@include("components.templates.{$name}.styles")
