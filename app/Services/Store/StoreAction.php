<?php

namespace App\Services\Store;

use App\Models\Supply\Store;
use App\Models\Supply\StoreDetail;

use Illuminate\Http\Request;
/**
 * Get previous amount then increased or decreased from inventory warehouse
 * And delete store detail 
 */
class StoreAction
{
    /**
     * @var Request
     */
    protected $request;


    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }


    public function action()
    {
        $this->restoreAmount();

        $this->delete();
    }

    protected function previousAmount()
    {
        return $this->getStoreDetail()->pluck('amount')->sum();
    }

    protected function restoreAmount()
    {
        $amount = $this->previousAmount();

        if ($this->request->type == 'MRS' || $this->request->type == 'MRV') {
            $amount  = $amount * -1;
        }

        Store::find($this->request->store_id)->update(['inventory'=>Store::find($this->request->store_id)->inventory + $amount]);
    }
    protected function delete()
    {
        $this->getStoreDetail($this->request)->delete();
    }

    protected function getStoreDetail()
    {
        return StoreDetail::query()
        ->whereRequestDetailId($this->request->request_detail_id)
        ->whereType($this->request->type)
        ->whereStoreId($this->request->store_id);
    }
}
