<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueStringRule implements Rule
{
    protected $table;
    protected $column;
    protected $except;
    protected $only;
    /**
     *
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $column, $except, $only)
    {
        $this->table = $table;
        $this->column = $column;
        $this->except = $except;
        $this->only = $only;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $result = DB::table($this->table)
        ->whereRaw("replace({$this->column},' ','') = ?", [str_replace(' ', '', $value)]);

        collect($this->except)->each(function ($val, $column) use (&$result) {
            $result->where($column, '<>', $val);
        });

        collect($this->only)->each(function ($val, $column) use (&$result) {
            $result->where($column, '=', $val);
        });
        
        if ($result->first()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'این مورد قبلا ثبت شده است ';
    }
}
