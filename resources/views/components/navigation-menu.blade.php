   <!--begin::Sidebar-->
   <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
       <!--begin::Sidebar Brand-->
       <div class="sidebar-brand">
           <!--begin::Brand Link-->
           <a href="{{ route('panel.index') }}" class="brand-link">
               <!--begin::Brand Image-->
               <img src="/img/logo.png" alt="Logo" class="brand-image opacity-75 shadow" />
               <!--end::Brand Image-->
               <!--begin::Brand Text-->
               <span class="brand-text fw-light">G-P</span>
               <!--end::Brand Text-->
           </a>
           <!--end::Brand Link-->
       </div>
       <!--end::Sidebar Brand-->
       <!--begin::Sidebar Wrapper-->
       <div class="sidebar-wrapper">
           <nav class="mt-2">
               <!--begin::Sidebar Menu-->
               <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                   data-accordion="false">
                   <li class="nav-header">PANEL</li>
                   <li class="nav-item">
                       <a href="{{ route('panel.index') }}" class="nav-link">
                           <i class="nav-icon bi bi-speedometer2"></i>
                           <p>INICIO</p>
                       </a>
                   </li>
                   <li class="nav-header">OPCIONES</li>
                   <li class="nav-item">
                       <a href="{{ route('clientes.index') }}" class="nav-link">
                           <i class="nav-icon bi bi-people"></i>
                           <p>CLIENTES</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('guias.index') }}" class="nav-link">
                           <i class="nav-icon bi bi-person-badge"></i>
                           <p>GUIAS</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('paquetes.index') }}" class="nav-link">
                           <i class="nav-icon bi bi-box-seam"></i>
                           <p>PAQUETES</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('reservas.index') }}" class="nav-link">
                          <i class="nav-icon bi bi-calendar-check"></i>
                           <p>RESERVA</p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('transportes.index') }}" class="nav-link">
                           <i class="nav-icon bi bi-truck"></i>
                           <p>TRANSPORTE</p>
                       </a>
                   </li>
               </ul>
               <!--end::Sidebar Menu-->
           </nav>
       </div>
       <!--end::Sidebar Wrapper-->
   </aside>
