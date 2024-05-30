import "./bootstrap";

function cetakStruk(url) {
    const showPrint = window.open(url, "_blank", "height=600,width=400");
    showPrint.addEventListener("load", () => {
        showPrint.print();
        showPrint.addEventListener("afterprint", () => {
            showPrint.close();
        });
    });
    return false;
}

window.cetakStruk = cetakStruk;
