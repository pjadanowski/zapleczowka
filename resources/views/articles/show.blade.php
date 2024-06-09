@php
    use App\Services\TemplateService;
    
    $templateService = new TemplateService();
    $name = $templateService->getTemplateName();
@endphp


@extends("components.templates.$name.layout")

@section('templateContent')
    @include("components.templates.{$name}.show")
@endsection

