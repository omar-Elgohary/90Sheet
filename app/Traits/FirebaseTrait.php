<?php

namespace App\Traits;

use App\Models\SiteSetting;
use Illuminate\Support\Carbon;

trait  FirebaseTrait
{
    use NotificationMessageTrait;

    public function sendFcmNotification($tokens, $data = [] , $lang = 'ar')
    {
        $data['title']  = $this->getTitle($data['type'],  $lang);
        $data['body']   = $this->getBody($data,  $lang);
        $headers = [
            'Authorization: key=' . SiteSetting::where('key', 'firebase_key')->first()->value,
            'Content-Type: application/json',
        ];
		$iosTokens = clone $tokens;
		$webTokens = clone $tokens;
		$this->sendAndroidFcmNotifications($tokens->where(['device_type' => 'android'])->get()->pluck('device_id')->toArray(), $data, $headers);
		$this->sendIosFcmNotifications($iosTokens->where(['device_type' => 'ios'])->get()->pluck('device_id')->toArray(), $data, $headers);
        $this->sendWebFcmNotifications($webTokens->where(['device_type' => 'web'])->get()->pluck('device_id')->toArray(), $data, $headers);
    }

    public function sendAndroidFcmNotifications($tokens, $data, $headers)
    {
        $Notify_data = [
            "registration_ids" => $tokens,
            'data'  => $data
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($Notify_data));
        $response = curl_exec($ch);
    }

    public function sendIosFcmNotifications($tokens, $data, $headers)
    {
        $Notify_data = [
            "registration_ids" => $tokens,
            "notification" => [
                "title"    => $data['title'],
                "body"     => $data['body'],
                "mutable_content" => true,
                'sound'    => true,
            ],
            'data'  => $data
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($Notify_data));
        $response = curl_exec($ch);
    }

	public function sendWebFcmNotifications($tokens, $data, $headers)
	{
		$data['created_at'] = Carbon::now()->diffForHumans();
		$Notify_data = [
			"registration_ids" => $tokens,
			"notification" => [
				"title"    => $data['title'],
				"body"     => $data['body'],
				"mutable_content" => true,
				"sound"    => true,
				'icon'            => settings('logo'),
				'click_action'    => array_key_exists('url', $data) ? $data['url'] : url('/'),


			],
			'created_at'=>'eeee',
			'data'  => $data
		];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($Notify_data));
		$response = curl_exec($ch);

	}

    public function sendFultterFcmNotifications($tokens, $data, $headers)
    {
        $Notify_data = [
            "registration_ids" => $tokens,
            "notification" => [
                "title"    => $data['title'],
                "body"     => $data['body'],
                "mutable_content" => true,
                'sound'    => true,
            ],
            'data'  => $data
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($Notify_data));
        $response = curl_exec($ch);

    }
}
