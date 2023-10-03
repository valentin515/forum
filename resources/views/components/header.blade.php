<header class="py-3 border-bottom">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="{{route('questions')}}">All questions</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              @auth
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{route('user.questions')}}">My questions</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{route('user.questions.create')}}">Create</a>
                </li>
              @endauth  
            </ul>
            <div class="d-flex align-items-center">
              @guest
                <a class="btn btn-outline-light me-3" aria-current="page" href="{{route('register')}}">Registration</a>
                <a class="btn btn-primary" aria-current="page" href="{{route('login')}}">Log in</a>
              @endguest
              @auth
                <span class="navbar-text bold me-3">{{Auth::user()->nickname}}</span> 
                <x-form action="{{route('logout')}}">
                  <x-button color="outline-light">Log out</x-button>  
                </x-form>
              @endauth
            </div>
          </div>
        </div>
    </nav>    
</header>
    
    
    