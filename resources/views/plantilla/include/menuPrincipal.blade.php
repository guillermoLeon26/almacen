<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-th-list"></i> <span>Inventario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            
            <li><a href="{{ url('admin/inventario/productos') }}"><i class="glyphicon glyphicon-apple"></i>Productos</a></li>

            <li><a href="{{ url('admin/inventario/bodegas') }}"><i class="fa fa-bank"></i>Bodegas</a></li>

            <li><a href="{{ url('inventario/ingreso') }}"><i class="fa fa-archive"></i> Ingreso</a></li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-truck"></i> <span>Envios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
                      
              <ul class="treeview-menu">
                <li><a href="{{ url('inventario/enviosCompras') }}"><i class="fa fa-circle-o"></i>A sucursal</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Otros</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-gear"></i> <span>Configuración</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
                      
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/inventario/configuracion/Color') }}"><i class="fa fa-circle-o"></i> Colores</a></li>
                <li><a href="{{ url('admin/inventario/configuracion/unidad') }}"><i class="fa fa-circle-o"></i> Unidades de Medida</a></li>
                <li><a href="{{ url('admin/inventario/configuracion/marca') }}"><i class="fa fa-circle-o"></i> Marcas</a></li>
              </ul>
            </li>
          </ul>
        </li> 

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-book"></i>
            <span>Contabilidad</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dollar"></i> <span>Precio del Producto</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
                      
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/cont/precio/menor') }}"><i class="fa fa-circle-o"></i>Menor</a></li>
                <li><a href="{{ url('admin/cont/precio/mayor') }}"><i class="fa fa-circle-o"></i> Mayor</a></li>
              </ul>
            </li>

            <li><a href="{{ url('admin/cont/config') }}"><i class="fa fa fa-gear"></i>Configuración</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-shopping-cart"></i>
            <span>Compras</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a href="#"><i class="glyphicon glyphicon-list"></i>Listado</a></li>
            <li><a href="{{ url('admin/compras/proveedores') }}"><i class="fa fa-industry"></i>Proveedores</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa fa-gear"></i>
            <span>Configuración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/config/ciudades') }}"><i class="fa fa-circle-o"></i>Ciudades</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>