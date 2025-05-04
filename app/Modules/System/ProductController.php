<?php

namespace App\Modules\System;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends SystemController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        if ($request->isDataTable) {
            return $this->productService->loadDataTableData();
        }
        return $this->view('product.index', $this->productService->loadViewData());
    }

    public function create()
    {
        return $this->view('product.create', $this->productService->create());
    }


    public function store(Request $request)
    {
        $user = $this->productService->store($request);
        if ($user) {
            flash_msg('success',__('Data Added successfully'));
            return $this->success( __( 'Data added successfully' ),
                [ 'url' => route( 'system.product.index' )] );
        } else {
            return $this->fail(__( 'Sorry, we could not add the data' ) );
        }
    }

    public function edit($id)
    {
        return $this->view('product.create', $this->productService->edit($id));
    }

    public function update(Request $request, $id)
    {
        $update = $this->productService->update($id, $request);
        if ($update) {
            flash_msg('success',__( 'Data Updated successfully' ));
            return $this->success( __( 'Data Updated successfully' ),
                ['url'=> route('system.product.index') ]);
        } else {
            return $this->fail(__( 'Sorry, we could not Update the data' ) );
        }

    }

    public function deleteGalleryImage($id)
    {
        $image = DB::table('product_images')->where('id', $id)->first();

        if ($image) {
            if (file_exists(public_path($image->image))) {
                @unlink(public_path($image->image));
            }

            DB::table('product_images')->where('id', $id)->delete();

            return response()->json(['status' => true, 'message' => 'Image deleted']);
        }

        return response()->json(['status' => false, 'message' => 'Image not found'], 404);
    }
}
