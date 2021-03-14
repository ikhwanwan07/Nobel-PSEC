 <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @if (auth()->user()->role == 'admin')
                            <div class="sb-sidenav-menu-heading">Dasboard</div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="/user">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                User
                            </a>
                            <a class="nav-link" href="/siswa">
                                <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                               Data Siswa
                            </a>
                            <a class="nav-link" href="/guru">
                                <div class="sb-nav-link-icon"><i class="fa fa-user-plus"></i></div>
                                Data Guru
                            </a>
                            <a class="nav-link" href="/pembayaran-admin">
                                <div class="sb-nav-link-icon"><i class="fa fa-money"></i></div>
                                Pembayaran
                            </a>
                            @endif
                            @if (auth()->user()->role == 'guru')
                            <div class="sb-sidenav-menu-heading">Pengajar</div>
                            <a class="nav-link" href="/jawaban-siswa">
                                <div class="sb-nav-link-icon"><i class="fa fa-bookmark-o"></i></div>
                                Jawaban
                            </a>
                            <a class="nav-link" href="/materi">
                                <div class="sb-nav-link-icon"><i class="fa fa-bookmark-o"></i></div>
                                Materi
                            </a>
                            <a class="nav-link" href="/soal">
                                <div class="sb-nav-link-icon"><i class="fa fa-tasks"></i></div>
                                Latihan
                            </a>
                            <a class="nav-link" href="/nilai">
                                <div class="sb-nav-link-icon"><i class="fa fa-line-chart"></i></div>
                                Nilai
                            </a>
                            <a class="nav-link" href="/kelas">
                                <div class="sb-nav-link-icon"><i class="fa fa-graduation-cap"></i></div>
                                kelas
                            </a>
                            <a class="nav-link" href="{{ route('pembayaran.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-money"></i></div>
                                Pembayaran
                            </a>
                            @endif
                            @if (auth()->user()->role == 'siswa')


                            <div class="sb-sidenav-menu-heading">Siswa</div>
                            <a class="nav-link" href="/jawaban">
                                <div class="sb-nav-link-icon"><i class="fa fa-bar-chart"></i></div>
                               Jawaban
                            </a>
                            <a class="nav-link" href="/pembayaran-siswa">
                                <div class="sb-nav-link-icon"><i class="fa fa-money"></i></div>
                                Pembayaran
                            </a>
                            <a class="nav-link" href="/materi-siswa">
                                <div class="sb-nav-link-icon"><i class="fa fa-bookmark-o"></i></div>
                                Materi
                            </a>
                            <a class="nav-link" href="/soal-siswa">
                                <div class="sb-nav-link-icon"><i class="fa fa-tasks"></i></div>
                                Latihan
                            </a>
                            @endif
                        </div>
                    </div>

                </nav>
            </div>
