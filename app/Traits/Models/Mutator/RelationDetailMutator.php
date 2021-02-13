<?php

namespace App\Traits\Models\Mutator;

trait RelationDetailMutator
{
    /**
     * Remove comma form price
     *
     * @param string $value
     * @return void
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(',', '', $value);
    }
}
