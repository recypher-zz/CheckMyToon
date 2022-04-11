<x-master>
    <x-slot name="title">
        {{ $player->Name }}
    </x-slot>
    <x-slot name="player_info">
        @include('nav.main-nav')
        <div class="container my-4">
            <div class="row">
                <div class="col-md-12 col-lg-4 my-3">
                    <div class="col-md-6 col-lg-12">
                        <div class="card rounded bg-dark border border-light">
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
                </div>
                <div class="col-md-12 col-lg-4 my-3">
                    <div class="col-md-6 col-lg-12">
                        <div class="card rounded bg-dark border border-light">
                            <h2 id="cardHeader" class="text-light text-center"><u class="blue-underline">Character</u></h2>
                            <div class="row px-4 mb-3 d-flex justify-content-center">
                                <img src="{{ $profile->Character->Portrait }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 my-3">
                        <div class="card rounded bg-dark border border-light">
                            <div class="row d-flex">
                                <div class="col-2">
                                    <img style="width: 75px;" src="{{ url('/public/imgs/' . strtolower(str_replace(' ', '', $profile->Character->ActiveClassJob->UnlockedState->Name)) . '.png') }}">
                                </div>
                                <div class="col-10">
                                    <h2>Red Mage</h2>
                                </div>
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