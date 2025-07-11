<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                {{-- Logo SVG tetap --}}
                <!-- ... (SVG logomu di sini, gak diubah) ... -->
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- Dashboard --}}
        <li class="menu-item active">
            <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        {{-- User --}}
        <li class="menu-item">
            <a href="{{ route('user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="User">User</div>
            </a>
        </li>

        {{-- Guru --}}
        <li class="menu-item">
            <a href="{{ route('guru_profiles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                <div data-i18n="Guru Profile">Guru Profile</div>
            </a>
        </li>

        {{-- Siswa --}}
        <li class="menu-item">
            <a href="{{ route('siswa_profiles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-id-card"></i>
                <div data-i18n="Murid Profile">Murid Profile</div>
            </a>
        </li>

        {{-- Form Kelas --}}
        <li class="menu-item">
            <a href="{{ route('backend.form_kelas.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-content"></i>
                <div data-i18n="Form Kelas">Form Kelas</div>
            </a>
        </li>

        {{-- 🆕 Tugas --}}
        <li class="menu-item">
            <a href="{{ route('backend.tugas.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Tugas">Tugas</div>
            </a>
        </li>

        {{-- 🆕 Tugas Projek Akhir --}}
        <li class="menu-item">
            <a href="{{ route('backend.tugas_projek_akhir.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Tugas Projek">Tugas Projek Akhir</div>
            </a>
        </li>

        {{-- 🆕 Tugas Projek Akhir --}}
        <li class="menu-item">
            <a href="{{ route('backend.proyekanggota.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="proyek_anggota">Tugas Projek Anggota</div>
            </a>
        </li>


        {{-- Logout --}}
        <li class="menu-item">
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin mau logout?')">
                @csrf
                <button type="submit" class="menu-link btn btn-link text-start w-100"
                    style="padding: 0.5rem 1rem; border: none; background: none;">
                    <i class="menu-icon tf-icons bx bx-log-out"></i>
                    <span>Logout</span>
                </button>
            </form>
        </li>
    </ul>
</aside>
