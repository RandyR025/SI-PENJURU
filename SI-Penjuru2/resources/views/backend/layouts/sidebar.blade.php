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
      <a href="#pages" data-href="Pages.html">
        <i data-cs-icon="notebook-1" class="icon" data-cs-size="18"></i>
        <span class="label">Pages</span>
      </a>
      <ul id="pages">
        <li>
          <a href="#authentication" data-href="Pages.Authentication.html">
            <span class="label">Authentication</span>
          </a>
          <ul id="authentication">
            <li>
              <a href="Pages.Authentication.Login.html">
                <span class="label">Login</span>
              </a>
            </li>
            <li>
              <a href="Pages.Authentication.Register.html">
                <span class="label">Register</span>
              </a>
            </li>
            <li>
              <a href="Pages.Authentication.ForgotPassword.html">
                <span class="label">Forgot Password</span>
              </a>
            </li>
            <li>
              <a href="Pages.Authentication.ResetPassword.html">
                <span class="label">Reset Password</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#blog" data-href="Pages.Blog.html">
            <span class="label">Blog</span>
          </a>
          <ul id="blog">
            <li>
              <a href="Pages.Blog.Home.html">
                <span class="label">Home</span>
              </a>
            </li>
            <li>
              <a href="Pages.Blog.Grid.html">
                <span class="label">Grid</span>
              </a>
            </li>
            <li>
              <a href="Pages.Blog.List.html">
                <span class="label">List</span>
              </a>
            </li>
            <li>
              <a href="Pages.Blog.Detail.html">
                <span class="label">Detail</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#miscellaneous" data-href="Pages.Miscellaneous.html">
            <span class="label">Miscellaneous</span>
          </a>
          <ul id="miscellaneous">
            <li>
              <a href="Pages.Miscellaneous.Faq.html">
                <span class="label">Faq</span>
              </a>
            </li>
            <li>
              <a href="Pages.Miscellaneous.KnowledgeBase.html">
                <span class="label">Knowledge Base</span>
              </a>
            </li>
            <li>
              <a href="Pages.Miscellaneous.Error.html">
                <span class="label">Error</span>
              </a>
            </li>
            <li>
              <a href="Pages.Miscellaneous.ComingSoon.html">
                <span class="label">Coming Soon</span>
              </a>
            </li>
            <li>
              <a href="Pages.Miscellaneous.Pricing.html">
                <span class="label">Pricing</span>
              </a>
            </li>
            <li>
              <a href="Pages.Miscellaneous.Search.html">
                <span class="label">Search</span>
              </a>
            </li>
            <li>
              <a href="Pages.Miscellaneous.Mailing.html">
                <span class="label">Mailing</span>
              </a>
            </li>
            <li>
              <a href="Pages.Miscellaneous.Empty.html">
                <span class="label">Empty</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#portfolio" data-href="Pages.Portfolio.html">
            <span class="label">Portfolio</span>
          </a>
          <ul id="portfolio">
            <li>
              <a href="Pages.Portfolio.Home.html">
                <span class="label">Home</span>
              </a>
            </li>
            <li>
              <a href="Pages.Portfolio.Detail.html">
                <span class="label">Detail</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#profile" data-href="Pages.Profile.html">
            <span class="label">Profile</span>
          </a>
          <ul id="profile">
            <li>
              <a href="Pages.Profile.Standard.html">
                <span class="label">Standard</span>
              </a>
            </li>
            <li>
              <a href="Pages.Profile.Settings.html">
                <span class="label">Settings</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
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