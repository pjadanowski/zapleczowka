<section class="md:mt-4">
    <div class="wraper">
        @php
            $firstArticle = $latestArticles->first() ?? null;
            $secondArticle = $latestArticles->get(1) ?? null;
            $thirdArticle = $latestArticles->get(2) ?? null;
            $forthArticle = $latestArticles->get(3) ?? null;
        @endphp

        <div class="gallery-container clearfix relative m-[0_-7.5px] grid grid-cols-1 gap-4 md:grid-cols-12">
            {{-- first --}}
            @if ($firstArticle)
                <div class="col-span-12 row-span-full md:!col-span-6">
                    <div class="group relative z-10 h-full overflow-hidden rounded-[15px] before:absolute before:inset-0 before:z-20 before:h-full before:w-full before:rounded-[15px] before:bg-[rgba(7,7,7,0.4)]">
                        <img
                            src="{{ $firstArticle->thumbnailImg }}"
                            alt=""
                            class="img img-responsive w-full scale-[1] rounded-[15px] transition-all group-hover:scale-[1.3]"
                        />
                        <div class="col:p-3 absolute bottom-0 z-20 p-[30px]">
                            <div class="col:text-base inline-block rounded-[5px] bg-[rgba(255,255,255,0.8)] p-[3px_15px] text-center text-xl font-bold text-[#003aae]">
                                {{ $firstArticle->category?->name }}
                            </div>
                            <h2 class="col:text-xl mt-[15px] text-[35px] font-semibold leading-10 text-white">
                                <a href="{{ $firstArticle->show() }}">
                                    {{ $firstArticle->title }}
                                </a>
                            </h2>
                            <p class="col:text-[14px] my-[15px] text-white">{{ $firstArticle->excerpt }}</p>
                            <ul class="flex items-center">
                                {{--
                                    <li class="relative text-white mr-[20px] ">
                                    
                                    
                                    <img src="assets/images/blog/blog-avater/img-1.jpg " alt="" class="w-[40px] h-[40px] rounded-[50%]">
                                    </li>
                                    <li class="relative text-white ">By <a href="blog-single.html">Robert</a></li>
                                --}}
                                <li class="relative ml-[20px] pl-[20px] text-white before:absolute before:left-[-8px] before:top-[25%] before:h-[8px] before:w-[8px] before:translate-y-1/2 before:rounded-[50%] before:bg-white">
                                    {{ $firstArticle->created_at->format('d.m.Y') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            {{-- end first --}}
            @if ($secondArticle)
                <div class="col-span-12 gap-4 md:!col-span-6">
                    <div class="grid gap-4 md:grid-rows-3">
                        <div class="group relative z-10 row-span-2 overflow-hidden rounded-[15px] before:absolute before:inset-0 before:z-20 before:h-full before:w-full before:rounded-[15px] before:bg-[rgba(7,7,7,0.4)]">
                            <img
                                src="{{ $secondArticle->thumbnailImg }}"
                                alt=""
                                class="img img-responsive w-full scale-[1] rounded-[15px] transition-all group-hover:scale-[1.3]"
                            />
                            <div class="absolute inset-0 z-20 p-[30px]">
                                <div class="col:text-base inline-block rounded-[5px] bg-[rgba(255,255,255,0.8)] p-[3px_15px] text-center text-xl font-bold text-[#003aae]">
                                    {{ $secondArticle->category?->name }}
                                </div>
                                <h2 class="col:text-xl col:mt-[10px] mt-[15px] text-[35px] font-semibold leading-10 text-white">
                                    <a href="{{ route('articles.show', $secondArticle->slug) }}">
                                        {{ $secondArticle->title }}
                                    </a>
                                </h2>
                                <ul class="flex items-center">
                                    <li class="relative ml-[20px] pl-[20px] text-white before:absolute before:left-[-8px] before:top-[25%] before:h-[8px] before:w-[8px] before:translate-y-1/2 before:rounded-[50%] before:bg-white">
                                        {{ $secondArticle->created_at->format('d.m.Y') }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- 2 small --}}
                        <div class="row-span-1">
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                @include('components.templates.bloggar.article-card-hero-sm', ['article' => $thirdArticle])

                                @include('components.templates.bloggar.article-card-hero-sm', ['article' => $forthArticle])
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
