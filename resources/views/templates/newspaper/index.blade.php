@extends('templates.newspaper.layout')

@section('content')

 @php
$firstArticle = $latestArticles->first() ?? null;
$secondArticle = $latestArticles->get(1) ?? null;
$thirdArticle = $latestArticles->get(2) ?? null;
$forthArticle = $latestArticles->get(3) ?? null;
@endphp
    <div class="container mt-5">
        @include('components.templates.newspaper.hero')
    </div>
@endsection