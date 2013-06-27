    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/{{$adminGroup}}">Fideloper.com</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="@if( strpos(Request::path(), '{{$adminGroup}}/user') !== FALSE )active@endif"><a href="/{{$adminGroup}}/user">Users</a></li>
              <li class="dropdown @if( strpos(Request::path(), '{{$adminGroup}}/article') !== FALSE )active@endif">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Articles <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/{{$adminGroup}}/article">All Articles</a></li>
                  <li><a href="/{{$adminGroup}}/article/create">New Article</a></li>
                </ul>
              </li>
              <li><a href="/{{$adminGroup}}/article/create">New Article</a></li>
            </ul>
            <ul class="nav pull-right">
              <li><a href="/{{$adminGroup}}/logout">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>