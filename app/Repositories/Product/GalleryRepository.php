<?php

namespace App\Repositories\Product;

use App\Models\Product_Images;
use App\Repositories\BaseRepository;

class GalleryRepository extends BaseRepository
{
    protected $modeler = product_images::class;

    public function getByProductId($productId)
    {
        return $this->modeler::where('product_id', $productId)->get();
    }

    public function delete($id)
    {
        return $this->modeler::where('id', $id)->delete();
    }
}
