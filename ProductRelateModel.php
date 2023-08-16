<?php
class Product {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getProductList() {
        $sql_product_list = "SELECT * FROM product ORDER BY product_id DESC LIMIT 4";
        $query_product_list = mysqli_query($this->mysqli, $sql_product_list);
        return $query_product_list;
    }

    public function getEvaluateRating($product_id) {
        $query_evaluate_rating = mysqli_query($this->mysqli, "SELECT * FROM evaluate WHERE product_id='$product_id' AND evaluate_status = 1");

        $rate1 = 0;
        $rate2 = 0;
        $rate3 = 0;
        $rate4 = 0;
        $rate5 = 0;

        while ($evaluate_rating = mysqli_fetch_array($query_evaluate_rating)) {
            $rate = $evaluate_rating['evaluate_rate'];

            if ($rate == 1) {
                $rate1++;
            } elseif ($rate == 2) {
                $rate2++;
            } elseif ($rate == 3) {
                $rate3++;
            } elseif ($rate == 4) {
                $rate4++;
            } elseif ($rate == 5) {
                $rate5++;
            }
        }

        $total_rate = $rate1 + $rate2 + $rate3 + $rate4 + $rate5;
        if ($total_rate != 0) {
            $rate_avg = ($rate1 * 1 + $rate2 * 2 + $rate3 * 3 + $rate4 * 4 + $rate5 * 5) / $total_rate;
            $rate_avg = round($rate_avg, 1);
        } else {
            $rate_avg = 0;
        }

        return ['rate_avg' => $rate_avg, 'total_rate' => $total_rate];
    }
}
