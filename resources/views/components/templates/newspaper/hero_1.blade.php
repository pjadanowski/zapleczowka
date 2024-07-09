<div class="hero ">
            <div class="flex flex-col">
                <div>
                    <div class="categoryBadge">{{ $firstArticle->category?->name }}</div>
                </div>
                <h1>{{ $firstArticle->title }}</h1>
                <p class="text-sm text-gray-600">{{ polishDateFormat($firstArticle->created_at) }}</p>
                <!-- <img src="{{ $firstArticle->thumbnailImg }}" alt="{{ $firstArticle->title }}"> -->
                <img src="https://via.placeholder.com/500" class="img-fluid hero-img" alt="{{ $firstArticle->title }}">
                <p>
                    {{ $firstArticle->excerpt }}
                </p>
            </div>

            {{--  column --}}
            <div class="flex flex-col">
                <x-templates.newspaper.articleCard :article="$secondArticle" />
                <x-templates.newspaper.articleCard :article="$thirdArticle" />
                <x-templates.newspaper.articleCard :article="$forthArticle" />
            </div>
        </div>