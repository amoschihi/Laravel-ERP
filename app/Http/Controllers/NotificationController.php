<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth:admin');
	}
	public function get()
	{
		$notifications = Auth::user()->unreadNotifications;
		$output = '';
		if($notifications->count() > 0) {
			foreach ($notifications as $key => $value) {
				$output .= '
				<li>
				<a href="#">
				<div>
				<i class="fa fa-comment fa-fw"></i> '.$value->data['comment']['subject'].'

				<span class="pull-right text-muted small">'.$value->data['comment']['created_at'].'</span>
				</div>
				</a>
				</li>';
			}
		}
		else
		{
			$output .= '
			<li>
			<a class="text-center" href="#">
			<strong>No unread Notifications Found</strong>
			</a>
			</li>';
		}
		
		$data = array(
			'count' => count($notifications),
			'output' => $output
		);
		return $data;
    	// return Auth::user()->unreadNotifications;
	}

	public function read(Request $request)
	{
		return Auth::user()->find($request->userId)->unreadNotifications->markAsRead();
	}

	public function send(Request $request)
	{
        // $nexmo = app('Nexmo\Client');

        // $nexmo->message()->send([
        //     'to'   => $request->recipient,
        //     'from' => env('APP.NAME'),
        //     'text' => $request->message
        // ]);
		$url = "https://www.sms.movesms.co.ke/API/";
		$username = 'Amos';
		$key = 'TsijQu1E6YDWOlC1AiiKbZixKIeJC37DadZuHeNVQOsIzwpoLY';
		$senderId = 'SMARTLINK';
		foreach(explode(',', $request->contacts) as $phone) {
			$postData = [
				'action' => 'compose',
				'username' => $username,
				'api_key' => $key,
				'sender' => $senderId,
				'to' => $phone,
				'message' => $request->message,
				'msgtype' => 5,
				'dlr' => 0,
			];

			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $postData

			));

			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

			$output = curl_exec($ch);
		}

		if (curl_errno($ch)) {
			return back()->with('response',curl_error($ch));
		}

		curl_close($ch);

		return back()->with('response',$output);
	}
}
