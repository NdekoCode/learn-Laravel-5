<div class="container">

    <a href="/" class="header__logo title title-2">Mon site</a>
    <nav class="navbar">
        <ul class="navbar__list start">
            <li class="list__item">
                <a href="/" class="navbar__link">Acceuil</a>
            </li>
        </ul>
        <ul class="navbar__list end">
            @if (auth()->guest())
                <li class="list__item"><a class="btn navbar__link {{ request()->is('login') ? 'is-active': '' }}" href="/login">Connexion</a></li>
                <li class="list__item"><a class="btn navbar__link {{ request()->is('signin') ? 'is-active' :''  }}" href="/signin">Inscription</a></li>
            @else
                <li class="list__item"><a class="btn navbar__link" href="/logout">Deconnexion</a></li>
                <li class="list__item"><a class="navbar__link navbar__link-img {{ request()->is('profile') ? 'is-active' :''  }}" href="/profile"><img class="user-link" src="{{ asset('img/user.svg') }}" width="40" height="40" alt=""></a></li>
            @endif
        </ul>
    </nav>
</div>
