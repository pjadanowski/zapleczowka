  @php
    $articles = \App\Models\Article::inRandomOrder()->select(['id', 'title', 'created_at'])->limit(5)->get();

  @endphp
  
  <div class="mb-7 p-7 border-[#eef0fc] border">
    <h3 class="text-2xl text-[#232f4b] relative capitalize pb-5 mb-5
        before:absolute before:left-0 before:bottom-0 before:w-[55px] before:h-[4px]
        before:rounded-[10px]
        before:bg-[#3756f7]
        after:absolute after:left-[65px] after:bottom-0 after:w-[80%] after:h-[4px]
        after:rounded-[10px]
        after:bg-[#f2f2f2]">Popularne artykuły</h3>
    <div class="posts">
        @foreach ($articles as $art)
            <div class="overflow-hidden mt-4 pt-4">
                <div class="w-[70px] float-left">
                    <img src="{{$art->thumbnailImg}}" alt class="rounded-[5px]">
                </div>
                <div class="w-[calc(100%-70px)] float-left pl-5">
                    <span class="text-sm text-[#444444] relative top-[-5px]"> {{ $art->created_at->toFormattedDateString()}} </span>
                    <h4 class="text-lg font-medium"><a
                            class="text-[#232f4b] transition-all hover:text-[#3756f7]"
                            href="{{ $art->show() }}">{{ $art->title }}</a></h4>
                </div>
            </div>
        @endforeach
    </div>
</div>