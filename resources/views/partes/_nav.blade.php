
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Blog em Laravel</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="{{Request::is('/') ? "active" : ""}}"><a href="/">Home</a></li>
          <li class="{{Request::is('contact') ? "active" : ""}}"><a href="/contact">Contato</a></li>
          <li class="{{Request::is('blog') ? "active" : ""}}"><a href="/blog">Blog</a></li>
          <li class="{{Request::is('about') ? "active" : ""}}"><a href="/about">Sobre</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
   
        <li class="dropdown">
        @if (Auth::guest())
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Área restrita <span class="caret">
          <ul class="dropdown-menu">
            <li><a href="{{ route('login') }}">Login</a></li>
          </ul>
          </span></a>
         @else
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('posts.index')}}">Ver Posts</a></li>
            <li><a href="{{route('posts.create')}}">Criar Posts</a></li>
            <li role="separator" class="divider"></li>
             <li><a href="{{route('categorias.index')}}">Ver Categorias</a></li>
             <li><a href="{{route('tags.index')}}">Ver Tags</a></li>
            <li role="separator" class="divider"></li>
           
                <li>
                  <a href="{{ route('logout') }}"
                 >
                  Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            
          </ul>
        </li>
         @endif
      </ul>
      
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</nav>

