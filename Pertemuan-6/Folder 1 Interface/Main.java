public class Main {
    public static void main(String[] args) {

        Bentuk[] bentuk = {
            new Persegi(5),
            new Lingkaran(7)
        };

        System.out.println("Luas Persegi (sisi=5): " + (int)bentuk[0].hitungLuas());
        System.out.printf("Luas Lingkaran (radius=7): %.2f%n", bentuk[1].hitungLuas());
    }
}