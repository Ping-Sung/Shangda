<?php

namespace App\Services;
use App\Product as ProductEloquent;
use App\BasicMaterial as BasicMaterialEloquent;
use App\Category as CategoryEloquent;

class ProductService extends BaseService
{
    public function add($request)
    {
        // 計算零售價
        $x1 = BasicMaterialEloquent::where('id', 1)->first()->price;
        $x2 = BasicMaterialEloquent::where('id', 2)->first()->price;
        $x3 = BasicMaterialEloquent::where('id', 3)->first()->price;
        $x4 = BasicMaterialEloquent::where('id', 4)->first()->price;
        $x5 = BasicMaterialEloquent::where('id', 5)->first()->price;

        $retail_price = $x1 * $request->materialCoefficient1 + $x2 * $request->materialCoefficient2 + $x3 * $request->materialCoefficient3 +
        $x4 * $request->materialCoefficient4 + $x5 * $request->materialCoefficient5 + $request->fundamentalPrice;

        // 圖片儲存
        
        if(!empty($request->picture)){
            $origin_picture = imagecreatefromjpeg($request->picture);
            $ext = $request->picture->getClientOriginalExtension();
            $picture_name = ProductEloquent::get()->count() + 1;
            $picture_full_name = $picture_name . '.' . $ext;
            $save_path = public_path('images/products/');
            imagejpeg($origin_picture, $save_path . $picture_full_name);
            $image_path = 'images/products/' . $picture_full_name;
        }else{
            $image_path = null;
        }
        

        // 新增資料
        $product = ProductEloquent::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'shortName' => $request->shortName,
            'internationalNum' => $request->internationalNum,

            'fundamentalPrice' => $request->fundamentalPrice,
            'retailPrice' => $retail_price,
            'materialCoefficient1' => $request->materialCoefficient1,
            'materialCoefficient2' => $request->materialCoefficient2,
            'materialCoefficient3' => $request->materialCoefficient3,
            'materialCoefficient4' => $request->materialCoefficient4,
            'materialCoefficient5' => $request->materialCoefficient5,

            'comment' => $request->comment,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'safeQuantity' => $request->safeQuantity,
            'picture' => $image_path,
            'intro' => $request->intro,
            'specification' => $request->specification
        ]);

        return $product;
    }

    public function getList()
    {
        $products = ProductEloquent::get();
        return $products;
    }

    public function getOne($id)
    {
        $product = ProductEloquent::find($id);
        return $product;
    }

    public function update($request, $id)
    {
        $product = $this->getOne($id);

        $x1 = BasicMaterialEloquent::where('id', 1)->first()->price;
        $x2 = BasicMaterialEloquent::where('id', 2)->first()->price;
        $x3 = BasicMaterialEloquent::where('id', 3)->first()->price;
        $x4 = BasicMaterialEloquent::where('id', 4)->first()->price;
        $x5 = BasicMaterialEloquent::where('id', 5)->first()->price;

        $retail_price = $x1 * $request->materialCoefficient1 + $x2 * $request->materialCoefficient2 + $x3 * $request->materialCoefficient3 +
        $x4 * $request->materialCoefficient4 + $x5 * $request->materialCoefficient5 + $request->fundamentalPrice;

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'shortName' => $request->shortName,
            'internationalNum' => $request->internationalNum,

            'fundamentalPrice' => $request->fundamentalPrice,
            'retailPrice' => $retail_price,
            'materialCoefficient1' => $request->materialCoefficient1,
            'materialCoefficient2' => $request->materialCoefficient2,
            'materialCoefficient3' => $request->materialCoefficient3,
            'materialCoefficient4' => $request->materialCoefficient4,
            'materialCoefficient5' => $request->materialCoefficient5,

            'comment' => $request->comment,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'safeQuantity' => $request->safeQuantity,
            'picture' => $request->picture,
            'intro' => $request->intro,
            'specification' => $request->specification,
        ]);
        return $product;
    }

    public function delete($id)
    {
        $product = $this->getOne($id);
        $product->delete();
    }

    public function getlastupdate()
    {
        $product = ProductEloquent::orderBy('id', 'DESC')->first();
        if(!empty($product)){
            return $product->updated_at;
        }

        return null;
    }

    public function getProductByCategory($category_id)
    {
        $products = CategoryEloquent::where('id', $category_id)->get()->products;
        if($products){
           return $products;
        }else{
            return "此類別查無資料";
        }
    }
}
