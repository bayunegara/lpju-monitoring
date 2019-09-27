  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li {{ (Request::is('/') ? 'class=active' : '') }}>
          <a href="{{ URL('/') }}">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li {{ (Request::is('hardwares') ? 'class=active' : '') }}>
          <a href="{{ URL('hardwares') }}">
            <i class="fa fa-th"></i>
            <span>Hardwares</span>
          </a>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-files-o"></i>
            <span>Report</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
