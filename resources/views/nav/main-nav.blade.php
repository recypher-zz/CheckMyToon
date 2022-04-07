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
            <form class="d-flex" method="post" action="{{ route('getPlayerInfo') }}">
                @csrf
                <input class="form-control me-2" type="text" name="player_name" placeholder="Search Players">
                <select class="me-2 rounded" name="server" id="server">
                    <option value="Select a server...">Select a server...</option>
                    <optgroup label="Aether">
                        <option value="Adamantoise">Adamantoise</option>
                        <option value="Cactuar">Cactuar</option>
                        <option value="Faerie">Faerie</option>
                        <option value="Gilgamesh">Gilgamesh</option>
                        <option value="Jenova">Jenova</option>
                        <option value="Midgardsormr">Midgardsormr</option>
                        <option value="Sargatanas">Sargatanas</option>
                        <option value="Siren">Siren</option>
                    </optgroup>
                    <optgroup label="Primal">
                        <option value="Behemoth">Behemoth</option>
                        <option value="Excalibur">Excalibur</option>
                        <option value="Exodus">Exodus</option>
                        <option value="Famfrit">Famfrit</option>
                        <option value="Hyperion">Hyperion</option>
                        <option value="Lamia">Lamia</option>
                        <option value="Leviathan">Leviathan</option>
                        <option value="Ultros">Ultros</option>
                    </optgroup>
                    <optgroup label="Crystal">
                        <option value="Balmung">Balmung</option>
                        <option value="Brynhildr">Brynhildr</option>
                        <option value="Coeurl">Coeurl</option>
                        <option value="Diabolos">Diabolos</option>
                        <option value="Goblin">Goblin</option>
                        <option value="Malboro">Malboro</option>
                        <option value="Mateus">Mateus</option>
                        <option value="Zalera">Zalera</option>
                    </optgroup>
                </select>
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>