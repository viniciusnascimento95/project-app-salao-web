<div class="col-sm-2">
  <aside class="main-sidebar" style="background-color: #4759E4; border-radius: 15px;">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-white" href="{{route('home')}}"><i class="fas fa-home"></i> Principal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{route('clients.index')}}"><i class="fas fa-users"></i>   Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{route('clients.create')}}"><i class="fas fa-user-plus"></i> Novo cliente</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{route('schedules.index')}}"><i class="fas fa-address-book"></i> Agendamentos</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link text-white" href="{{route('schedules.create')}}"><i class="fas fa-address-card"></i> Novo agendamento</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link text-white" href="{{route('report')}}"><i class="fas fa-chart-line"></i> Relatório</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
          {{ __('Logout') }}
          </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
        @csrf
        </form>
      </li>
    </ul>
  </aside>
</div>
