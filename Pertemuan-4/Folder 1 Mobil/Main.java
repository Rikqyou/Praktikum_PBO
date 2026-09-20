class Mobil {
    // Property dibuat private
    private String merek;
    private String warna;
    private int kecepatan;

    // Constructor
    Mobil(String merek, String warna, int kecepatan) {
        this.merek = merek;
        setWarna(warna);
        setKecepatan(kecepatan);
    }

    // Getter
    public String getMerek() {
        return merek;
    }

    public String getWarna() {
        return warna;
    }

    public int getKecepatan() {
        return kecepatan;
    }

    // Setter kecepatan dengan validasi
    public void setKecepatan(int kecepatan) {
        if (kecepatan >= 0 && kecepatan <= 200) {
            this.kecepatan = kecepatan;
        } else {
            System.out.println("Kecepatan harus antara 0-200 km/jam");
        }
    }

    // Setter warna dengan validasi
    public void setWarna(String warna) {
        if (warna != null && warna.trim().length() >= 3) {
            this.warna = warna;
        } else {
            System.out.println("Warna tidak boleh kosong dan minimal 3 karakter");
        }
    }

    void getInfo() {
        System.out.println("Merek: " + getMerek());
        System.out.println("Warna: " + getWarna());
        System.out.println("Kecepatan: " + getKecepatan() + " km/jam");
    }

    void jalankan() {
        System.out.println("Mobil " + getMerek() + " berjalan...");
    }

    void berhenti() {
        System.out.println("Mobil " + getMerek() + " berhenti");
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

        System.out.println();

        // Pengujian setter kecepatan
        mobil1.setKecepatan(150);
        System.out.println("Kecepatan baru: " + mobil1.getKecepatan() + " km/jam");

        // Pengujian validasi kecepatan
        mobil1.setKecepatan(-10);
        mobil1.setKecepatan(250);

        // Pengujian setter warna
        mobil1.setWarna("Biru");
        System.out.println("Warna baru: " + mobil1.getWarna());

        // Pengujian validasi warna
        mobil1.setWarna("");
        mobil1.setWarna("AB");
    }
}