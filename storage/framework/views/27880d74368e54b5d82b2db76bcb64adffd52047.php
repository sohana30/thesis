<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js" integrity="sha256-MlusDLJIP1GRgLrOflUQtshyP0TwT/RHXsI1wWGnQhs=" crossorigin="anonymous"></script>
    <title><?php echo e(config('app.name', 'Fanshawe International Student')); ?></title>

    <!-- Scripts -->    
 <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Asap&display=swap" rel="stylesheet">
   
    <link href="<?php echo e(asset('css/btnStyle.css')); ?>" rel="stylesheet">
   
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
    
</head>
<body >
    <div id="app" >
    <div class="font-style">
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: white;">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(asset('images/logo.svg')); ?>"  class="logo" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <?php if(auth()->guard()->check()): ?>
                            <div class="nav-item">
                            <a href="<?php echo e(url('/forum')); ?>" class="nav-link"><i class="fas fa-home"></i></a>
                            </div>
                        <?php endif; ?>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if (! (Auth::user()->unreadNotifications->isEmpty())): ?>
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-bell"><span class="badge badge-danger"><?php echo e(auth()->user()->unreadNotifications->count()); ?></i> </span> <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item" href="#" 
                                    method="POST"><i class="fas fa-comment-dots">
                                    <?php echo e(Auth::user()->unreadNotifications->markAsRead()); ?>

                                        <?php echo e($notification->data['name']); ?></i> commented at <strong><?php echo e($notification->data['topicTitle']); ?></strong>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                                </div>
                            </li>
                            <?php endif; ?>
                            <li class="nav-item dropdown">
                                
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('topics.create')); ?>" method="POST"><i class="fas fa-pen"></i>Create Post</a>
                                    <?php if(auth()->user()->hasRole('admin')): ?>
                                    <a href="<?php echo e(url('/dashboard')); ?>" class="dropdown-item"><i class="fas fa-users"></i>List Users</a>
                                    <?php endif; ?>
                                    
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off" aria-hidden="true"></i><?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                   
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
           
        </main>
    </div>
    </div>
</body>
</html>
<?php /**PATH /Users/Sohana/Desktop/Sohana_Thesis/resources/views/layouts/app.blade.php ENDPATH**/ ?>