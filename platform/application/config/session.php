<?php
/**
 * Part of the Platform application.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Platform
 * @version    1.1.1
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2012, Cartalyst LLC
 * @link       http://cartalyst.com
 */


/*
 * --------------------------------------------------------------------------
 * Return the configuration.
 * --------------------------------------------------------------------------
 */
return array(
    /*
     * --------------------------------------------------------------------------
     * Session Driver
     * --------------------------------------------------------------------------
     *
     * The name of the session driver used by your application. Since HTTP is
     * stateless, sessions are used to simulate "state" across requests made
     * by the same user of your application. In other words, it's how an
     * application knows who the heck you are.
     *
     * Drivers: 'cookie', 'file', 'database', 'memcached', 'apc', 'redis'.
     *
     */
    'driver' => 'file',


    /*
     * --------------------------------------------------------------------------
     * Session Database
     * --------------------------------------------------------------------------
     *
     * The database table on which the session should be stored. It probably
     * goes without saying that this option only matters if you are using
     * the super slick database session driver.
     *
     */
    'table' => 'sessions',


    /*
     * --------------------------------------------------------------------------
     * Session Garbage Collection Probability
     * --------------------------------------------------------------------------
     *
     * Some session drivers require the manual clean-up of expired sessions.
     * This option specifies the probability of session garbage collection
     * occuring for any given request to the application.
     *
     * For example, the default value states that garbage collection has a
     * 2% chance of occuring for any given request to the application.
     * Feel free to tune this to your requirements.
     *
     */
    'sweepage' => array(2, 100),


    /*
     * --------------------------------------------------------------------------
     * Session Lifetime
     * --------------------------------------------------------------------------
     *
     * The number of minutes a session can be idle before expiring.
     *
     */
    'lifetime' => 60,


    /*
     * --------------------------------------------------------------------------
     * Session Expiration On Close
     * --------------------------------------------------------------------------
     *
     * Determines if the session should expire when the user's web browser closes.
     *
     */
    'expire_on_close' => false,


    /*
     * --------------------------------------------------------------------------
     * Session Cookie Name
     * --------------------------------------------------------------------------
     *
     * The name that should be given to the session cookie.
     *
     */
    'cookie' => 'laravel_session',


    /*
     * --------------------------------------------------------------------------
     * Session Cookie Path
     * --------------------------------------------------------------------------
     *
     * The path for which the session cookie is available.
     *
     */
    'path' => '/',


    /*
     * --------------------------------------------------------------------------
     * Session Cookie Domain
     * --------------------------------------------------------------------------
     *
     * The domain for which the session cookie is available.
     *
     */
    'domain' => null,


    /*
     * --------------------------------------------------------------------------
     * HTTPS Only Session Cookie
     * --------------------------------------------------------------------------
     *
     * Determines if the cookie should only be sent over HTTPS.
     *
     */
    'secure' => false
);
