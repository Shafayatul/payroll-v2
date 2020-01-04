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
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Settings </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('users') }}">Users</a></li>
                        <li><a href="{{ url('companies') }}">Company</a></li>
                        <li><a href="{{ url('offices') }}">Office</a></li>
                        <li><a href="{{ url('departments') }}">Departments</a></li>
                        <li><a href="{{ url('industries') }}">Industry</a></li>
                        <li><a href="{{ url('public-holiday-calendars') }}">Public Holiday</a></li>
                        <li><a href="{{ url('attendence-working-hours') }}">Attendence</a></li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">Performance</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">General</a></li>
                                <li><a href="{{ url('feedback-categories') }}">Feedback Catgory</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">Recruiting</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">General</a></li>
                                <li><a href="#">Catgories</a></li>
                                <li><a href="{{ url('recruiting-phases') }}">Phases</a></li>
                                <li><a href="{{ url('email-templates') }}">Email</a></li>
                                <li><a href="{{ url('interview-types') }}">Interview Types</a></li>
                                <li><a href="#">Evaluations</a></li>
                                <li><a href="#">Career page</a></li>
                                <li><a href="#">Job descriptions</a></li>
                                <li><a href="#">Applicants</a></li>
                                <li><a href="#">Channels</a></li>
                                <li><a href="#">Roles</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('cost-centers') }}">Cost Center</a></li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">Salary & Payroll</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">General</a></li>
                                <li><a href="{{ url('payroll-groups') }}">Payroll Groups</a></li>
                                <li><a href="{{ url('payroll-histories') }}">Payroll History</a></li>
                                <li><a href="{{ url('recurring-compensation-types') }}">Recurring Compensation Types</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>