<?php
class HomeModel extends DB
{
    public function getProductType()
    {
        $sql = "Select name from product_type";
        return mysqli_query($this->con, $sql);
    }
}
