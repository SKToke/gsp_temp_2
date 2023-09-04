<div class="collapse navbar-collapse" id="sidebar-menu">
    <ul class="navbar-nav pt-lg-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('students.view') }}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                       <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                       <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                       <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                       <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                       <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                    </svg>
                  </span>
                <span class="nav-link-title">
                    Students
                  </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('exim.view') }}">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-import"
                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3"></path>
                       <path d="M4 6v6c0 1.657 3.582 3 8 3c.856 0 1.68 -.05 2.454 -.144m5.546 -2.856v-6"></path>
                       <path d="M4 12v6c0 1.657 3.582 3 8 3c.171 0 .341 -.002 .51 -.006"></path>
                       <path d="M19 22v-6"></path>
                       <path d="M22 19l-3 -3l-3 3"></path>
                    </svg>
                  </span>
                <span class="nav-link-title">
                    Import
                  </span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
               data-bs-auto-close="false" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path
                           d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                       <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                    </svg>
                  </span>
                <span class="nav-link-title">
                    Settings
                  </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('sponsor.index') }}" rel="noopener">
                    Sponsor
                </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-green" href="#navbar-help" data-bs-toggle="dropdown"
               data-bs-auto-close="false" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-tabler text-green"
                         width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                       <path d="M8 9l3 3l-3 3"></path>
                       <path d="M13 15l3 0"></path>
                       <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                    </svg>
                  </span>
                <span class="nav-link-title">
                    Tabler
                  </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="https://tabler.io/preview" target="_blank" rel="noopener">
                    Preview
                </a>
                <a class="dropdown-item" href="https://tabler-icons.io/" target="_blank" rel="noopener">
                    Icons
                </a>
                <a class="dropdown-item" href="https://tabler.io/docs" target="_blank" rel="noopener">
                    Documentation
                </a>
                <a class="dropdown-item" href="./changelog.html">
                    Changelog
                </a>
                <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank"
                   rel="noopener">
                    Source code
                </a>
                <a class="dropdown-item text-pink" href="https://github.com/sponsors/codecalm"
                   target="_blank" rel="noopener">
                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24"
                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path
                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/>
                    </svg>
                    Sponsor project!
                </a>
            </div>
        </li>
    </ul>
</div>
