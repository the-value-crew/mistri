<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class SocialLoginException extends Exception {
	public function __construct($message = "", $code = 0, Throwable $previous = null) {
		$this->message = $message;
	}

	public function render($request) {
		return response()->json([
			'status' => false,
			'code' => Response::HTTP_BAD_REQUEST,
			'message' => [$this->message]
		], Response::HTTP_BAD_REQUEST);
	}
}
