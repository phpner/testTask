<?php

namespace App\Http\Controllers;

class SortArrayController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
        dd($this->sortArrayNumbers($this->randomArrayNumbers(), 'desc'));
    }

    /**
     * @param array $arrayNumbers
     * @param string $direct
     * @return array
     */
    public function sortArrayNumbers(array $arrayNumbers, string $direct = "asc"): array
    {
        $direct = mb_strtolower($direct);

        if ($direct == 'asc') {
            asort($arrayNumbers);
        }

        if ($direct == "desc") {
            arsort($arrayNumbers);
        }

        return $arrayNumbers;

    }

    /**
     * @param int $count
     * @param int $min
     * @param int $max
     * @return array
     */
    private function randomArrayNumbers(int $count = 10, int $min = -10, int $max = 10): array
    {
        $arrayNumbers = [];

        for ($i = 0; $i < $count; $i++) {
            $arrayNumbers[] = mt_rand($min, $max);
        }

        return $arrayNumbers;
    }
}
