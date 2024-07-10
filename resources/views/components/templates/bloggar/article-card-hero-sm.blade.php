@props(['article'])

@if ($article)
    <div class="group relative z-10 overflow-hidden rounded-[15px] before:absolute before:inset-0 before:z-20 before:h-full before:w-full before:rounded-[15px] before:bg-[rgba(7,7,7,0.4)]">
        <img
            src="{{ $article->thumbnailImg }}"
            alt=""
            class="img img-responsive w-full scale-[1] rounded-[15px] transition-all group-hover:scale-[1.3]"
        />
        <div class="col:p-2 absolute inset-0 z-20 p-[30px] xl:p-[25px]">
            <div class="col:text-base inline-block rounded-[5px] bg-[rgba(255,255,255,0.8)] p-[3px_15px] text-center text-xl font-bold text-[#003aae]">
                {{ $article->category?->name }}
            </div>
            <h2 class="col:text-xl mt-[15px] text-[22px] font-semibold text-white">
                <a
                    href="{{ route('articles.show', $article->slug) }}"
                    title="{{ $article->title }}"
                >
                    {{ $article->title }}
                </a>
            </h2>
            <ul class="flex items-center">
                <li class="relative ml-[20px] pl-[20px] text-white before:absolute before:left-[-8px] before:top-[25%] before:h-[8px] before:w-[8px] before:translate-y-1/2 before:rounded-[50%] before:bg-white">
                    {{ $article->created_at->format('d.m.Y') }}
                </li>
            </ul>
        </div>
    </div>
@endif
