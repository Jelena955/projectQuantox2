<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><h1 class="h3">Invoices</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @foreach($menu as $link)
                    <li class="nav-item @if(request()->routeIs($link->link)) active @endif">
                        <a class="nav-link" href="{{'/user/'.$link->link}}">{{ $link->namenav }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
