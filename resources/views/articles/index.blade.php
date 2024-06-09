@php
    use App\Services\TemplateService;
    
    $templateService = new TemplateService();
    $name = $templateService->getTemplateName();
@endphp


@extends("components.templates.$name.layout")


@section('templateContent')
    {{-- @parent --}}
    @include("components.templates.{$name}.index")
@endsection

