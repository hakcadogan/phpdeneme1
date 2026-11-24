<?php
// Örnek FrankenPHP worker (varsayılan KAPALI). Açmak: scripts/site-worker.sh <site> on frankenphp-worker.php
// Laravel Octane: worker script = public/index.php (Octane FrankenPHP sunucusu).
// Symfony Runtime: public/index.php + frankenphp runtime.
// Bu dosya duman testleri / elle deneme içindir; üretim uygulamanızın ön denetleyicisini kullanın.
ignore_user_abort(true);
$started = date('c');
while (frankenphp_handle_request(static function () use ($started) {
    header('Content-Type: text/plain; charset=utf-8');
    header('X-FrankenPHP-Worker: 1');
    echo "worker=on\n";
    echo "sapi=" . php_sapi_name() . "\n";
    echo "started=" . $started . "\n";
}));
