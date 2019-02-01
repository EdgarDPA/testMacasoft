<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{  'Vendedor' }}
                </a>
               

                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-danger btn-flat"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="glyphicon glyphicon-off"> </i> &nbsp;{{ __('Salir') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
            </div>
        </nav>