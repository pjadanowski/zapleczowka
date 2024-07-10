@php
    $articles = \App\Models\Article::inRandomOrder()->select(['id', 'title', 'slug', 'created_at'])->limit(5)->get();
@endphp

<div class="mb-7 border border-[#eef0fc] p-7">
    <h3 class="relative mb-5 pb-5 text-2xl capitalize text-[#232f4b] before:absolute before:bottom-0 before:left-0 before:h-[4px] before:w-[55px] before:rounded-[10px] before:bg-[#3756f7] after:absolute after:bottom-0 after:left-[65px] after:h-[4px] after:w-[80%] after:rounded-[10px] after:bg-[#f2f2f2]">
        Popularne artykuły
    </h3>
    <div class="posts">
        @foreach ($articles as $art)
            <div class="mt-4 overflow-hidden pt-4">
                <div class="float-left w-[70px]">
                    <img
                        src="{{ $art->thumbnailImg }}"
                        alt
                        class="rounded-[5px]"
                    />
                </div>
                <div class="float-left w-[calc(100%-70px)] pl-5">
                    <span class="relative top-[-5px] text-sm text-[#444444]"> {{ $art->created_at->toFormattedDateString() }} </span>
                    <h4 class="text-lg font-medium">
                        <a
                            class="text-[#232f4b] transition-all hover:text-[#3756f7]"
                            href="{{ $art->show() }}"
                            >{{ $art->title }}</a
                        >
                    </h4>
                </div>
            </div>
        @endforeach
    </div>
</div>
