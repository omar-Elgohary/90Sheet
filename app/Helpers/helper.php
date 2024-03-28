<?php

use App\Services\CacheService;

use App\Models\Seo;
use App\Models\SiteSetting;

function seo($key){
    return Seo::where('key' , $key)->first() ;
}

function appInformations(){
    $result = SiteSetting::pluck('value', 'key');
    return $result;
}


function convert2english( $string )
{
    $newNumbers = range( 0, 9 );
    $arabic     = array( '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩' );
    $string     = str_replace( $arabic, $newNumbers, $string );
    return $string;
}

function fixPhone( $string = null )
{
    if(!$string){
      return null;
    }

    $result = convert2english($string);
    $result = ltrim($result, '00');
    $result = ltrim($result, '0');
    $result = ltrim($result, '+');
    return $result;
}

function getYoutubeVideoId( $youtubeUrl )
{
    preg_match( "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",
        $youtubeUrl, $videoId );
    return $youtubeVideoId = isset( $videoId[ 1 ] ) ? $videoId[ 1 ] : "";
}

function lang(){
    return App() -> getLocale();
}

function generateRandomCode(){
    return '1234';
    return rand(1111,4444);
}

if (!function_exists('languages')) {
  function languages() {
    return ['ar', 'en'];
  }
}

if (!function_exists('defaultLang')) {
  function defaultLang() {
    return 'ar';
  }
}

if (!function_exists('log_error')) {
	function log_error($exception = null) {
		delete_log_file();
		$trace    = debug_backtrace();
		$class    = $trace[1]['class'];
		$function = $trace[1]['function'];
		info('there is error at class ===> ' . $class . ' , function ===> ' . $function . ' //// the exception ===========> ', [
			'message' => $exception->getMessage(),
			'file'    => [
				'file' => $exception?->getFile(),
				'line' => $exception?->getLine(),
			],
		]);
		return response()->json([
			'key' => 'fail',
			'msg' => __('apis.server_error'),
		]);
	}
}

if (!function_exists('settings')) {
	function settings($key, $local = false, $defaultReturn = '') {
		$settings             =   (new CacheService())->Settings();
		if ($local){
			return array_key_exists($key . '_' . lang(), $settings) ? $settings[$key . '_' . lang()] : '';
		}
		return array_key_exists($key, $settings) ? $settings[$key] : $defaultReturn;
	}
}

if (!function_exists('delete_log_file')) {
	function delete_log_file($max_size = 10)
	{
		$logFilePath = storage_path('logs/laravel.log');

		if (file_exists($logFilePath)) {
			$fileSize = filesize($logFilePath);

			$base = log($fileSize, 1024);
			$size = round(pow(1024, $base - floor($base)), 2);

			if ($size > $max_size) {
				unlink($logFilePath);
			}
		}
	}
}




