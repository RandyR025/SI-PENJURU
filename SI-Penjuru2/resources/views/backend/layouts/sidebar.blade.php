<!-- Menu Start -->
<div class="menu-container flex-grow-1">
  <ul id="menu" class="menu">
    <li>
    @if (auth()->user()->level == "admin")
      <a href="{{route('dashboard')}}" data-href="Dashboards.html" class="{{ Route::is('dashboard') ? 'active' : '' }}">
        <i data-cs-icon="home" class="icon" data-cs-size="18"></i>
        <span class="label">Dashboards</span>
      </a>
    @endif

    @if (auth()->user()->level == "guru")
      <a href="{{route('dashboardguru')}}" data-href="Dashboards.html" class="{{ Route::is('dashboardguru') ? 'active' : '' }}">
        <i data-cs-icon="home" class="icon" data-cs-size="18"></i>
        <span class="label">Dashboards</span>
      </a>
    @endif    
      <!-- <ul id="dashboards">
                  <li>
                    <a href="Dashboards.Default.html">
                      <span class="label">Default</span>
                    </a>
                  </li>
                  <li>
                    <a href="Dashboards.Visual.html">
                      <span class="label">Visual</span>
                    </a>
                  </li>
                  <li>
                    <a href="Dashboards.Analytic.html">
                      <span class="label">Analytic</span>
                    </a>
                  </li>
                </ul> -->
    </li>
    @if (auth()->user()->level == "admin")
    <li>
      <a href="#apps" data-href="Apps.html" class="{{ Route::is('datapengguna')||Route::is('dataguru')||Route::is('datakriteria')||Route::is('showkriteria')||Route::is('datapenilaian') ? 'active' : '' }}">
        <i data-cs-icon="screen" class="icon" data-cs-size="18"></i>
        <span class="label">Kelola Data</span>
      </a>
      <ul id="apps">
        <li>
          <a href="{{route('datapengguna')}}" class="{{ Route::is('datapengguna') ? 'active' : '' }}">
            <span class="label">Data Pengguna</span>
          </a>
        </li>
        <li>
          <a href="{{route('dataguru')}}" class="{{ Route::is('dataguru') ? 'active' : '' }}">
            <span class="label">Data Guru</span>
          </a>
        </li>
        <li>
          <a href="{{route('dataguru')}}" class="">
            <span class="label">Data Wali</span>
          </a>
        </li>
        <li>
          <a href="{{route('datakriteria')}}" class="{{ Route::is('datakriteria') || Route::is('showkriteria') ? 'active' : '' }}">
            <span class="label">Data Kriteria</span>
          </a>
        </li>
        <!-- <li>
          <a href="{{route('datasubkriteria')}}" class="{{ Route::is('datasubkriteria') ? 'active' : '' }}">
            <span class="label">Data Sub Kriteria</span>
          </a>
        </li> -->
        
        <li>
          <a href="{{route('datapenilaian')}}" class="{{ Route::is('datapenilaian') ? 'active' : '' }}">
            <span class="label">Data Penilaian</span>
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="#pages" class="{{ Route::is('perbandingankriteria') ? 'active' : '' }}">
        <i data-cs-icon="notebook-1" class="icon" data-cs-size="18"></i>
        <span class="label">Perhitungan</span>
      </a>
      <ul id="pages">
        <li>
          <a href="{{route('perbandingankriteria')}}" class="{{ Route::is('perbandingankriteria') ? 'active' : '' }}">
            <span class="label">Perbandingan Kriteria</span>
          </a>
        </li>
        <li>
          <a href="#authentication" data-href="Pages.Authentication.html">
            <span class="label">Perbandingan Sub Kriteria</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
  @endif
  @if (auth()->user()->level == "guru")
  <li>
      <a href="#apps" data-href="Apps.html" class="{{ Route::is('penilaiankinerjaguru') ? 'active' : '' }}">
        <i data-cs-icon="screen" class="icon" data-cs-size="18"></i>
        <span class="label">Kelola Data</span>
      </a>
      <ul id="apps">
        <li>
          <a href="{{route('penilaiankinerjaguru')}}" class="{{ Route::is('penilaiankinerjaguru') ? 'active' : '' }}">
            <span class="label">Penilaian Kinerja Guru</span>
          </a>
        </li>
      </ul>
    </li>
    @endif
</div>
<!-- Menu End -->

<!-- Mobile Buttons Start -->
<div class="mobile-buttons-container">
  <!-- Scrollspy Mobile Button Start -->
  <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
    <i data-cs-icon="menu-dropdown"></i>
  </a>
  <!-- Scrollspy Mobile Button End -->

  <!-- Scrollspy Mobile Dropdown Start -->
  <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
  <!-- Scrollspy Mobile Dropdown End -->

  <!-- Menu Button Start -->
  <a href="#" id="mobileMenuButton" class="menu-button">
    <i data-cs-icon="menu"></i>
  </a>
  <!-- Menu Button End -->
</div>
<!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>
</div>