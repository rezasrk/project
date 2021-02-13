<?php

namespace App\Rules;

use App\Models\Setting;
use Illuminate\Contracts\Validation\Rule;

class SettingsRule implements Rule
{
    /**
     * @var string
     */
    protected $key;
    /**
     * @var array
     */
    protected $fail;
    /**
     * @var string
     */
    protected $message;

    /*
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $key, array $fail, string $message)
    {
        $this->key = $key;

        $this->fail = $fail;

        $this->message = $message;
    }

    /*
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $setting = Setting::query()->where('key', $this->key)->first();

        if (in_array($setting->value, $this->fail) && $value == "") {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
