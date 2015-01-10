<?php



Route::get('/', function ()
{

});

Route::group(['prefix' => 'subscription', 'before' => 'auth'], function ()
{
	Route::get('/', [
		'as' => 'subscription',
		'uses' => 'SubscriptionController@getIndex'
	]);

	Route::group(['before' => 'not.subscribed'], function ()
	{

		Route::get('join', [
			'as' => 'subscription-join',
			'uses' => 'SubscriptionController@getJoin'
		]);

		Route::post('join', [
			'before' => 'csrf',
			'uses' => 'SubscriptionController@postJoin'
		]);
	});

	Route::group(['before' => 'subscribed'], function() {

		Route::get('cancel', [
			'before' => 'not.cancelled|csrf',
			'as' => 'subscription-cancel',
			'uses' => 'SubscriptionController@getCancel'
		]);

		Route::get('resume', [
			'before' => 'cancelled|csrf',
			'as' => 'subscription-resume',
			'uses' => 'SubscriptionController@getResume'
		]);

		Route::get('card', [
			'as' => 'subscription-card',
			'uses' => 'SubscriptionController@getCard'
		]);

		Route::post('card', [
			'before' => 'csrf',
			'uses' => 'SubscriptionController@postCard'
		]);

	});

});

Route::group(['before' => 'auth|subscribed'], function()
{

	Route::get('/protected', function()
	{
		echo 'Subscribed only';
	});

	Route::group(['before' => 'plan.large'], function () {

		Route::get('/large', function() {
			echo 'large Only';
		});

	});
});

Route::post('stripe/webhook', 'Laravel\Cashier\WebhookController@handleWebhook');


