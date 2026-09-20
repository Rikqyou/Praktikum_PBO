class Mobil {
    String merek;
    String warna;
    int kecepatan;

    // Constructor
    Mobil(String merek, String warna, int kecepatan) {
        this.merek = merek;
        this.warna = warna;
        this.kecepatan = kecepatan;
    }

    // Method menampilkan informasi
    void getInfo() {
        System.out.println("Merek: " + merek);
        System.out.println("Warna: " + warna);
        System.out.println("Kecepatan: " + kecepatan + " km/jam");
    }

    // Method berjalan
    void jalankan() {
        System.out.println("Mobil " + merek + " berjalan...");
    }

    // Method berhenti
    void berhenti() {
        System.out.println("Mobil " + merek + " berhenti");
    }
}

public class Main {
    public static void main(String[] args) {

        Mobil mobil1 = new Mobil("Toyota", "Hitam", 120);
        Mobil mobil2 = new Mobil("Honda", "Putih", 100);
        Mobil mobil3 = new Mobil("Suzuki", "Merah", 110);

        mobil1.getInfo();
        mobil1.jalankan();
        mobil1.berhenti();

        System.out.println();

        mobil2.getInfo();
        mobil2.jalankan();
        mobil2.berhenti();

        System.out.println();

        mobil3.getInfo();
        mobil3.jalankan();
        mobil3.berhenti();
    }
}