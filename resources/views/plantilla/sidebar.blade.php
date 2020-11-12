<div class="sidebar bg-dark">
    <ul class="navigation-menu bg-dark text-white mx-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i style="font-size: 50px" class="fas fa-user-circle text-white"></i>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
              <a class="dropdown-item" href="#">Actualizar mi Cuenta</a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                   <small class="dropdown-item">
                       <i class="fas fa-sign-out-alt"></i>Cerrar Sesion
                   </small>
                </x-jet-dropdown-link>
            </form>
            </div>
          </li>
      <li>
        <a href="{{ route('home') }}">
          <span class="link-title text-white">Mis Archivos</span>
          <i class="mdi mdi-folder link-icon text-white"></i>
        </a>
      </li>
      <li>
        <a href="{{ route('myPlan') }}">
          <span class="link-title text-white">Mi plan</span>
          <i class="fas fa-user link-icon text-white"></i>
        </a>
      </li>
    </ul>
  </div>
