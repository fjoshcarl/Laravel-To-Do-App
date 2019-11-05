  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/')}}">
        {{ config('app.name', 'Laraveltest')}}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{route('pages.index')}}" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{route('pages.about')}}" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="{{route('pages.test')}}" class="nav-link">Test</a>
          </li>
          <li class="nav-item">
            <a href="#" onclick="addToHomeScreen()" class="nav-link">
              <span class="uk-margin-small-right" data-uk-icon="icon: plus"></span>
              Add to Home Screen
            </a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{route('todos.index')}}" class="nav-link">Todos</a>
          </li>
          <li class="nav-item">
            <a href="{{route('todos.create')}}" class="nav-link">New Todo</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
