<nav class="navbar navbar-default" role="navigation">
 <div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse"
          data-target=".navbar-ex1-collapse">
    <span class="sr-only">Desplegar navegación</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="http://producciontucuman.gob.ar"><img src="{{ asset('images/logo.png')}}" srcset="{{ asset('images/logo.png')}} 2x" ></a>
</div>

    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li class="@yield('empleado')"><a href="{{ asset('admin/empleado')}}">Gestionar Consultor</a></li>
        <li class="@yield('contrato')"><a href="{{ asset('admin/contrato')}}">Gestionar Contrato</a></li>
        <li class="@yield('reparticion')"><a href="{{ asset('admin/distribution')}}">Gestionar Reparticion</a></li>
        <li class="@yield('programa')"><a href="{{ asset('admin/programa')}}">Gestionar Programa</a></li>
        <li class="@yield('usuario')"><a href="{{ asset('admin/user')}}">Gestion de Usuario</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filtrar por... <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Filtro Nº1</a></li>
            <li><a href="#">Filtro Nº2</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Grafica de Programas</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{asset('/')}}"><img src="{{asset('images/marca_tucuman.png')}}" srcset="{{asset('images/marca_tucuman.png')}} 2x"></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Cerrar Sesion</a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             {{ csrf_field() }}
                         </form></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  <!-- /.container-fluid -->
</nav>
