<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel Test</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/articles">Home</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if($userToShow=='Guest')
                    <li class="active"><a href="#">{{$userToShow}}</a></li>
                    <li>{!! link_to_action('Auth\AuthController@getLogin','Login') !!}</li>
                    <li>{!! link_to_action('Auth\AuthController@getRegister','Register') !!}</li>
                @else
                    <li class="active"><a href="#">{{$userToShow}}</a></li>
                    <li>{!! link_to_action('Auth\AuthController@getLogout','Logout') !!}</li>

                @endif
            </ul>
        </div>
    </div>
</nav>