    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/admin">Performant</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="@if( strpos(Request::path(), 'admin/user') !== FALSE )active@endif"><a href="/admin/user">Users</a></li>
              <li class="@if( strpos(Request::path(), 'admin/article') !== FALSE )active@endif"><a href="/admin/article">Articles</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>