@php
    use App\Services\TemplateService;
    
    $templateService = new TemplateService();
    $name = $templateService->getTemplateName();
@endphp

@extends('components.layouts.app')

@section('css')
    @include("components.templates.{$name}.styles")
@endsection

@section('js')
    @include("components.templates.{$name}.scripts")
@endsection

@section('content')
    @include("components.templates.{$name}.index")
@endsection
