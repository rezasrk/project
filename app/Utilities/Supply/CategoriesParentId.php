<?php


namespace App\Utilities\Supply;


use App\Models\Supply\Category;

class CategoriesParentId
{
    protected $ids = [];

    /**
     * Get all parent id from  a category theme
     *
     * @param $parent_id
     * @return false|string
     */
    public function getParents($parent_id)
    {
        $parent = Category::query()->find($parent_id);

        if (!empty($parent) && $parent->category_parent_id != 0) {
            $this->ids[] = $parent->id;
            return $this->getParents($parent->category_parent_id);
        } elseif (!empty($parent)) {
            $this->ids[] = $parent->id;
        }

        return json_encode($this->ids);
    }
}
