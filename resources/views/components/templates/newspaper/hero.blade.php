    <div class="container mx-auto bg-gray-100 flex flex-wrap justify-between gap-2">
      <div
        class="bg-gray-100 grid gap-4 grid-cols-1 md:grid-cols-3 grid-rows-4 md:grid-rows-3 w-1/2 min-h-[32rem]"
        style="width: calc(100% - 340px)"
      >
        <div class="flex flex-col col-span-2 row-span-full">
            <div>
                <div class="categoryBadge">{{ $firstArticle->category?->name }}</div>
            </div>
          <h1 class="text-4xl ">
            {{ $firstArticle->title }}
          </h1>
            <div class="flex flex-col">
                   <!-- <img src="{{ $firstArticle->thumbnailImg }}" alt="{{ $firstArticle->title }}"> -->
                <img src="https://via.placeholder.com/500" class="img-fluid hero-img" alt="{{ $firstArticle->title }}">
            </div>
                <p>
                    {{ $firstArticle->excerpt }}
                </p>
        
        </div>
        @include('components.templates.newspaper.articleCard', ['article' => $secondArticle])

        <div class="flex flex-col">
          <div
            style="background-image: url(https://via.placeholder.com/600)"
            class="bg-cover bg-center flex flex-1"
          ></div>
          <h1 class="text-xl flex">
            Tytuł artykułu niech bedzie trochę dłuższy Tytułas asd ad asd a d
          </h1>
        </div>
        <div class="flex flex-col">
          <div
            style="background-image: url(https://via.placeholder.com/600)"
            class="bg-cover bg-center flex flex-1"
          ></div>
          <h1 class="text-xl text-white flex">
            Tytuł artykułu niech bedzie trochę dłuższy
          </h1>
        </div>
      </div>

      <div class="column asidecolumn bg-gray-500">
        <div>coś tam bedzie</div>
      </div>
    </div>