@props(['article'])

<div>
    <div class="relative">
        <!-- <img src="{{ $article->thumbnailImg }}" alt="{{ $article->title }}"> -->
        <img src="https://via.placeholder.com/500" class="img-fluid " alt="{{ $article->title }}">

        <div class="categoryBadge absolute bottom-0 left-0">{{ $article->category?->name }}</div>
    </div>

    <h1 class="text-2xl">{{ $article->title }}</h1>
    <p class="text-sm text-gray-600">{{ polishDateFormat($article->created_at) }}</p>
</div>