<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('landing') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{ asset('images/lpkn-logo.png') }}" alt="">
						  {{-- <h3><b>Sunny</b> Admin</h3> --}}
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        @role('super admin')
		<li>
          <a href="{{ route('dashboard.index') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Data Pendaftar</span>
          </a>
        </li>

        <li>
            <a href="{{route('narasumber')}}">
              <i data-feather="server"></i>
              <span>Data Narasumber</span>
            </a>
        </li>
        <li>
            <a href="{{route('mambership')}}">
              <i data-feather="server"></i>
              <span>Data Mambership</span>
            </a>
        </li>
        <li>
            <a href="{{route('metodepembayaran')}}">
              <i data-feather="server"></i>
              <span>Metode Pembayaran</span>
            </a>
        </li>
        <li class="header nav-small-cap">Keamanan</li>
        <li class="treeview">
            <a href="#">
              <i data-feather="lock"></i>
              <span>Auth</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('user.index') }}"><i class="ti-more"></i>Users</a></li>
              <li><a href="{{ route('role.index') }}"><i class="ti-more"></i>Roles</a></li>
              <li><a href="{{ route('permission.index') }}"><i class="ti-more"></i>Permissions</a></li>
            </ul>
        </li>

		<li class="header nav-small-cap">EXTRA</li>

        <li class="treeview">
          <a href="#">
            <i data-feather="layers"></i>
			<span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Level One</a></li>
            <li class="treeview">
              <a href="#">Level One
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Level Two</a></li>
                <li class="treeview">
                  <a href="#">Level Two
                    <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#">Level Three</a></li>
                    <li><a href="#">Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Level One</a></li>
          </ul>
        </li>

		<li>
          <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i data-feather="alert-triangle"></i>
			<span>Log Out</span>
          </a>
        </li>

        @elserole('user')
        <li>
            <a href="{{ route('user.dashboard.membership') }}">
              <i data-feather="pie-chart"></i>
              <span>Daftar Konsultasi</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i data-feather="message-circle"></i>
              <span>Konsultasi Sekarang</span>
            </a>
          </li>

          <li>
              <a href="{{ route('dashboard.user.invoiceprofil') }}">
                <i data-feather="server"></i>
                <span>Invoice</span>
              </a>
          </li>

          <li>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              <i data-feather="alert-triangle"></i>
              <span>Log Out</span>
            </a>
          </li>
        @endrole
      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
</aside>
@include('auth.logout')
