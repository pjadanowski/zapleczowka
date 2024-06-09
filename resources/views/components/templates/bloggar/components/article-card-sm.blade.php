@props(['article'])

@if ($article)
    <div class="relative mx-[7px] sm:mx-0 sm:mb-4 rounded-[15px] overflow-hidden z-10 group before:absolute before:left-0 before:top-0 before:w-full
        before:h-full before:bg-[rgba(7,7,7,0.4)] before:rounded-[15px] before:z-20">
        <img src="{{ $article->thumbnailImg }}" alt="" class="img img-responsive w-full rounded-[15px] scale-[1] transition-all group-hover:scale-[1.3]">
        <div class="absolute left-0 bottom-0 p-[30px] xl:p-[25px] z-20 col:p-2">
            <div class="p-[3px_15px] text-center text-xl rounded-[5px] inline-block font-bold text-[#003aae] 
            bg-[rgba(255,255,255,0.8)] col:text-base">{{ $article->category->name }}</div>
            <h2 class="text-[28px] text-white mt-[15px]  font-semibold col:text-xl">
                <a href="{{ route('articles.show', $article->slug) }}">
                    {{ $article->title }}
                </a>
            </h2>
            <ul class="flex items-center">
                <li class="relative text-white ml-[20px] pl-[20px] before:absolute before:left-[-8px] before:top-[25%] before:w-[8px] before:h-[8px] before:bg-white before:rounded-[50%] before:translate-y-1/2">
                    {{ $article->created_at->format('d.m.Y') }}</li>
            </ul>
        </div>
    </div>
@endif