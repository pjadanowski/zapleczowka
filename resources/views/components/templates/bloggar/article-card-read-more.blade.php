 @props(['article'])
 <div class="col-span-6 md:col-span-6 sm:col-span-12">
    <div class="mb-7 pb-5 border-b border-[#eeeeee] group">
        <div class="overflow-hidden relative rounded-[6px]">
            <img src="{{ $article->thumbnailImg }}" alt="{{ $article->title }}"
                class="w-full grayscale-0 scale-[1]
                    rounded-[6px] transition-all group-hover:grayscale-[100%] group-hover:scale-[1.2]">
            <div
                class="absolute left-[15px] top-[15px] p-[4px_25px_2px] bg-[#3756f7] uppercase text-white text-[14px] rounded-[5px]">
                {{ $article->category->name }}</div>
        </div>
        <div class="pt-3">
            <ul class="flex mb-[15px] items-center">
                <li
                    class="text-base relative" style="color: #9b9b9b;">
                     {{ $article->created_at->format('d.m.Y') }}
                </li>
            </ul>
            <h2
                class="text-xl font-heading-font mb-4 font-bold mt-1 xl:text-lg xl:mb-2 ">
                <a href="{{ route('articles.show', $article->slug) }}"  class="text-[#444] transition-all hover:text-[#3756f7]">
                    {{ $article->title }}
                </a>
            </h2>
             {{--  <ul class="flex mb-[15px] items-center">
            
                  <li class="text-base text-[#3756f7]">
                    <img src="assets/images/blog/blog-avater/img-1.jpg " alt=""
                        class="w-[40px] h-[40px] rounded-[50%] mr-2">
                </li>
                <li class="text-base text-[#3756f7]">By <a href="blog-single.html"
                        class="text-[#003aae] transition-all hover:text-[#3756f7]">Admin</a>
                </li>
               
                <li
                    class="text-base relative" style="color: #9b9b9b;">
                     {{ $article->created_at->format('d.m.Y') }}
                </li>
            </ul>
 --}}
            <p class="text-[#444444] text-base"> {{ $article->excerpt }}</p>
            <p class="text-right text-base" style="color: #ccc"> 
                 <a href="{{ route('articles.show', $article->slug) }}"  class="text-[#444] transition-all hover:text-[#3756f7]">
                    więcej
                </a>
            </p>
        </div>
    </div>
</div>