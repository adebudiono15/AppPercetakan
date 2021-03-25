<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{-- {{ Auth::user()->name }} --}} Nama
                            <span class="user-level">
                                Role User
                                {{-- {{ Auth::user()->nip }} --}}
                            </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-danger">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('supplier','customer','barang','logistik') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#master">
                        <i class="fas fa-layer-group"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('barang','customer','logistik','supplier') ? 'show' : '' }}" id="master">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('barang') ? 'active' : '' }}">
                                <a href="{{ url('barang') }}">
                                    <span class="sub-item">Barang</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('customer') ? 'active' : '' }}">
                                <a href="{{ url('customer') }}">
                                    <span class="sub-item">Customer</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('kategori') ? 'active' : '' }}">
                                <a href="{{ url('kategori') }}">
                                    <span class="sub-item">Kategori</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('logistik') ? 'active' : '' }}">
                                <a href="{{ url('logistik') }}">
                                    <span class="sub-item">Logistik</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('supplier') ? 'active' : '' }}">
                                <a href="{{ url('supplier') }}">
                                    <span class="sub-item">Supplier</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ Request::is('logistik-masuk', 'logistik-keluar') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#logistik">
                        <i class="fas fa-shopping-bag"></i>
                        <p>Logistik</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('logistik-masuk', 'logistik-keluar') ? 'show' : '' }}" id="logistik">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('logistik-masuk') ? 'active' : '' }}">
                                <a href="{{ url('logistik-masuk') }}">
                                    <span class="sub-item">Logistik Masuk</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('logistik-keluar') ? 'active' : '' }}">
                                <a href="{{ url('logistik-keluar') }}">
                                    <span class="sub-item">Logistik Keluar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ Request::is('po','history-po','cek-status') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#po">
                        <i class="fas fa-shipping-fast"></i>
                        <p>Preorder</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('po','history-po','cek-status') ? 'show' : '' }}" id="po">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('po') ? 'active' : '' }}">
                                <a href="{{ url('po') }}">
                                    <span class="sub-item">Input PO</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('cek-status') ? 'active' : '' }}">
                                <a href="{{ url('cek-status') }}">
                                    <span class="sub-item">Update Status PO</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('history-po') ? 'active' : '' }}">
                                <a href="{{ url('history-po') }}">
                                    <span class="sub-item">History PO</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->