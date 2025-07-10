<?php
class C45 {

    public $data = [];
    public $atribut = [];

    public function __construct() {
        // kosong, inisialisasi nanti lewat initialize()
    }

    public function initialize($params) {
        $this->data = $params['data'];
        $this->atribut = $params['atribut'];
    }

    public function entropy($data) {
        $total = count($data);
        $counts = array_count_values(array_column($data, 'status'));

        $entropy = 0.0;
        foreach ($counts as $count) {
            $p = $count / $total;
            $entropy -= $p * log($p, 2);
        }
        return $entropy;
    }

    public function gain($data, $atribut) {
        $total = count($data);
        $atribut_values = array_unique(array_column($data, $atribut));
        $gain = $this->entropy($data);

        foreach ($atribut_values as $value) {
            $subset = array_filter($data, function ($row) use ($atribut, $value) {
                return $row[$atribut] == $value;
            });
            $subset_entropy = $this->entropy($subset);
            $gain -= (count($subset) / $total) * $subset_entropy;
        }

        return $gain;
    }

    public function build_tree($data, $atribut) {
        $status_values = array_unique(array_column($data, 'status'));
        if (count($status_values) == 1) {
            return $status_values[0];
        }

        if (empty($atribut)) {
            return array_count_values(array_column($data, 'status'));
        }

        $max_gain = -INF;
        $best_atribut = null;

        foreach ($atribut as $attr) {
            $g = $this->gain($data, $attr);
            if ($g > $max_gain) {
                $max_gain = $g;
                $best_atribut = $attr;
            }
        }

        $tree = [];
        $tree['atribut'] = $best_atribut;
        $tree['branches'] = [];

        foreach (array_unique(array_column($data, $best_atribut)) as $value) {
            $subset = array_filter($data, function ($row) use ($best_atribut, $value) {
                return $row[$best_atribut] == $value;
            });

            $remaining = array_diff($atribut, [$best_atribut]);
            $tree['branches'][$value] = $this->build_tree($subset, $remaining);
        }

        return $tree;
    }

    public function classify($tree, $input) {
        if (!is_array($tree)) return $tree;
        $attr = $tree['atribut'];
        $value = $input[$attr] ?? null;

        if (!isset($tree['branches'][$value])) return 'tidak';
        return $this->classify($tree['branches'][$value], $input);
    }
}
