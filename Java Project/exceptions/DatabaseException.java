package eg.edu.tanta.exceptions;

public class DatabaseException extends Exception {
    private static final long serialVersionUID = 1L;

    public DatabaseException(String message) {
        super(message);
    }
}
