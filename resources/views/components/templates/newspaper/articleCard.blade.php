@props(['article'])

<div class=" flex flex-col">
    <div class="relative flex flex-col">
        <!-- <img src="{{ $article->thumbnailImg }}" alt="{{ $article->title }}"> -->
        <!-- <img src="https://via.placeholder.com/500" class="img-fluid " alt="{{ $article->title }}"> -->
          <div
            style="background-image: url(https://via.placeholder.com/600)"
            class="bg-cover bg-center flex flex-1"
          ></div>

        <div class="categoryBadge absolute bottom-0 left-0">{{ $article->category?->name }}</div>
    </div>

    <h1 class="text-2xl">{{ $article->title }}</h1>
    <p class="text-sm text-gray-600">{{ polishDateFormat($article->created_at) }}</p>
</div>