<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Admin: <?php echo $__env->yieldContent('title'); ?> :: <?php echo e(config('app.name', '')); ?></title>
    <link rel="icon" type="image/ico" href="/admin_assets/images/favicon.ico"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ============================================
    ================= Stylesheets ===================
    ============================================= -->
    <!-- vendor css files -->
    <link rel="stylesheet" href="/admin_assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/admin_assets/css/vendor/animate.css">
    <link rel="stylesheet" href="/admin_assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/morris/morris.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/rickshaw/rickshaw.min.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/datatables/datatables.bootstrap.min.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/chosen/chosen.css">
    <link rel="stylesheet" href="/admin_assets/js/vendor/summernote/summernote.css">

    <!-- project main css files -->
    <link rel="stylesheet" href="/admin_assets/css/main.css">
    <!--/ stylesheets -->


    <!-- ==========================================
    ================= Modernizr ===================
    =========================================== -->
    <script src="/admin_assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <!--/ modernizr -->
    <?php echo $__env->yieldPushContent('scripts'); ?>

</head>


<body id="minovate" class="appWrapper">


<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->


<!-- ====================================================
================= Application Content ===================
===================================================== -->
<div id="wrap" class="animsition">


    <!-- ===============================================
    ================= HEADER Content ===================
    ================================================ -->
    <section id="header">
        <header class="clearfix">

            <!-- Branding -->
            <div class="branding">
                <a class="brand" href="<?php echo e(route('admin')); ?>">
                    <img src="/admin_assets/images/logo_no_title.png" align="center">
                    <span><?php echo e(config('app.name', 'Hyipium')); ?></span>
                </a>
                <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Branding end -->

            <!-- Left-side navigation -->
            <ul class="nav-left pull-left list-unstyled list-inline">
                <li class="sidebar-collapse divided-right">
                    <a role="button" tabindex="0" class="collapse-sidebar">
                        <i class="fa fa-outdent"></i>
                    </a>
                </li>
                <li class="dropdown divided-right settings">
                    <a role="button" tabindex="0" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </a>
                    <ul class="dropdown-menu with-arrow animated littleFadeInUp" role="menu">
                        <li>

                            <ul class="color-schemes list-inline">
                                <li class="title"><?php echo e(__('Header Color')); ?>:</li>
                                <li><a role="button" tabindex="0" class="scheme-drank header-scheme"
                                       data-scheme="scheme-default"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-black header-scheme"
                                       data-scheme="scheme-black"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-greensea header-scheme"
                                       data-scheme="scheme-greensea"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-cyan header-scheme"
                                       data-scheme="scheme-cyan"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-lightred header-scheme"
                                       data-scheme="scheme-lightred"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-light header-scheme"
                                       data-scheme="scheme-light"></a></li>
                                <li class="title"><?php echo e(__('Branding Color')); ?>:</li>
                                <li><a role="button" tabindex="0" class="scheme-drank branding-scheme"
                                       data-scheme="scheme-default"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-black branding-scheme"
                                       data-scheme="scheme-black"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-greensea branding-scheme"
                                       data-scheme="scheme-greensea"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-cyan branding-scheme"
                                       data-scheme="scheme-cyan"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-lightred branding-scheme"
                                       data-scheme="scheme-lightred"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-light branding-scheme"
                                       data-scheme="scheme-light"></a></li>
                                <li class="title"><?php echo e(__('Sidebar Color')); ?>:</li>
                                <li><a role="button" tabindex="0" class="scheme-drank sidebar-scheme"
                                       data-scheme="scheme-default"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-black sidebar-scheme"
                                       data-scheme="scheme-black"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-greensea sidebar-scheme"
                                       data-scheme="scheme-greensea"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-cyan sidebar-scheme"
                                       data-scheme="scheme-cyan"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-lightred sidebar-scheme"
                                       data-scheme="scheme-lightred"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-light sidebar-scheme"
                                       data-scheme="scheme-light"></a></li>
                                <li class="title"><?php echo e(__('Active Color')); ?>:</li>
                                <li><a role="button" tabindex="0" class="scheme-drank color-scheme"
                                       data-scheme="drank-scheme-color"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-black color-scheme"
                                       data-scheme="black-scheme-color"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-greensea color-scheme"
                                       data-scheme="greensea-scheme-color"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-cyan color-scheme"
                                       data-scheme="cyan-scheme-color"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-lightred color-scheme"
                                       data-scheme="lightred-scheme-color"></a></li>
                                <li><a role="button" tabindex="0" class="scheme-light color-scheme"
                                       data-scheme="light-scheme-color"></a></li>
                            </ul>

                        </li>

                        <li>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-8 control-label"><?php echo e(__('Fixed header')); ?></label>
                                    <div class="col-xs-4 control-label">
                                        <div class="onoffswitch lightred small">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                                   id="fixed-header">
                                            <label class="onoffswitch-label" for="fixed-header">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-8 control-label"><?php echo e(__('Fixed aside')); ?></label>
                                    <div class="col-xs-4 control-label">
                                        <div class="onoffswitch lightred small">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                                   id="fixed-aside">
                                            <label class="onoffswitch-label" for="fixed-aside">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown divided-right settings">
                    <a role="button" tabindex="0" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-language"></i>
                    </a>
                    <ul class="dropdown-menu with-arrow animated littleFadeInUp list-group" role="menu">
                        <?php $__currentLoopData = getLanguagesArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('set.lang',['locale'=>$item['code']])); ?>"
                                   class="list-group-item list-group-item-action"><?php echo e($item['name']); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
            </ul>
            <!-- Left-side navigation end -->

            <!-- Right-side navigation -->
            <ul class="nav-right pull-right list-inline">

                <li class="dropdown nav-profile">

                    <a href class="dropdown-toggle" data-toggle="dropdown">
                        
                        <span><?php echo e(getUserLogin()); ?> <i class="fa fa-angle-down"></i></span>
                    </a>

                    <ul class="dropdown-menu animated littleFadeInRight" role="menu" style="margin-left: -100px;">
                        <li>
                            <a href="<?php echo e(route('admin.users.show', ['id' => getUserId()])); ?>"> <i
                                        class="fa fa-user"></i><?php echo e(__('Profile')); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('logout')); ?>" class="fa fa-sign-out"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </li>

                    </ul>

                </li>

            </ul>
            <!-- Right-side navigation end -->

        </header>

    </section>
    <!--/ HEADER Content  -->


    <!-- =================================================
    ================= CONTROLS Content ===================
    ================================================== -->
    <div id="controls">


        <!-- ================================================
        ================= SIDEBAR Content ===================
        ================================================= -->
        <aside id="sidebar">


            <div id="sidebar-wrap">

                <div class="panel-group slim-scroll" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#sidebarNav">
                                    <?php echo e(__('Menu')); ?> <i class="fa fa-angle-up"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">


                                <!-- ===================================================
                                ================= NAVIGATION Content ===================
                                ==================================================== -->
                                <ul id="navigation">
                                    <li class="<?php echo e((Route::is('admin') ? 'active' : '')); ?>"><a
                                                href="<?php echo e(route('admin')); ?>"><i
                                                    class="fa fa-dashboard"></i>
                                            <span><?php echo e(__('Dashboard')); ?></span></a>
                                    </li>
                                    <li class="<?php echo e((Route::is('admin.users.*') ? 'active' : '')); ?>"><a
                                                href="<?php echo e(route('admin.users.index')); ?>"><i
                                                    class="fa fa-users"></i>
                                            <span><?php echo e(__('Members')); ?></span>
                                            <?php if(getTotalAccounts() > 0): ?>
                                                <span class="label label-success"><?php echo e(getTotalAccounts()); ?></span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                    <li class="<?php echo e((Route::is('admin.deposits.*') ? 'active' : '')); ?>"><a
                                                href="<?php echo e(route('admin.deposits.index')); ?>"><i
                                                    class="fa fa-suitcase"></i>
                                            <span><?php echo e(__('Deposits')); ?></span>
                                            <?php if(getActiveDepositsCount() > 0): ?>
                                                <span class="label label-success"><?php echo e(getActiveDepositsCount()); ?></span>
                                            <?php endif; ?>
                                            <?php if(getClosedDepositsCount() > 0 && strlen(getClosedDepositsCount() <= 4 && strlen(getActiveDepositsCount()) <= 4)): ?>
                                                <span class="label label-warning"
                                                      style="right:50px;"><?php echo e(getClosedDepositsCount()); ?></span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                    <li class="<?php echo e((Route::is('admin.requests.*') ? 'active' : '')); ?>"><a
                                                href="<?php echo e(route('admin.requests.index')); ?>"><i
                                                    class="fa fa-mail-forward"></i><?php echo e(__('Withdrawal requests')); ?>

                                            <?php if(getAdminWithdrawRequestsCount() > 0): ?>
                                                <span class="badge bg-lightred"
                                                      style="margin-top:-5px;"><?php echo e(getAdminWithdrawRequestsCount()); ?></span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                    <li class="<?php echo e((Route::is('admin.transactions.*') ? 'active' : '')); ?>"><a
                                                href="<?php echo e(route('admin.transactions.index')); ?>"><i
                                                    class="fa fa-cubes"></i>
                                            <span><?php echo e(__('Transactions')); ?></span>
                                            <?php if(getAdminTransactionsCount() > 0): ?>
                                                <span class="label label-success"><?php echo e(getAdminTransactionsCount()); ?></span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                    <li class="<?php echo e((Route::is('admin.statistic') ? 'active' : '')); ?>"><a
                                                href="<?php echo e(route('admin.statistic')); ?>"><i
                                                    class="fa fa-bar-chart-o"></i>
                                            <span><?php echo e(__('Statistics')); ?></span></a>
                                    </li>
                                    <li>
                                        <a role="button"><i class="fa fa-bullhorn"></i> <span><?php echo e(__('Content')); ?></span>
                                        </a>
                                        <ul>
                                            <li class="<?php echo e((Route::is('admin.mail.*') ? 'active' : '')); ?>"><a href="<?php echo e(route('admin.mail.index')); ?>"><i
                                                            class="fa fa-caret-right"></i><?php echo e(__('Mails')); ?></a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.news.*') ? 'active' : '')); ?>"><a href="<?php echo e(route('admin.news.index')); ?>"><i
                                                            class="fa fa-caret-right"></i><?php echo e(__('News')); ?></a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.reviews.*') ? 'active' : '')); ?>"><a href="<?php echo e(route('admin.reviews.index')); ?>"><i
                                                            class="fa fa-caret-right"></i><?php echo e(__('Client reviews')); ?></a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.faqs.*') ? 'active' : '')); ?>"><a href="<?php echo e(route('admin.faqs.index')); ?>"><i
                                                            class="fa fa-caret-right"></i><?php echo e(__('FAQs')); ?></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a role="button"><i class="fa fa-wrench"></i> <span><?php echo e(__('Settings')); ?></span>
                                        </a>
                                        <ul>
                                            <li class="<?php echo e((Route::is('admin.settings.*') ? 'active' : '')); ?>"><a
                                                        href="<?php echo e(route('admin.settings.index')); ?>"><i
                                                            class="fa fa-caret-right"></i><?php echo e(__('Base settings')); ?></a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.langs.*') ? 'active' : '')); ?>"><a href="<?php echo e(route('admin.langs.index')); ?>"><i
                                                            class="fa fa-caret-right"></i><?php echo e(__('Languages')); ?></a>
                                            </li>
                                            
                                            <li class="<?php echo e((Route::is('admin.tpl_texts.*') ? 'active' : '')); ?>"><a
                                                        href="<?php echo e(route('admin.tpl_texts.index')); ?>"
                                                ><i
                                                            class="fa fa-caret-right"></i><?php echo e(__('Template translations')); ?>

                                                </a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.currencies.*') ? 'active' : '')); ?>"><a href="<?php echo e(route('admin.currencies.index')); ?>"><i
                                                            class="fa fa-caret-right"></i><?php echo e(__('Currencies')); ?></a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.payment-systems.*') ? 'active' : '')); ?>"><a href="<?php echo e(route('admin.payment-systems.index')); ?>"><i
                                                            class="fa fa-caret-right"></i><?php echo e(__('Payment systems')); ?>

                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="<?php echo e((Route::is('admin.rates.*') ? 'active' : '')); ?>"><a
                                                href="<?php echo e(route('admin.rates.index')); ?>"><i
                                                    class="fa fa-book"></i><?php echo e(__('Tariff plans')); ?></a>
                                    </li>
                                    <li class="<?php echo e((Route::is('admin.referral.*') ? 'active' : '')); ?>"><a
                                                href="<?php echo e(route('admin.referral.index')); ?>"><i
                                                    class="fa fa-sitemap"></i>
                                            <span><?php echo e(__('Affiliate plans')); ?></span>
                                        </a>
                                    </li>
                                    <li class="<?php echo e((Route::is('admin.backup.*') ? 'active' : '')); ?>"><a
                                                href="<?php echo e(route('admin.backup.index')); ?>"><i
                                                    class="fa fa-hdd-o"></i>
                                            <span><?php echo e(__('Backups')); ?></span></a>
                                    </li>
                                    <?php if(auth()->check() && auth()->user()->hasRole('root')): ?>
                                    <li>
                                        <a role="button"><i class="fa fa-database"></i>
                                            <span><?php echo e(__('System')); ?></span></a>
                                        <ul>
                                            <li>
                                                <a href="/horizon" target="_blank"><i class="fa fa-clock-o"></i><span><?php echo e(__('Jobs monitor')); ?></span></a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.failedjobs.index') ? 'active' : '')); ?>"><a
                                                        href="<?php echo e(route('admin.failedjobs.index')); ?>"
                                                ><i class="fa fa-refresh"></i>
                                                    <span><?php echo e(__('Failed jobs')); ?></span>
                                                </a>
                                            </li>
                                            <li><a href="<?php echo e(route('logs')); ?>" target="_blank"><i
                                                            class="fa fa-warning"></i><span><?php echo e(__('System logs')); ?></span></a>
                                            </li>
                                            <li>
                                                <a href="https://docs.google.com/spreadsheets/d/1GLPqYeqt_echN6DS58jTinbfd_uTanklfqIxaokHH2A/edit?usp=sharing"
                                                   target="_blank"><i
                                                            class="fa fa-file-text"></i><span><?php echo e(__('Integration documents')); ?></span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php endif; ?>
                                    <li>
                                        <a role="button"><i class="fa fa-location-arrow"></i>
                                            <span><?php echo e(__('Telegram')); ?></span>
                                        </a>
                                        <ul>
                                            <li class="<?php echo e((Route::is('admin.telegram.bots.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.telegram.bots.index')); ?>">
                                                    <i class="fa fa-dot-circle-o"></i>
                                                    <span><?php echo e(__('Bots')); ?></span>
                                                </a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.telegram.events.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.telegram.events.list')); ?>">
                                                    <i class="fa  fa-rss-square"></i>
                                                    <span><?php echo e(__('Events')); ?></span>
                                                </a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.telegram.messages.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.telegram.messages.list')); ?>">
                                                    <i class="fa fa-envelope-square"></i>
                                                    <span><?php echo e(__('Messages')); ?></span>
                                                </a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.telegram.users.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.telegram.users.list')); ?>">
                                                    <i class="fa fa-group"></i>
                                                    <span><?php echo e(__('Telegram users')); ?></span>
                                                </a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.telegram.webhooks.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.telegram.webhooks.list')); ?>">
                                                    <i class="fa fa-exchange"></i>
                                                    <span><?php echo e(__('Webhooks')); ?></span>
                                                </a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.telegram.webhooks_info.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.telegram.webhooks_info.list')); ?>">
                                                    <i class="fa fa-info-circle"></i>
                                                    <span><?php echo e(__('Webhooks info')); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a role="button"><i class="fa fa-tasks"></i>
                                            <span><?php echo e(__('User quests')); ?></span>
                                        </a>
                                        <ul>
                                            <li class="<?php echo e((Route::is('admin.user-tasks.tasks.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.user-tasks.tasks.index')); ?>">
                                                    <i class="fa fa-circle"></i>
                                                    <span><?php echo e(__('Quests list')); ?></span>
                                                </a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.user-tasks.accepted_tasks.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.user-tasks.accepted_tasks.list')); ?>">
                                                    <i class="fa fa-check-circle"></i>
                                                    <span><?php echo e(__('Accepted quests')); ?></span>
                                                </a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.user-tasks.available_elements.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.user-tasks.available_elements.list')); ?>">
                                                    <i class="fa fa-cogs"></i>
                                                    <span><?php echo e(__('Available quest elements')); ?></span>
                                                </a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.user-tasks.tasks_elements.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.user-tasks.tasks_elements.list')); ?>">
                                                    <i class="fa fa-cubes"></i>
                                                    <span><?php echo e(__('Quest elements')); ?></span>
                                                </a>
                                            </li>
                                            <li class="<?php echo e((Route::is('admin.user-tasks.user_task_elements.*') ? 'active' : '')); ?>">
                                                <a href="<?php echo e(route('admin.user-tasks.user_task_elements.list')); ?>">
                                                    <i class="fa fa-briefcase"></i>
                                                    <span><?php echo e(__('Users quests elements')); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!--/ NAVIGATION Content -->
                            </div>
                        </div>
                    </div>
                    <div class="panel settings panel-default">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#sidebarControls">
                                    <?php echo e(__('Quick settings')); ?> <i class="fa fa-angle-up"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="sidebarControls" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-xs-8 control-label"><?php echo e(__('Site status')); ?></label>
                                        <div class="col-xs-4 control-label">
                                            <div class="onoffswitch greensea">
                                                <input type="checkbox" name="site-on" class="onoffswitch-checkbox"
                                                       id="switch-on" <?php echo e(\App\Models\Setting::getValue('site-on') == 'on' ? 'checked' : ''); ?>>

                                                <label class="onoffswitch-label" for="switch-on"
                                                       onclick="location.href='<?php echo e(route('admin.settings.switchSiteStatus')); ?>';">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel charts panel-default">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#sidebarCharts">
                                    <?php echo e(__('Short information')); ?> <i class="fa fa-angle-up"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="sidebarCharts" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <div style="color:white; font-weight:bold; padding: 5px;">
                                    <?php echo e(__('Server time')); ?>

                                    <br><?php echo e(now()->format('H:i, d-m-Y')); ?>

                                    <br>

                                    <hr><?php echo e(__('Project launched')); ?>

                                    <br><?php echo e(\Carbon\Carbon::parse(getDateOfLaunch())->format('Y-m-d')); ?>

                                    <br>(<?php echo e(\Carbon\Carbon::parse(getDateOfLaunch())->diffForHumans()); ?>)
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </aside>
        <!--/ SIDEBAR Content -->
    </div>
    <!--/ CONTROLS Content -->


    <!-- ====================================================
    ================= CONTENT ===============================
    ===================================================== -->
    <section id="content">

        <div class="page page-dashboard">
            <div class="pageheader">
                

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="<?php echo e(route('admin')); ?>"><i class="fa fa-home"></i> <?php echo e(__('Home')); ?></a>
                        </li>

                            <?php echo $__env->yieldContent('breadcrumbs'); ?>

                    </ul>

                </div>

            </div>

            <?php echo $__env->make('admin.partials.inform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>


    </section>
    <!--/ CONTENT -->


</div>
<!--/ Application Content -->


<!-- ============================================
============== Vendor JavaScripts ===============
============================================= -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/admin_assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

<script src="/admin_assets/js/vendor/bootstrap/bootstrap.min.js"></script>

<script src="/admin_assets/js/vendor/jRespond/jRespond.min.js"></script>

<script src="/admin_assets/js/vendor/d3/d3.min.js"></script>
<script src="/admin_assets/js/vendor/d3/d3.layout.min.js"></script>

<script src="/admin_assets/js/vendor/rickshaw/rickshaw.min.js"></script>

<script src="/admin_assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

<script src="/admin_assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

<script src="/admin_assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

<script src="/admin_assets/js/vendor/daterangepicker/moment.min.js"></script>
<script src="/admin_assets/js/vendor/daterangepicker/daterangepicker.js"></script>

<script src="/admin_assets/js/vendor/screenfull/screenfull.min.js"></script>

<script src="/admin_assets/js/vendor/flot/jquery.flot.min.js"></script>
<script src="/admin_assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
<script src="/admin_assets/js/vendor/flot-spline/jquery.flot.spline.min.js"></script>

<script src="/admin_assets/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>

<script src="/admin_assets/js/vendor/raphael/raphael-min.js"></script>
<script src="/admin_assets/js/vendor/morris/morris.min.js"></script>

<script src="/admin_assets/js/vendor/owl-carousel/owl.carousel.min.js"></script>

<script src="/admin_assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script src="/admin_assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/admin_assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>

<script src="/admin_assets/js/vendor/chosen/chosen.jquery.min.js"></script>

<script src="/admin_assets/js/vendor/summernote/summernote.min.js"></script>

<script src="/admin_assets/js/vendor/coolclock/coolclock.js"></script>
<script src="/admin_assets/js/vendor/coolclock/excanvas.js"></script>
<!--/ vendor javascripts -->


<!-- ============================================
============== Custom JavaScripts ===============
============================================= -->
<script src="/admin_assets/js/main.js"></script>
<!--/ custom javascripts -->


<!-- ===============================================
============== Page Specific Scripts ===============
================================================ -->
<?php echo $__env->yieldPushContent('load-scripts'); ?>

<script>
    $(window).load(function () {
        //Initialize mini calendar datepicker
        // $('#mini-calendar').datetimepicker({
        //     inline: true
        // });
        //*Initialize mini calendar datepicker

        //load wysiwyg editor
        // $('#summernote').summernote({
        //     toolbar: [
        //         //['style', ['style']], // no style button
        //         ['style', ['bold', 'italic', 'underline', 'clear']],
        //         ['fontsize', ['fontsize']],
        //         ['color', ['color']],
        //         ['para', ['ul', 'ol', 'paragraph']],
        //         ['height', ['height']],
        //         //['insert', ['picture', 'link']], // no insert buttons
        //         //['table', ['table']], // no table button
        //         //['help', ['help']] //no help button
        //     ],
        //     height: 143   //set editable area's height
        // });
        //*load wysiwyg editor
    });
</script>
<!--/ Page Specific Scripts -->

</body>
</html>

