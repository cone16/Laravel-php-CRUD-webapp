<div id="navbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ $url = action('App\Http\Controllers\Controller@home') }}">
                <h3>F1 Driver Index</h3>
            </a>

            <form class="row"
                action="{{ action('App\Http\Controllers\f1ContentCRUDControllers\findDBController@searchDB') }}"
                method="post" accept-charset="UTF-8">
                @csrf
                <div class="col">
                    <input id="input-field" class="form-control mr-sm-2" type="text" name="search"
                        placeholder="Search Drivers" aria-label="Search" style="width:15rem;">
                </div>
                <div class="col"> <button class="btn btn-outline-success my-2 my-sm-0" type="submit"
                        value="searchButton">Search</button>
                </div>
            </form>
        </div>
</div>
</nav>
</div>
