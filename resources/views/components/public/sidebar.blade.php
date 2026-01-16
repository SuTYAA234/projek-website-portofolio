<header id="header" class="header dark-background d-flex flex-column justify-content-center">
  <i class="header-toggle d-xl-none bi bi-list"></i>

  <div class="header-container d-flex flex-column align-items-start">
    <nav id="navmenu" class="navmenu">
      <ul>
        <li>
          <a href="{{ $title === 'Beranda' ? '#hero' : route('home') . '#hero' }}"
             class="{{ $title === 'Beranda' ? 'active' : '' }}">
            <i class="bi bi-house navicon"></i> Home
          </a>
        </li>

        {{--  <li>
          <a href="{{ $title === 'Beranda' ? '#about' : route('home') . '#about' }}">
            <i class="bi bi-person navicon"></i> About
          </a>
        </li>  --}}

        <li>
          <a href="{{ $title === 'Beranda' ? '#portfolio' : route('home') . '#portfolio' }}">
            <i class="bi bi-images navicon"></i> Portfolio
          </a>
        </li>

        <li>
          <a href="{{ $title === 'Beranda' ? '#testimoni' : route('home') . '#testimoni' }}">
            <i class="bi bi-hdd-stack navicon"></i> Testimoni
          </a>
        </li>

        <li>
          <a href="{{ $title === 'Beranda' ? '#contact' : route('home') . '#contact' }}">
            <i class="bi bi-envelope navicon"></i> Contact
          </a>
        </li>
      </ul>
    </nav>

    <div class="social-links text-center">
     <a href="https://github.com/SuTYAA234?tab=repositories"><i class="bi bi-github"></i></a>
     <a href="https://instagram.com/muhammad_rivan_surya"><i class="bi bi-instagram"></i></a>
  </div>
</header>
