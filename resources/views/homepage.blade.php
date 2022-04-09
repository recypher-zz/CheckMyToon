<x-master>
    <x-slot name="homepage">
        @include('nav.main-nav')
        
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center text-light">
                    <h1 class="display-1 my-4" id="titleHead"><u class="blue-underline">Check My Toon</u></h1>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center text-light">
                    <h2 class="my-2 text-light justify-content-center" id="titleHead">Player Search and Character Tracker</h2>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex my-4 justify-content-center">
                    <form class="d-flex" method="POST" action="{{ route('loadPlayerInfo') }}">
                        @csrf
                        <input class="form-control me-2" required type="text" name="player_name" placeholder="Search Players">
                        <select class="me-2 rounded" name="server" id="server">
                            <option value="Select a server...">Select a server...</option>
                            @foreach ($xivServers as $key => $vals)
                                <optgroup label="{{ $key }}">
                                    @foreach ($vals as $val)
                                        <option value="{{ $val }}">{{ $val }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center text-light">
                    @foreach ($quotes as $quote)
                        <p class="my-4 text-center" id="titleHead">{{ stripSlashes($quote->quotes) }} - Andy, {{ $quote->date }}</p>
                    @endforeach 
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="JS">
        <script src="{{ url('/public/js/home.js') }}"></script>
    </x-slot>
</x-master>