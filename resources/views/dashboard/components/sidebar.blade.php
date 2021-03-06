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

                <li class="treeview">
                    <a href="#">
                        <i data-feather="server"></i>
                        <span>Narasumber</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.dashboard.narasumber') }}"><i class="ti-more"></i>User Narasumber</a></li>
                        <li><a href="{{ route('admin.dashboard.narasumber.profile') }}"><i class="ti-more"></i>Profile Narasumber</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.dashboard.invoice') }}">
                        <i data-feather="book-open"></i>
                        <span>Data Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('metodepembayaran') }}">
                        <i data-feather="dollar-sign"></i>
                        <span>Metode Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.dashboard.zoom') }}">
                        <i data-feather="video"></i>
                        <span>Paket Zoom</span>
                    </a>
                </li>
                <li>
                  <a href="/chat">
                      <i data-feather="pie-chart"></i>
                      <span>Akses Konsultasi</span>
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
                        <li><a href="{{ route('permission.index') }}"><i
                                    class="ti-more"></i>Permissions</a></li>
                    </ul>
                </li>

                <li class="header nav-small-cap">Tambahan</li>

                <li>
                    <a href="{{ route('artikel.index') }}">
                        <i data-feather="printer"></i>
                        <span>Artikel</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('regulasi.index') }}">
                        <i data-feather="download-cloud"></i>
                        <span>Regulasi</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('faq.index') }}">
                        <i class="fa fa-question" aria-hidden="true"></i>
                        <span>FAQ</span>
                    </a>
                </li>

                {{-- <li>
          <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i data-feather="alert-triangle"></i>
                <span>Log Out</span>
                </a>
                </li> --}}

                @elserole('user')
                    <li>
                        <a href="{{ route('user.dashboard.membership') }}">
                            <i data-feather="pie-chart"></i>
                            <span>Daftar Konsultasi</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard.chat') }}">
                            <i data-feather="message-circle"></i>
                            <span>Konsultasi Sekarang</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.dashboard.invoice') }}">
                            <i data-feather="server"></i>
                            <span>Invoice</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.dashboard.kwitansi') }}">
                            <i data-feather="archive"></i>
                            <span>Kwitansi</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            <i data-feather="alert-triangle"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                    @elserole('narasumber')
                        @php
                            $profile = App\Models\Profile::where('user_id', Auth::user()->id)->first();
                        @endphp
                        @if(is_null($profile))
                            <li>
                                <a target="_blank" href="/chat">
                                    <i data-feather="pie-chart"></i>
                                    <span>Jawab Konsultasi</span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a target="_blank" href="/chat">
                                    <i data-feather="pie-chart"></i>
                                    <span>Jawab Konsultasi</span>
                                </a>
                            </li>
                        @endif
                    @endrole
        </ul>
    </section>

    {{-- <div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div> --}}
</aside>
@include('auth.logout')
