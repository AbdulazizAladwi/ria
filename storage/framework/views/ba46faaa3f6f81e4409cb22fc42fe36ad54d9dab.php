<header class="app-header">
    <div class="container-fluid">
        <div class="row gutters">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-3 col-4">
                <a class="mini-nav-btn" href="#" id="app-side-mini-toggler">
                    <i class="icon-menu5"></i>
                </a>
                <a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler" aria-expanded="true">
                    <i class="icon-chevron-thin-left"></i>
                </a>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-4">

            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-3 col-4">
                <ul class="header-actions">
                    <li class="dropdown">
                        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-flag-outline"></i>
                            <span class="count-label"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right lg" aria-labelledby="notifications">
                            <ul class="imp-notify">
                                <?php if( app()->getLocale() == 'en'): ?>
                                <li>
                                    <a href="<?php echo e(url('locale/ar')); ?>">عربي</a>
                                </li>
                                <?php else: ?>
                                <li>
                                    <a href="<?php echo e(url('locale/en')); ?>">English</a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>



                    <li class="dropdown">
                        <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                            <img class="avatar" src="<?php echo e(dashboard_setting()->dashboardImagePath()); ?>" alt="User Thumb" />

                            <span class="user-name"><?php echo e(authUser()->name); ?></span>
                            <i class="icon-chevron-small-down"></i>
                        </a>
                        <div class="dropdown-menu lg dropdown-menu-right" aria-labelledby="userSettings">
                            <ul class="user-settings-list">

                                <li>
                                    <a href="<?php echo e(url('settings')); ?>">
                                        <div class="icon red">
                                            <i class="icon-cog3"></i>
                                        </div>
                                        <p><?php echo app('translator')->get('site.settings'); ?></p>
                                    </a>
                                </li>

                            </ul>
                            <div class="logout-btn">
                                <form method="post" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-primary">Logout</button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>


<?php /**PATH /home/ranarabie/Work/BackEnd/RIA_internal/resources/views/dashboard/partials/_navbar.blade.php ENDPATH**/ ?>