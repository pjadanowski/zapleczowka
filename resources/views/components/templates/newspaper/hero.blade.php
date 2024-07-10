<div class="container mx-auto flex flex-wrap justify-between gap-2 bg-gray-100">
    <div
        class="grid min-h-[32rem] w-1/2 grid-cols-1 grid-rows-4 gap-4 bg-gray-100 md:grid-cols-3 md:grid-rows-3"
        style="width: calc(100% - 340px)"
    >
        <div class="col-span-2 row-span-full flex flex-col">
            <div>
                <div class="categoryBadge">{{ $firstArticle->category?->name }}</div>
            </div>
            <h1 class="text-4xl">
                {{ $firstArticle->title }}
            </h1>
            <div class="flex flex-col">
                <!-- <img src="{{ $firstArticle->thumbnailImg }}" alt="{{ $firstArticle->title }}"> -->
                <img
                    src="https://via.placeholder.com/500"
                    class="img-fluid hero-img"
                    alt="{{ $firstArticle->title }}"
                />
            </div>
            <p>
                {{ $firstArticle->excerpt }}
            </p>
        </div>
        @include('components.templates.newspaper.articleCard', ['article' => $secondArticle])

        <div class="flex flex-col">
            <div
                style="background-image: url(https://via.placeholder.com/600)"
                class="flex flex-1 bg-cover bg-center"
            ></div>
            <h1 class="flex text-xl">Tytuł artykułu niech bedzie trochę dłuższy Tytułas asd ad asd a d</h1>
        </div>
        <div class="flex flex-col">
            <div
                style="background-image: url(https://via.placeholder.com/600)"
                class="flex flex-1 bg-cover bg-center"
            ></div>
            <h1 class="flex text-xl text-white">Tytuł artykułu niech bedzie trochę dłuższy</h1>
        </div>
    </div>

    <div class="column asidecolumn bg-gray-500">
        <div>coś tam bedzie</div>
    </div>
</div>
