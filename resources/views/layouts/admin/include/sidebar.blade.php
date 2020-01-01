<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">PERSONAL</li>
                {{-- <li><i class="mdi mdi-gauge"></i><a href="{{ url('/home') }}">Dashboard</a></li> --}}
                <li>
                    <a href="{{ url('/home') }}" aria-expanded="false">
                        <i class="mdi mdi-gauge"></i>
                        <span class="hide-menu">
                            Dashboard 
                        </span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">
                            Users 
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('users/create') }}">Create</a></li>
                        <li><a href="{{ url('users') }}">Manage</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">
                            Company 
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('companies/create') }}">Create</a></li>
                        <li><a href="{{ url('companies') }}">Manage</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-bank"></i>
                        <span class="hide-menu">
                            Offices 
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('offices/create') }}">Create</a></li>
                        <li><a href="{{ url('offices') }}">Manage</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">
                            Industry 
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('industries/create') }}">Create</a></li>
                        <li><a href="{{ url('industries') }}">Manage</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">
                            Holiday Calendar 
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('public-holiday-calendars/create') }}">Create</a></li>
                        <li><a href="{{ url('public-holiday-calendars') }}">Manage</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">
                            Holiday
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('holidays/create') }}">Create</a></li>
                        <li><a href="{{ url('holidays') }}">Manage</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">
                            Category
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('feedback-categories/create') }}">Create</a></li>
                        <li><a href="{{ url('feedback-categories') }}">Manage</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">
                            Category Attribute
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('feedback-category-attributes/create') }}">Create</a></li>
                        <li><a href="{{ url('feedback-category-attributes') }}">Manage</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>