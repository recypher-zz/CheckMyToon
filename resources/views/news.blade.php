<x-master>
    <x-slot name="title">
        FF News - Royal Roses
    </x-slot>

    <x-slot name="news">
        @include('nav.main-nav')
        <div class="container background-color" style="max-width: 1250px;">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h1 id="newsHead" class="text-light display-1"><b><u class="blue-underline">Lodes</u>tone News</b></h1>
                </div>
            </div>
            @foreach ($articles as $article)
                <div class="row my-2">
                    <div class="col d-flex justify-content-center">
                        <div  class="card bg-dark p-2 mt-2 article" style="max-width: 600px;">
                            <img class="img-fluid rounded border border-light" src="{{ $article->image }}" alt="">
                            <a href="{{ $article->url }}" target="_blank" class="text-decoration-none pt-2"><h5><b>{{ $article->title }}</b></h5></a>
                            <p class="text-light desc-truncate">{{ $article->description }}</p>
                            <small class="text-light">{{ $article->timestamp }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="pagination mt-4">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="JS">
        <script src="{{ url('/public/js/news.js') }}"></script>
    </x-slot>
</x-master>
