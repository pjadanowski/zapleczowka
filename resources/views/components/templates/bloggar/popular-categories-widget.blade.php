    @php
        $categories = \App\Models\Category::withCount('articles')->latest()->get();
    @endphp
  <div class="mb-7 p-7 border-[#eef0fc] border">
    <h3 class="text-2xl text-[#232f4b] relative capitalize pb-5 mb-5
        before:absolute before:left-0 before:bottom-0 before:w-[55px] before:h-[4px]
        before:rounded-[10px]
        before:bg-[#3756f7]
        after:absolute after:left-[65px] after:bottom-0 after:w-[80%] after:h-[4px]
        after:rounded-[10px]
        after:bg-[#f2f2f2] ">Popularne kategorie</h3>
    <ul>
        @foreach ($categories->shuffle() as $category)
        <li class="text-lg font-normal relative sm:text-base mb-5 pb-5 border-b border-[#eef0fc]">
            <a href="{{ route('category.articles', $category->slug)}}"
                class="block text-[#474f62] relative pl-7 before:absolute before:left-0 before:top-1/2 before:-translate-y-1/2 before:content-['\e649'] before:font-['themify'] before:text-base transition-all hover:text-[#3756f7] hover:before:text-[#3756f7] before:transition-all">
                {!! $category->name !!}
                <span class="absolute right-0">({{ $category->articles_count }})</span></a>
        </li>
        @endforeach
        
    </ul>
</div>