<x-master>
    <x-slot name="title">
        {{ $player->Name }}
    </x-slot>
    <x-slot name="player_info">
        @include('nav.main-nav')
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="col-md-6 col-lg-12">
                        <div class="card rounded bg-dark">
                            <h2 id="cardHeader" class="text-light text-center"><u class="blue-underline">Classes</u></h2>
                            <div class="row row-cols-auto d-flex justify-content-center">
                                @foreach ($profile->Character->ClassJobs as $key => $job)
                                    <div class="col text-center py-1">
                                        <img class="class" src="{{ url('/public/imgs/' . strtolower(str_replace(' ', '', $job->UnlockedState->Name)) . '.png') }}" alt="" data-toggle="tooltip" data-placement="bottom" data-html="true" title="{{ $job->UnlockedState->Name }}">
                                        <br>
                                        <small class="text-light">
                                            @if ($job->Level == 0)
                                                <b>-</b>
                                            @else
                                                <b>{{ $job->Level }}</b>
                                            @endif
                                        </small>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg">
                        <div class="card rounded bg-dark">
                            <h2 id="cardHeader" class="text-light text-ce"><u class="blue-underline">Toon Info</u></h2>
                            <div class="row row-cols-auto d-flex justify-content-center">
                                @foreach ($charProfile as $key => $val)
                                    {{ $key . "<br>" . $val }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="JS">
        <script src="{{ url('/js/player.js') }}"></script>
    </x-slot>
</x-master>