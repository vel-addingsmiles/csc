<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication
{
    /**
     * {@inheritDoc}
     */
    public function bootstrap()
    {
        $this->addPlugin('ADmad/SocialAuth', ['bootstrap' => true, 'routes' => true]);

        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        }

        /*
         * Only try to load DebugKit in development mode
         * Debug Kit should not be installed on a production system
         */
        if (Configure::read('debug')) {
            $this->addPlugin(\DebugKit\Plugin::class);
        }

        // Load more plugins here
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware($middlewareQueue)
    {
        $middlewareQueue
            // Catch any exceptions in the lower layers,
            // and make an error page/response
            ->add(new ErrorHandlerMiddleware(null, Configure::read('Error')))

            // Handle plugin/theme assets like CakePHP normally does.
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime')
            ]))

            // Add routing middleware.
            // If you have a large number of routes connected, turning on routes
            // caching in production could improve performance. For that when
            // creating the middleware instance specify the cache config name by
            // using it's second constructor argument:
            // `new RoutingMiddleware($this, '_cake_routes_')`
            ->add(new RoutingMiddleware($this))

            ->add(new \ADmad\SocialAuth\Middleware\SocialAuthMiddleware([
            // Request method type use to initiate authentication.
            'requestMethod' => 'POST',
            // Login page URL. In case of auth failure user is redirected to login
            // page with "error" query string var.
            'loginUrl' => '/users/login',
            // URL to redirect to after authentication (string or array).
            'loginRedirect' => '/users/dashboard',
            // Boolean indicating whether user identity should be returned as entity.
            'userEntity' => false,
            // User model.
            'userModel' => 'Users',
            // Social profile model.
            'socialProfileModel' => 'ADmad/SocialAuth.SocialProfiles',
            // Finder type.
            'finder' => 'all',
            // Fields.
            'fields' => [
                'password' => 'password',
            ],
            // Session key to which to write identity record to.
            'sessionKey' => 'Auth.Users',
            // The method in user model which should be called in case of new user.
            // It should return a User entity.
            'getUserCallback' => 'getUser',
            // SocialConnect Auth service's providers config. https://github.com/SocialConnect/auth/blob/master/README.md
            'serviceConfig' => [
                'provider' => [
                    'facebook' => [
                        'applicationId' => '200261947736253',
                        // 'applicationId' => '586337965453440',
                        // 'applicationSecret' => '5c2de2592433f2b3d631af2c569bc20c',
                        'applicationSecret' => '90c5b91989cd15ed64f937bfda0639c9',
                        'scope' => [
                            'email',
                        ],
                        'fields' => [
                            'email',
                            // To get a full list of all posible values, refer to
                            // https://developers.facebook.com/docs/graph-api/reference/user
                        ],
                    ],
                    'google' => [
                        'applicationId' => '126486334405-ig7nn6jhk7i31ddd0t0bsrjatlfsoplt.apps.googleusercontent.com',
                        'applicationSecret' => 'k4cnYYAyNJ-m2ujZxV4PjoaF',
                        'scope' => [
                            'https://www.googleapis.com/auth/userinfo.email',
                            'https://www.googleapis.com/auth/userinfo.profile',
                        ],
                    ],
                ],
            ],
            // If you want to use CURL instead of CakePHP's Http Client set this to
            // '\SocialConnect\Common\Http\Client\Curl' or another client instance that
            // SocialConnect/Auth's Service class accepts.
            'httpClient' => '\ADmad\SocialAuth\Http\Client',
            // Whether social connect errors should be logged. Default `true`.
            'logErrors' => true,
        ]));

        return $middlewareQueue;
    }

    /**
     * @return void
     */
    protected function bootstrapCli()
    {
        try {
            $this->addPlugin('Bake');
        } catch (MissingPluginException $e) {
            // Do not halt if the plugin is missing
        }

        $this->addPlugin('Migrations');

        // Load more plugins here
    }
}
