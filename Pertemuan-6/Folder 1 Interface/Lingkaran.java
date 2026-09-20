public class Lingkaran implements Bentuk {
    private double radius;

    public Lingkaran(double radius) {
        this.radius = radius;
    }

    @Override
    public double hitungLuas() {
        return 3.14 * radius * radius;
    }
}