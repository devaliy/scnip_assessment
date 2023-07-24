<?php


class SortBySalesPerView implements ProductSorterInterface
{
    public function sort(array $products): array
    {
        usort($products, function ($a, $b) {
            $aRatio = $a['sales_count'] / $a['views_count'];
            $bRatio = $b['sales_count'] / $b['views_count'];
            return $aRatio <=> $bRatio;
        });
        return $products;
    }
}
