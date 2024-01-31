<?php
namespace App\Helpers;

Class ShowStar {
    public static function showStarComment($num_star){

        $full = floor($num_star);
        $half = ceil($num_star - $full);
        $empty = 5 - $num_star - $half;
        $result = '';

        // Hiển thị sao đầy
        for ($i = 0; $i < $full; $i++) {
            $result .= '<i class="fas yellow fa-star" aria-hidden="true"></i>';
        }

        // Hiển thị nửa sao nếu có
        if ($half > 0) {
            $result .= '<i class="fas fa-star-half-alt yellow"></i>';
        }

        // Hiển thị sao trống
        for ($i = 0; $i < $empty; $i++) {
            $result .= '<i class="far fa-star yellow" aria-hidden="true"></i>';
        }

        return $result;
    }
}
