<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand homeLink" id="navTitle" href="{{ url('/') }}"><h4>Check My Toon</h4></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#top-nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-4" id="top-nav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profiles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/news') }}">FF News</a>
                </li>
            </ul>
            <form class="d-flex" method="POST" action="{{ route('loadPlayerInfo') }}">
                @csrf
                <input class="form-control me-2" type="text" name="player_name" placeholder="Search Players">
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
</nav>