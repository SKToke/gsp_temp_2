<?php

namespace App\Http\Requests\Auth;

use App\Enums\CommonStatus;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    private string $_Name = 'email';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            $this->username() . '.required' => "The " . $this->_Name . " field is required.",
            $this->username() . '.numeric' => "The " . $this->_Name . " field must be a number.",
            $this->username() . '.digits' => "The " . $this->_Name . " field must be :digits digits.",
            $this->username() . '.string' => "The " . $this->_Name . " field must be a string.",
            $this->username() . '.email' => "The " . $this->_Name . " field must be a valid email address.",
        ];
    }

    public function username(): string
    {
        return 'userkey';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $key = $this->input($this->username());
        $rules = [
            'password' => ['required', 'string'],
            $this->username() => ['required', 'string', 'email']
        ];
        if (ctype_digit($key) && preg_match("/^[0-9][1-9]|[1-9][1-9]{*}$/", $key)) {
            $this->_Name = 'mobile';
            $rules = array_merge($rules, [$this->username() => ['required', 'numeric', 'digits_between:10,11']]);
        }
        return $rules;
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = [
            $this->_Name => $this->input($this->username()),
            ...$this->only('password'),
            'status' => CommonStatus::Active->name,
        ];
        if (!Auth::attempt($credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                $this->username() => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            $this->username() => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input($this->username())) . '|' . $this->ip());
    }
}
