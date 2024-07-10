@php
    $categories = \App\Models\Category::withCount('articles')->latest()->get();
@endphp

<div class="mb-7 border border-[#eef0fc] p-7">
    <h3 class="relative mb-5 pb-5 text-2xl capitalize text-[#232f4b] before:absolute before:bottom-0 before:left-0 before:h-[4px] before:w-[55px] before:rounded-[10px] before:bg-[#3756f7] after:absolute after:bottom-0 after:left-[65px] after:h-[4px] after:w-[80%] after:rounded-[10px] after:bg-[#f2f2f2]">
        Popularne kategorie
    </h3>
    <ul>
        @foreach ($categories->shuffle() as $category)
            <li class="relative mb-5 border-b border-[#eef0fc] pb-5 text-lg font-normal sm:text-base">
                <a
                    href="{{ route('category.articles', $category->slug) }}"
                    class="relative block pl-7 text-[#474f62] transition-all before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:font-['themify'] before:text-base before:transition-all before:content-['\e649'] hover:text-[#3756f7] hover:before:text-[#3756f7]"
                >
                    {!! $category->name !!}
                    <span class="absolute right-0">({{ $category->articles_count }})</span></a
                >
            </li>
        @endforeach
    </ul>
</div>
