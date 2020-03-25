<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
       <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('admin/logout')}}" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
  @include('admin.layout.menu')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('/')}}/design/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('/')}}/design/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{admin()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview  {{ active_menu('')[0] }}">
            <a href="{{aurl('')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>         
          </li> 
       </ul>
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview  {{ active_menu('settings')[0] }}">
            <a href="{{aurl('/settings')}}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Settings
              </p>
            </a>         
          </li> 
       </ul>
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview  {{ active_menu('admin')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Admin Account
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview  {{ active_menu('admin')[1] }}">
              <li class="nav-item">
                <a href="{{aurl('/admin')}}" class="nav-link active">
                  <i class="far fa-user nav-icon"></i>
                  <p>Admins Account</p>
                </a>
              </li>
            </ul>
          </li>
        <li class="nav-item has-treeview  {{ active_menu('users')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Users Account
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('users')[1] }}">
              <li class="nav-item">
                <a href="{{aurl('/users')}}" class="nav-link active">
                  <i class="far fa-user nav-icon"></i>
                  <p> {{ trans('admin.users') }}</p>
                </a>
              </li>
                <li class="nav-item"><a class="nav-link " href="{{ aurl('/users') }}?level=user"><i class="fa fa-users"></i> {{ trans('admin.user') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/users') }}?level=vendor"><i class="fa fa-users"></i> {{ trans('admin.vendor') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/users') }}?level=company"><i class="fa fa-users"></i> {{ trans('admin.company') }}</a></li>
            </ul>
          </li>
          <!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('news')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                {{ trans('admin.news') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('news')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/news') }}"><i class="fa fa-flag"></i> {{ trans('admin.news') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/news/create') }}"><i class="fa fa-flag"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
          <li class="nav-item has-treeview  {{ active_menu('countries')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                {{ trans('admin.countries') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('countries')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/countries') }}"><i class="fa fa-flag"></i> {{ trans('admin.countries') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/countries/create') }}"><i class="fa fa-flag"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('cities')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                {{ trans('admin.cities') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('cities')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/cities') }}"><i class="fa fa-flag"></i> {{ trans('admin.cities') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/cities/create') }}"><i class="fa fa-flag"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('states')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                {{ trans('admin.states') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('states')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/states') }}"><i class="fa fa-flag"></i> {{ trans('admin.states') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/states/create') }}"><i class="fa fa-flag"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('departments')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-list"></i>
              <p>
                {{ trans('admin.departments') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('departments')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/departments') }}"><i class="fa fa-list"></i> {{ trans('admin.departments') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/departments/create') }}"><i class="fa fa-list"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('trademarks')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                {{ trans('admin.trademarks') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('trademarks')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/trademarks') }}"><i class="fa fa-flag"></i> {{ trans('admin.trademarks') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/trademarks/create') }}"><i class="fa fa-flag"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('manufacturers')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                {{ trans('admin.manufacturers') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('manufacturers')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/manufacturers') }}"><i class="fa fa-user"></i> {{ trans('admin.manufacturers') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/manufacturers/create') }}"><i class="fa fa-user"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('shipping')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                {{ trans('admin.shipping') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('shipping')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/shipping') }}"><i class="fa fa-truck"></i> {{ trans('admin.shipping') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/shipping/create') }}"><i class="fa fa-truck"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('malls')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-building"></i>
              <p>
                {{ trans('admin.malls') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('malls')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/malls') }}"><i class="fa fa-building"></i> {{ trans('admin.malls') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/malls/create') }}"><i class="fa fa-building"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('colors')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-paint-brush"></i>
              <p>
                {{ trans('admin.colors') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('colors')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/colors') }}"><i class="fa fa-paint-brush"></i> {{ trans('admin.colors') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/colors/create') }}"><i class="fa fa-paint-brush"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('sizes')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                {{ trans('admin.sizes') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('sizes')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/sizes') }}"><i class="fa fa-circle"></i> {{ trans('admin.sizes') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/sizes/create') }}"><i class="fa fa-circle"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('weights')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                {{ trans('admin.weights') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('weights')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/weights') }}"><i class="fa fa-circle"></i> {{ trans('admin.weights') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/weights/create') }}"><i class="fa fa-circle"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
<!--------------------start ----------------------------------------------->
            <li class="nav-item has-treeview  {{ active_menu('products')[0] }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                {{ trans('admin.products') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
         
             <ul class="nav nav-treeview  {{ active_menu('products')[1] }}">
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/products') }}"><i class="fa fa-tag"></i> {{ trans('admin.products') }}</a></li>
          <li class="nav-item"><a class="nav-link " href="{{ aurl('/products/create') }}"><i class="fa fa-tag"></i> {{ trans('admin.add') }}</a></li>
            </ul>
          </li>
<!--------------------end ----------------------------------------------->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  