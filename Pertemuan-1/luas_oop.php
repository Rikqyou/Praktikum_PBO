<?php

class PersegiPanjang {

    public $panjang;
    public $lebar;

    public function __construct($panjang, $lebar) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function hitungLuas() {
        return $this->panjang * $this->lebar;
    }
}

$persegiPanjang = new PersegiPanjang(10, 5);

echo "Panjang = " . $persegiPanjang->panjang . "\n";
echo "Lebar = " . $persegiPanjang->lebar . "\n";
echo "Luas Persegi Panjang = " . $persegiPanjang->hitungLuas();

?>