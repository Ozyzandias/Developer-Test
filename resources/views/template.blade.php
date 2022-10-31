<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Developer Test</title>
        <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="/assets/css/styles.css" rel="stylesheet">
    </head>
    <body>
      <nav id="menu" class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Developer Test</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nvmenu" aria-controls="nvmenu" aria-expanded="false" aria-label="Toggle Menu">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="nvmenu">
              <ul class="navbar-nav ms-auto">

                @if(SESSION('ID_User') != '')
                <li class="nav-item">
                  <a class="nav-link user-mail">{{ SESSION('tst_email') }}</a>
                </li>
                @endif
                @if(SESSION('tst_role') == 1)
                <li class="nav-item">
                  <a href="{{ route('moderation') }}" class="nav-link btn-fav"> Moderation</a>
                </li>
                @endif
                <li class="nav-item">
                  <a href="{{ route('favorites') }}" class="nav-link btn-fav"><i class="fa-solid fa-heart"></i> Favorites</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('upload') }}" class="nav-link btn-upload">Upload</a>
                </li>
                @if(SESSION('ID_User') != '')
                <li class="nav-item">
                  <a href="{{ route('logout') }}" class="nav-link btn-login">Logout</a>
                </li>
                @else
                <li class="nav-item">
                  <a href="{{ route('login') }}" class="nav-link btn-login">Login</a>
                </li>
                @endif
              </ul>
            </div>
        </div>
      </nav>
      @yield('content')
    </body>
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script async src="/assets/js/masonry.min.js"></script>
    <script href="/assets/fontawesome/js/all.min.js"></script>
    @yield('customJS')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

          <div class="modal-body">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
              <div class="col-12">
                <img id="imgprev" />
              </div>
              <div class="col-12">
                <h5 id="descTitle" class="card-title"></h5>
                <p id="descmod">

                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</html>
