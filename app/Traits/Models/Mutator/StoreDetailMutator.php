<?php
namespace App\Traits\Models\Mutator;

trait StoreDetailMutator
{
    /**
     * Remove comma from amount
     *
     * @param string $value
     * @return void
     */
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = str_replace(',', '', $value);
    }
}
