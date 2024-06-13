<section class="md:mt-4">
    <div class="wraper">
        @php
            $firstArticle = $latestArticles->first() ?? null;
            $secondArticle = $latestArticles->get(1) ?? null;
            $thirdArticle = $latestArticles->get(2) ?? null;
            $forthArticle = $latestArticles->get(3) ?? null;
        @endphp
        <div class="m-[0_-7.5px] gallery-container clearfix relative grid grid-cols-1 md:grid-cols-12 gap-4" >
            {{-- first --}}    
            @if ($firstArticle)                            
            <div class="col-span-12 md:!col-span-6 row-span-full">
                <div class="relative rounded-[15px] overflow-hidden z-10 group before:absolute before:inset-0 before:w-full
                    before:h-full before:bg-[rgba(7,7,7,0.4)] before:rounded-[15px] before:z-20">
                    <img src="{{ $firstArticle->thumbnailImg }}" alt="" class="img img-responsive w-full rounded-[15px] scale-[1] transition-all group-hover:scale-[1.3]">
                    <div class="absolute inset-0 p-[30px] z-20 col:p-3">
                        <div class="p-[3px_15px] text-center text-xl rounded-[5px] inline-block font-bold text-[#003aae] 
                        bg-[rgba(255,255,255,0.8)] col:text-base">{{ $firstArticle->category?->name }}</div>
                        <h2 class="text-[35px] text-white mt-[15px] leading-10 col:text-xl font-semibold">
                            <a href="{{ $firstArticle->show() }}">
                                {{ $firstArticle->title }}
                            </a>
                        </h2>
                        <p class="text-white my-[15px] col:text-[14px] "> {{ $firstArticle->excerpt }} </p>
                        <ul class="flex items-center">
                            {{--  <li class="relative text-white mr-[20px] ">
                            
                                
                                <img src="assets/images/blog/blog-avater/img-1.jpg " alt="" class="w-[40px] h-[40px] rounded-[50%]">
                            </li>
                            <li class="relative text-white ">By <a href="blog-single.html">Robert</a></li>  --}}
                            <li class="relative text-white ml-[20px] pl-[20px] before:absolute before:left-[-8px] before:top-[25%] before:w-[8px] before:h-[8px] before:bg-white before:rounded-[50%] before:translate-y-1/2">
                                {{ $firstArticle->created_at->format('d.m.Y') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            {{-- end first --}}
            @if ($secondArticle)      
            <div class="col-span-12 md:!col-span-6 gap-4">
                <div class="grid md:grid-rows-3 gap-4">
                    <div class="relative row-span-2 rounded-[15px] overflow-hidden z-10 group before:absolute before:inset-0 before:w-full
                    before:h-full before:bg-[rgba(7,7,7,0.4)] before:rounded-[15px] before:z-20">
                    <img src="{{ $secondArticle->thumbnailImg }}" alt="" class="img img-responsive w-full rounded-[15px] scale-[1] transition-all group-hover:scale-[1.3]">
                    <div class="absolute inset-0 p-[30px] z-20">
                        <div class="p-[3px_15px] text-center text-xl rounded-[5px] inline-block font-bold text-[#003aae] 
                        bg-[rgba(255,255,255,0.8)] col:text-base">{{ $secondArticle->category?->name }}</div>
                        <h2 class="text-[35px] text-white mt-[15px] leading-10 col:text-xl font-semibold col:mt-[10px]">
                            <a href="{{ route('articles.show', $secondArticle->slug) }}">
                                {{ $secondArticle->title }}
                            </a>
                        </h2>
                        <ul class="flex items-center">
                            <li class="relative text-white ml-[20px] pl-[20px] before:absolute before:left-[-8px] before:top-[25%] before:w-[8px] before:h-[8px] before:bg-white before:rounded-[50%] before:translate-y-1/2">
                                {{ $secondArticle->created_at->format('d.m.Y') }}
                            </li>
                        </ul>
                    </div>
                    </div>

                    {{-- 2 small --}}
                    <div class="row-span-1 ">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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