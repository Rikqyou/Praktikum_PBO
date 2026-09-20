class Product {
    String nama;
    double harga;
    String kategori;

    Product(String nama, double harga, String kategori) {
        this.nama = nama;
        this.harga = harga;
        this.kategori = kategori;
    }

    void getInfo() {
        System.out.println("Nama: " + nama);
        System.out.println("Harga: Rp" + harga);
        System.out.println("Kategori: " + kategori);
    }

    void applyDiskon(double persen) {
        harga = harga - (harga * persen / 100);
    }
}

public class Main {
    public static void main(String[] args) {

        Product produk1 = new Product(
            "Laptop", 5000000, "Elektronik"
        );

        Product produk2 = new Product(
            "Sepatu", 750000, "Fashion"
        );

        produk1.applyDiskon(10);
        produk2.applyDiskon(20);

        produk1.getInfo();

        System.out.println();

        produk2.getInfo();
    }
}