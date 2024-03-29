<!-- sideBar-->
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="dashboard">
                        <i class="fas fa-paint-brush me-2"></i>
                        <span>Nails Manager</span>
                </div>

                @can('manage attendance')
                <li class="label"></li>
                <li><a href="/attendance">
                        <i class="far fa-bookmark"></i> Atendimentos </a></li>
                @endcan
                <li class="label"></li>
                <li><a href="/schedules">
                        <i class="fas fa-address-book"></i> Agendamentos </a></li>
          

                    @can('manage users')
                <li><a class="sidebar-sub-toggle">
                        <i class="far fa-user">
                        </i> Usuários
                        <span class="sidebar-collapse-icon ti-angle-down">
                        </span>
                    </a>
                    <ul>
                        <li><a href="/personal-infos"><i class="far fa-address-card"></i>Cadastro Informações</a></li>
                    </ul>
              

                    @role('admin')
                    <ul class=" d-none">
                        <li><a href="/roles"><i class="fas fa-briefcase d-none"></i>Cadastro de cargos</a></li>
                    </ul>

                    <ul>
                        <li><a href="/permissions"><i class="fas fa-lock"></i>Cadastro de permissões</a></li>
                    </ul>

                    <ul>
                        <li><a href="/users-roles"><i class="fas fa-user-tag"></i>Atribuir cargos</a></li>
                    </ul>
                    @endrole
                </li>

                @endcan

                @can('manage services')
                <li class="label"></li>
                <li><a href="/services">
                        <i class="fas fa-stream"></i> Serviços </a></li>
                @endcan
                @role('admin')
                <li class="label"></li>
                <li><a href="/reports">
                        <i class="fas fa-file-alt"></i> Relatórios </a></li>
                        @endrole

            </ul>

        </div>
    </div>
</div>
<!-- /# sidebar -->

<!-- Nav Menu -->
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">

                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <span class="user-avatar">
                                <i class="ti-angle-down f-s-10"></i>
                            </span>
                            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                           @csrf
                                            <a href="route('logout')"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                <i class="ti-power-off"></i>
                                                <span>Sair</span>
                                            </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /# navMenu -->