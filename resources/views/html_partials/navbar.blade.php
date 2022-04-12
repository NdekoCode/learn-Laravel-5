<div class="container">
    @include('html_partials.links',['classLink'=>'header__logo title title-2',
    'link'=>'/','linkTitle'=>"Mon site",'list'=>false])
    <nav class="navbar">
        <ul class="navbar__list start">
            
    @include('html_partials.links',['classLink'=>'navbar__link',
    'link'=>'/','linkTitle'=>"Acceuil",'list'=>true])
        </ul>
        <ul class="navbar__list end">
            @if (auth()->guest())
            
    @include('html_partials.links',['classLink'=>'btn navbar__link',
    'link'=>'/login','linkTitle'=>"Connexion",'list'=>true])
    
    @include('html_partials.links',['classLink'=>'btn navbar__link',
    'link'=>'/signin','linkTitle'=>"Inscription",'list'=>true])
            @else
            
    @include('html_partials.links',['classLink'=>'btn navbar__link',
    'link'=>'/logout','linkTitle'=>"Deconnexion",'list'=>true])
                <li class="list__item"><a class=" navbar__link-img {{ request()->is('profile') ? 'is-active' :''  }}" href="/profile"><img class="user-link" src="{{ asset('img/user.svg') }}" width="40" height="40" alt=""></a></li>
            @endif
        </ul>
    </nav>
</div>
