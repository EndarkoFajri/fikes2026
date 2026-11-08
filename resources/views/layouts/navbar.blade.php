<nav class="navbar navbar-expand-lg navbar-dark bg-teal">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      <strong>FIKES</strong> UDS
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('profil.sejarah') }}">Sejarah</a></li>
            <li><a class="dropdown-item" href="{{ route('profil.visi-misi') }}">Visi & Misi</a></li>
            <li><a class="dropdown-item" href="{{ route('profil.dosen') }}">Tenaga Pendidik</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Program Studi</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/program-studi/s1-keperawatan">S1 Keperawatan</a></li>
            <li><a class="dropdown-item" href="/program-studi/profesi-ners">Profesi Ners</a></li>
            <li><a class="dropdown-item" href="/program-studi/d3-kebidanan">D3 Kebidanan</a></li>
            <li><a class="dropdown-item" href="/program-studi/s1-farmasi">S1 Farmasi</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('berita.index') }}">Berita</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('kontak') }}">Kontak</a></li>
      </ul>
    </div>
  </div>
</nav>