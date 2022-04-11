<x-master>
    <x-slot name="apierror">
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center my-4">
                    <h1 id="titleHead" class="text-light">Looks like something went wrong :(</h1>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center my-3">
                    <h3 id="titleHead" class="text-light"> Error: {{ $apiError }}</h3>
                </div>
            </div>
        </div>
    </x-slot>
</x-master>