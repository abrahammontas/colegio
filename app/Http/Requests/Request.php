<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    $messages = [
    'required' => 'El campo ":attribute" es requerido.',
		];
}
