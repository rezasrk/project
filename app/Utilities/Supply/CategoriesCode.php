<?php


namespace App\Utilities\Supply;

use App\Models\Supply\Category;


class CategoriesCode
{
    private $begincode = 300000000000;

    /*
     * Create code for equipment properties
     */
    public function code(int $number): array
    {
        $code = Category::query()->whereNotNull('created_at')->orderByDesc('code')->first();

        $codes = [];
        for ($i = 1; $i <= $number; $i++) {
            $codes[] = (isset($code->code) && $code->code > $this->begincode) ? $code->code + $i : $this->begincode + $i;
        }

        return $codes;
    }
}
