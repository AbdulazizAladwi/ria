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

                <li class="<?php echo e(is_null(request()->segment(1)) ? 'active selected' : ''); ?>">
                    <a href="<?php echo e(route('dashboard.home')); ?>">
                        <span class="has-icon">
                            <i class="icon-laptop2"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.home'); ?></span>
                    </a>
                </li>



                 <!-- Users -->

                 <li class="<?php echo e(activeLink('users')); ?>">
                    <a href="<?php echo e(route('dashboard.users.index')); ?>">
                        <span class="has-icon">
                            <i class="icon-users"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.users'); ?></span>
                    </a>
                </li>


                <!-- Setup -->

                <li class="<?php echo e(activeLink('setup',true)); ?>">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-gears"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.setup'); ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse" style="">
                        <!-- Client types -->
                        <li>
                            <a class="<?php echo e(activeLink('client-types',true)); ?>" href="<?php echo e(route('dashboard.client-types.index')); ?>">
                                <span class="mx-1">
                                    <i class="icon-border_all"></i>
                                </span>
                                <span><?php echo app('translator')->get('site.client_types'); ?></span>
                            </a>
                        </li>

                        <!-- Teams -->
                        <li class="treeview">
                            <a class="<?php echo e(activeLink('teams',true)); ?>" href="<?php echo e(route('dashboard.teams.index')); ?>">
                                <span class="mx-1">
                                    <i class="icon-users2"></i>
                                </span>
                                <span><?php echo app('translator')->get('site.teams'); ?></span>
                            </a>
                        </li>
                        <!-- Resources -->
                        <li>
                            <a class="<?php echo e(activeLink('resources',true)); ?>" href="<?php echo e(route('dashboard.resources.index')); ?>">
                                <span class="mx-1">
                                    <i class="icon-extension"></i>
                                </span>
                                <span><?php echo app('translator')->get('site.resources'); ?></span>
                            </a>
                        </li>
                        <!--------------------Cost-Setup-------------------------->
                        <li>
                            <a class="<?php echo e(activeLink('costs',true)); ?>" href="<?php echo e(route('dashboard.costs.index')); ?>">
                                <span class="mx-1">
                                    <i class="icon-credit-card"></i>
                                </span>
                                <span><?php echo app('translator')->get('site.cost_setup'); ?></span>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Clients -->

                <li class="<?php echo e(activeLink('clients')); ?>">
                    <a href="<?php echo e(route('dashboard.clients.index')); ?>">
                        <span class="has-icon">
                            <i class="icon-user"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.clients'); ?></span>
                    </a>
                </li>


                <!-- Contacts -->

                <li class="<?php echo e(activeLink('contacts')); ?>">
                    <a href="<?php echo e(route('dashboard.contacts.index')); ?>">
                        <span class="has-icon">
                            <i class="icon-contacts"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.contacts'); ?></span>
                    </a>
                </li>

                <!-- Opportunities -->

                <li class="<?php echo e(activeLink('opportunities')); ?>">
                    <a href="<?php echo e(route('dashboard.opportunities.index')); ?>">
                        <span class="has-icon">
                            <i class="icon-light-bulb"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.pipeline'); ?></span>
                    </a>
                </li>

                <!---------------Costing------------------------->
                <li class="<?php echo e(activeLink('costing')); ?>">
                    <a href="<?php echo e(route('dashboard.costing.index')); ?>">
                        <span class="has-icon">
                            <i class="icon-credit-card"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.costing'); ?></span>
                    </a>
                </li>


                <!-- Invoices -->

                <li class="<?php echo e(activeLink('invoices')); ?>">
                    <a href="<?php echo e(route('dashboard.invoices.index')); ?>">
                        <span class="has-icon">
                            <i class="icon-attach_money"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.invoices'); ?></span>
                    </a>
                </li>


                <!-- Reports -->

                <li class="<?php echo e(activeLink('reports',true)); ?>">
                    <a href="#" class="has-arrow" aria-expanded="false">
                        <span class="has-icon">
                            <i class="icon-file-text2"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.reports'); ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse" style="">
                        <!-- Opportunity reports -->
                        <li>
                            <a class="<?php echo e(activeLink('opportunity-report',true)); ?>" href="<?php echo e(route('dashboard.opportunity-report')); ?>">
                                <span class="mx-1">
                                    <i class="icon-light-bulb"></i>
                                </span>
                                <span><?php echo app('translator')->get('site.opportunity-report'); ?></span>
                            </a>
                        </li>

                        <li>
                            <a class="<?php echo e(activeLink('proposal-report',true)); ?>" href="<?php echo e(route('dashboard.proposal-report')); ?>">
                                <span class="mx-1">
                                    <i class="icon-light-bulb"></i>
                                </span>
                                <span><?php echo app('translator')->get('site.proposal-report'); ?></span>
                            </a>
                        </li>


                        <!-- Activity reports -->
                        <li class="<?php echo e(activeLink('activity-report',true)); ?>">
                            <a class="<?php echo e(activeLink('activity-report',true)); ?>" href="<?php echo e(route('dashboard.activity-report')); ?>">
                                <span class="mx-1">
                                    <i class="icon-light-bulb"></i>
                                </span>
                                <span><?php echo app('translator')->get('site.activity-report'); ?></span>
                            </a>
                        </li>


                        <li>
                            <a class="<?php echo e(activeLink('invoice-report',true)); ?>" href="<?php echo e(route('dashboard.invoice-report')); ?>">
                                <span class="mx-1">
                                    <i class="icon-light-bulb"></i>
                                </span>
                                <span><?php echo app('translator')->get('site.invoice-report'); ?></span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="<?php echo e(activeLink('permissions')); ?>">
                    <a href="<?php echo e(route('dashboard.permissions.index')); ?>">
                        <span class="has-icon">
                            <i class="icon-lock-closed"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.roles_permissions'); ?></span>
                    </a>
                </li>

                <li class="<?php echo e(activeLink('settings')); ?>">
                    <a href="<?php echo e(route('dashboard.settings')); ?>">
                        <span class="has-icon">
                            <i class="icon-settings"></i>
                        </span>
                        <span class="nav-title"><?php echo app('translator')->get('site.settings'); ?></span>
                    </a>
                </li>



            </ul>


            <!-- END: side-nav-content -->
        </nav>
        <!-- END: .side-nav -->
    </div>
    <!-- END: .side-content -->
</aside>
<?php /**PATH /media/Ahmed-Ibrahim/84D6EDAFD6EDA1A2/laravel projects/ria/resources/views/dashboard/partials/_aside.blade.php ENDPATH**/ ?>
