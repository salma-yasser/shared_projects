package eg.edu.tanta.enums;

public enum PageStatusEnum {
    
    NEW(0),
    VIEW(-1),
    EDIT(1);

    private int code;

    private PageStatusEnum(int code) {
	this.code = code;
    }

    public int getCode() {
	return code;
    }
}
