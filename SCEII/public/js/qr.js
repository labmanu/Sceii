function docReady(fn) {
    if (document.readyState === "complete"
        || document.readyState === "interactive") {
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}
docReady(function () {
    //var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;
    function onScanSuccess(decodedText, decodedResult) {
        if (decodedText !== lastResult) {
            ++countResults;
            lastResult = decodedText;
            console.log(`Scan result: ${decodedText}`, decodedResult);
            //document.querySelector('#result').innerText = decodedText+" <br> id: "+id;
            html5QrcodeScanner.clear();
            /**/

            Swal.fire({
                background: '#131414',
                color: 'white',
                title: 'Registro en bitacora',
                icon: 'info',
                text: "Registra tu entrada o salida",
                showCancelButton: true,
                confirmButtonColor: '#46a525',
                cancelButtonColor: '#d33',
                cancelButtonText: "Cancelar",
                confirmButtonText: 'Registrar',
                showClass: {
                    popup: 'animate__animated animate__bounceInUp'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOutDown'
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    //window.location.href = "https://labmanufactura.net/SCEII/";
                    var formData = {
                        id_laboratorio: id,
                        codigo_bitacora: decodedText
                        };
                    $.ajax({
                        url: 'https://labmanufactura.net/api-sceii/v1/routes/bitacora.php',
                        type: 'POST',
                        dataType: 'JSON',
                        data: JSON.stringify(formData),
                        async: true,
                        headers: { 'Authorization': token },
                        success: function(response) {
                            //Swal.fire(response.message);
                            Swal.fire({
                                background: '#131414',
                                color: 'white',
                                icon: 'success',
                                title: 'Éxito',
                                text: response.message,
                            }).then((result) => {
                                window.location.href = "https://labmanufactura.net/SCEII/";
                            })
                        },
                        error: function(xhr, status, error) {
                            const obj = JSON.parse(xhr.responseText);
                            Swal.fire({
                                background: '#131414',
                                color: 'white',
                                icon: 'error',
                                title: obj.status,
                                text: obj.message,
                            })
                        }
                    });
                }else{
                    window.location.href = window.location.href;
                }
            })


            /**/
        }
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
});