<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use laravelapplication\User;
use Illuminate\Events\Dispatcher;
use laravelapplication\UserRegistered;


class UserTest extends PHPUnit_Framework_TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
	function test_user_is_registered(){
		
    	
    	$user = new User([
    			'dumyName',
    			'dumy@email.com',
    			'secret'
    	]);
    	
    	$fired = false;
    	
    	$events = new Dispatcher();
    	
    	$this->events = $events;
    	
    	/**
    	 * Register any other events for your application.
    	 *
    	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
    	 * @return void
    	 */
    	function boot(DispatcherContract $events)
    	{
    		parent::boot($events);
    	
    		$events->listen(
    			User::class, 
    			function(User $events) use (&$fired){
    				$fired = true;
    				
    				return $fired;
    			}
    			);
    	}
    	
    	
    	
    
    	/**
    	 * Eventos que se disparan
    	 */
    	
    	/**
    	 * 
    	
    	$events = new Dispatcher();
    	
    	$fired = false;
    	
    	$this->events = $events;
    	
    	$this->events->fire(new UserRegistered($user));
    	
    	$events->listen(
    			User::class, 
    			function(User $events) use (&$fired){
    				$fired = true;
    			}
    			);
    	
    	//$fired = 0; //segundo listener
    	
    	
    	$events->listen(
    			User::class,
    			function(User $events) use (&$fire){
    				$fired = true;
    				//$fired++;
    			}
    		);
    	
    	$events->listen(
    			User::class,
    			function(User $event) use (&$fire){
    				$fired++;
    			}
    			);
    	*/
    	
    	$this->assertInstanceOf(
    				User::class, $user
    			);
    	
    	$this->assertInstanceOf(
    				Dispatcher::class, $events
    			);
    	
    	$this->assertTrue($fired);
    	//$this-assertEquals(2, $fired);
    }
}
