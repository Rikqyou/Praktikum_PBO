<?php
$D = 5; // Menggunakan digit terakhir dari NIM H1101251065
abstract class KursusBahasa {
    protected $id, $nama, $hargaDasar;
    public function __construct($i, $n, $h) { $this->id = $i; $this->nama = $n; $this->hargaDasar = $h; }
    abstract public function hitungTotal();
    abstract public function getJenis();
    public function cetakDetail() { echo $this->id." | ".$this->nama." | ".$this->getJenis()." | Rp ".number_format($this->hargaDasar,0,',','.'); }
}
class English extends KursusBahasa {
    private $level;
    public function __construct($i, $n, $h, $l) { parent::__construct($i, $n, $h); $this->level = $l; }
    public function hitungTotal() { return ($this->hargaDasar * $this->level) + 30000; }
    public function getJenis() { return "English"; }
    public function cetakDetail() { parent::cetakDetail(); echo " | Total: Rp ".number_format($this->hitungTotal(),0,',','.')." | Level: ".$this->level." | Buku: 1<br>"; }
}
class Mandarin extends KursusBahasa {
    private $level;
    public function __construct($i, $n, $h, $l) { parent::__construct($i, $n, $h); $this->level = $l; }
    public function hitungTotal() { global $D; $t = $this->hargaDasar * $this->level; return $this->level > 2 ? $t - ($t * (15 + $D) / 100) : $t; }
    public function getJenis() { return "Mandarin"; }
    public function cetakDetail() { parent::cetakDetail(); echo " | Total: Rp ".number_format($this->hitungTotal(),0,',','.')." | Level: ".$this->level."<br>"; }
}
class Jepang extends KursusBahasa {
    private $level;
    public function __construct($i, $n, $h, $l) { parent::__construct($i, $n, $h); $this->level = $l; }
    public function hitungTotal() { return ($this->hargaDasar * $this->level) + 40000; }
    public function getJenis() { return "Jepang"; }
    public function cetakDetail() { parent::cetakDetail(); echo " | Total: Rp ".number_format($this->hitungTotal(),0,',','.')." | Level: ".$this->level." | Audio<br>"; }
}
$kursus = [
    new English("E001", "Riko", 150000, 2),
    new Mandarin("M001", "Bulloh", 200000, 3),
    new Jepang("J001", "Indra", 175000, 1),
    new English("E002", "Dewi", 150000, 3),
    new Mandarin("M002", "Eko", 200000, 1)
];
$total = 0;
foreach($kursus as $k) { $total += $k->hitungTotal(); $k->cetakDetail(); }
echo "<br>Total Keseluruhan = Rp ".number_format($total,0,',','.');
?>