@props(['article'])
<div class="col-span-6 sm:col-span-12 md:col-span-6">
    <div class="group mb-7 border-b border-[#eeeeee] pb-5">
        <div class="relative overflow-hidden rounded-[6px]">
            <img
                src="{{ $article->thumbnailImg }}"
                alt="{{ $article->title }}"
                class="w-full scale-[1] rounded-[6px] grayscale-0 transition-all group-hover:scale-[1.2] group-hover:grayscale-[100%]"
            />
            <div class="absolute left-[15px] top-[15px] rounded-[5px] bg-[#3756f7] p-[4px_25px_2px] text-[14px] uppercase text-white">
                {{ $article->category?->name }}
            </div>
        </div>
        <div class="pt-3">
            <ul class="mb-[15px] flex items-center">
                <li
                    class="relative text-base"
                    style="color: #9b9b9b"
                >
                    {{ $article->created_at->format('d.m.Y') }}
                </li>
            </ul>
            <h2 class="font-heading-font mb-4 mt-1 text-xl font-bold xl:mb-2 xl:text-lg">
                <a
                    href="{{ route('articles.show', $article->slug) }}"
                    class="text-[#444] transition-all hover:text-[#3756f7]"
                >
                    {{ $article->title }}
                </a>
            </h2>
            {{--
                <ul class="flex mb-[15px] items-center">
                
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
            <p class="text-base text-[#444444]">{{ $article->excerpt }}</p>
            <p
                class="text-right text-base"
                style="color: #ccc"
            >
                <a
                    href="{{ route('articles.show', $article->slug) }}"
                    class="text-[#444] transition-all hover:text-[#3756f7]"
                >
                    więcej
                </a>
            </p>
        </div>
    </div>
</div>
