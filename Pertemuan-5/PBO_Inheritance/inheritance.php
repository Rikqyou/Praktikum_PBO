<?php

// Parent class
class Produk
{
    protected $merek;
    protected $harga;

    public function __construct($merek, $harga)
    {
        // Validasi harga
        if ($harga <= 0) {
            throw new Exception("Harga harus lebih dari 0");
        }

        $this->merek = $merek;
        $this->harga = $harga;
    }

    public function getInfo()
    {
        return "Produk: Produk<br>"
             . "Merek: " . $this->merek . "<br>"
             . "Harga: Rp " . number_format($this->harga, 0, ',', '.');
    }
}


// Child class Makanan
class Makanan extends Produk
{
    private $tanggalKadaluarsa;

    public function __construct($merek, $harga, $tanggalKadaluarsa)
    {
        parent::__construct($merek, $harga);
        $this->tanggalKadaluarsa = $tanggalKadaluarsa;
    }

    // Override getInfo()
    public function getInfo()
    {
        $tanggal = strtotime($this->tanggalKadaluarsa);
        $sekarang = strtotime(date("Y-m-d"));

        if ($tanggal >= $sekarang) {
            $status = "Segar";
        } else {
            $status = "Kadaluarsa";
        }

        return "Produk: Makanan - Mie Instan<br>"
             . "Merek: " . $this->merek . "<br>"
             . "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>"
             . "Tanggal Kadaluarsa: " . $this->tanggalKadaluarsa . "<br>"
             . "Status: " . $status;
    }
}


// Child class Elektronik
class Elektronik extends Produk
{
    private $garansi;

    public function __construct($merek, $harga, $garansi)
    {
        parent::__construct($merek, $harga);
        $this->garansi = $garansi;
    }

    // Override getInfo()
    public function getInfo()
    {
        return "Produk: Elektronik - Smart TV<br>"
             . "Merek: " . $this->merek . "<br>"
             . "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>"
             . "Garansi: " . $this->garansi . " bulan";
    }
}


// Membuat object
$makanan = new Makanan(
    "Indomie",
    3500,
    "2027-06-30"
);

$elektronik = new Elektronik(
    "Samsung",
    5000000,
    12
);


// Menampilkan output
echo "<h3>Data Produk</h3>";

echo $makanan->getInfo();

echo "<br><br>";

echo $elektronik->getInfo();

?>