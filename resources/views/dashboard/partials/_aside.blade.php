<aside class="app-side" id="app-side">
    <!-- BEGIN .side-content -->
    <div class="side-content ">
        <!-- BEGIN .user-actions -->

        <!-- END .user-actions -->
        <!-- BEGIN .side-nav -->
        <nav class="side-nav">
            <!-- BEGIN: side-nav-content -->
            <ul class="unifyMenu" id="unifyMenu">

                <!-- Home -->

                <li class="{{ is_null(request()->segment(1)) ? 'active selected' : '' }}">
                    <a href="{{ route('dashboard.home') }}">
                        <span class="has-icon">
                            <i class="icon-laptop2"></i>
                        </span>
                        <span class="nav-title">@lang('site.home')</span>
                    </a>
                </li>



                 <!-- Users -->

                 <li class="{{ activeLink('users') }}">
                    <a href="{{ route('dashboard.users.index') }}">
                        <span class="has-icon">
                            <i class="icon-users"></i>
                        </span>
                        <span class="nav-title">@lang('site.users')</span>
                    </a>
                </li>


                <!-- Setup -->

                <li class="{{ activeLink('setup',true) }}">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-gears"></i>
                        </span>
                        <span class="nav-title">@lang('site.setup')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse" style="">
                        <!-- Client types -->
                        <li>
                            <a class="{{ activeLink('client-types',true) }}" href="{{ route('dashboard.client-types.index') }}">
                                <span class="mx-1">
                                    <i class="icon-border_all"></i>
                                </span>
                                <span>@lang('site.client_types')</span>
                            </a>
                        </li>

                        <!-- Teams -->
                        <li class="treeview">
                            <a class="{{ activeLink('teams',true) }}" href="{{ route('dashboard.teams.index') }}">
                                <span class="mx-1">
                                    <i class="icon-users2"></i>
                                </span>
                                <span>@lang('site.teams')</span>
                            </a>
                        </li>
                        <!-- Resources -->
                        <li>
                            <a class="{{ activeLink('resources',true) }}" href="{{ route('dashboard.resources.index') }}">
                                <span class="mx-1">
                                    <i class="icon-extension"></i>
                                </span>
                                <span>@lang('site.resources')</span>
                            </a>
                        </li>
                        <!--------------------Cost-Setup-------------------------->
                        <li>
                            <a class="{{ activeLink('costs',true) }}" href="{{ route('dashboard.costs.index') }}">
                                <span class="mx-1">
                                    <i class="icon-credit-card"></i>
                                </span>
                                <span>@lang('site.cost_setup')</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Clients -->

                <li class="{{ activeLink('clients') }}">
                    <a href="{{ route('dashboard.clients.index') }}">
                        <span class="has-icon">
                            <i class="icon-user"></i>
                        </span>
                        <span class="nav-title">@lang('site.clients')</span>
                    </a>
                </li>


                <!-- Contacts -->

                <li class="{{ activeLink('contacts') }}">
                    <a href="{{ route('dashboard.contacts.index') }}">
                        <span class="has-icon">
                            <i class="icon-contacts"></i>
                        </span>
                        <span class="nav-title">@lang('site.contacts')</span>
                    </a>
                </li>

                <!-- Opportunities -->

                <li class="{{ activeLink('opportunities') }}">
                    <a href="{{ route('dashboard.opportunities.index') }}">
                        <span class="has-icon">
                            <i class="icon-light-bulb"></i>
                        </span>
                        <span class="nav-title">@lang('site.pipeline')</span>
                    </a>
                </li>

                <!---------------Costing------------------------->
                <li class="{{ activeLink('costing') }}">
                    <a href="{{ route('dashboard.costing.index') }}">
                        <span class="has-icon">
                            <i class="icon-credit-card"></i>
                        </span>
                        <span class="nav-title">@lang('site.costing')</span>
                    </a>
                </li>


                <!-- Invoices -->

                <li class="{{ activeLink('invoices') }}">
                    <a href="{{ route('dashboard.invoices.index') }}">
                        <span class="has-icon">
                            <i class="icon-attach_money"></i>
                        </span>
                        <span class="nav-title">@lang('site.invoices')</span>
                    </a>
                </li>


                <!-- Reports -->

                <li class="{{ activeLink('reports',true) }}">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-file-text2"></i>
                        </span>
                        <span class="nav-title">@lang('site.reports')</span>
                    </a>
                    <ul aria-expanded="false" class="collapse" style="">
                        <!-- Opportunity reports -->
                        <li>
                            <a class="{{ activeLink('opportunity-report',true) }}" href="{{ route('dashboard.opportunity-report') }}">
                                <span class="mx-1">
                                    <i class="icon-light-bulb"></i>
                                </span>
                                <span>@lang('site.opportunity-report')</span>
                            </a>
                        </li>

                        <li>
                            <a class="{{ activeLink('proposal-report',true) }}" href="{{ route('dashboard.proposal-report') }}">
                                <span class="mx-1">
                                    <i class="icon-light-bulb"></i>
                                </span>
                                <span>@lang('site.proposal-report')</span>
                            </a>
                        </li>


                        <!-- Activity reports -->
                        <li class="{{ activeLink('activity-report',true) }}">
                            <a class="{{ activeLink('activity-report',true) }}" href="{{ route('dashboard.activity-report') }}">
                                <span class="mx-1">
                                    <i class="icon-light-bulb"></i>
                                </span>
                                <span>@lang('site.activity-report')</span>
                            </a>
                        </li>


                        <li>
                            <a class="{{ activeLink('invoice-report',true) }}" href="{{ route('dashboard.invoice-report') }}">
                                <span class="mx-1">
                                    <i class="icon-light-bulb"></i>
                                </span>
                                <span>@lang('site.invoice-report')</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="{{ activeLink('permissions') }}">
                    <a href="{{ route('dashboard.permissions.index') }}">
                        <span class="has-icon">
                            <i class="icon-lock-closed"></i>
                        </span>
                        <span class="nav-title">@lang('site.roles_permissions')</span>
                    </a>
                </li>

                <li class="{{ activeLink('settings') }}">
                    <a href="{{ route('dashboard.settings') }}">
                        <span class="has-icon">
                            <i class="icon-settings"></i>
                        </span>
                        <span class="nav-title">@lang('site.settings')</span>
                    </a>
                </li>



            </ul>


            <!-- END: side-nav-content -->
        </nav>
        <!-- END: .side-nav -->
    </div>
    <!-- END: .side-content -->
</aside>
