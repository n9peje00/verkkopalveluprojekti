<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model {
    protected $table = 'product';

    public function getWithCategory($categorynum) {
        return $this->getWhere(['categorynum' => $categorynum])->getResultArray();
    }
    // product getteri
    public function getProduct($id) {
        $this->where('productID', $id);
        $query = $this->get();
        $product = $query->getRowArray();
        return $product;
    }

    public function getProducts($ids) {
        $return = array();
        foreach ($ids as $id) {
            $this->table('product');
            $this->select('productID, productname,price');
            $this->where('productID', $id);
            $query = $this->get();
            $product = $query->getRowArray();
            array_push($return,$product);

            $this->resetQuery();
        }

        return $return;
    }
}