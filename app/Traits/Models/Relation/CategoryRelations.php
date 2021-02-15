<?php


namespace App\Traits\Models\Relation;

use App\Models\Baseinfo;
use App\Models\Supply\Category;
use App\Models\Supply\Equipment;
use App\Models\Supply\StoreDetail;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
trait CategoryRelations
{
   public function type(): BelongsTo
   {
       return $this->belongsTo(Baseinfo::class,'type_id');
   }

   public function parent(): BelongsTo
   {
       return $this->belongsTo(self::class,'parent_id');
   }
}
