<x-master>
    <x-slot name="homepage">
        @include('nav.main-nav')
        
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center text-light">
                    <h1 class="display-1 my-4" id="titleHead"><u class="blue-underline">Royal Roses</u></h1>
                </div>
                <div class="row">
                    <div class="col d-flex text-light">
                        @foreach ($quotes as $quote)
                            <p class="text-center my-4" id="titleHead">{{ $quote->quotes }} - Andy, {{ $quote->date }}</p>
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-master>