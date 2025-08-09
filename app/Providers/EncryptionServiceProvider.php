<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\ServiceProvider;

class EncryptionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('encrypter', function ($app) {
            $key = config('app.key');

            if (Str::startsWith($key, 'base64:')) {
                $key = base64_decode(substr($key, 7));
            }

            if (strlen($key) !== 32) {
                throw new \RuntimeException('Kunci enkripsi harus tepat 32 karakter setelah base64 decode.');
            }

            return new Encrypter($key, 'aes-256-cbc');
        });
    }
}
