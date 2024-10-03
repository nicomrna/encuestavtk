function seleccionarPremio(premio) {
    Swal.fire({
        title: 'Atención',
        text: 'Para retirar tu premio, tendrás que reservarlo online y luego retirarlo por cualquiera de nuestras sucursales.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#24B59D',
        cancelButtonColor: '#F14CAE',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Realiza la petición AJAX para reducir el premio y obtener el número de premios restantes
            fetch(`premios.php?premio=${premio}`)
                .then(response => response.json())  // Esperamos un JSON de respuesta
                .then(data => {
                    let cantidadRestante = data.cantidadRestante;

                    // Mostrar mensaje de éxito con cuenta regresiva
                    let countdown = 3; // Tiempo en segundos
                    Swal.fire({
                        title: '¡Hecho!',
                        html: `Tu premio ha sido reservado.<br>Serás redirigido hacia tu premio en <b>${countdown}</b>...`,
                        icon: 'success',
                        timer: countdown * 1000,  // Temporizador de 3 segundos
                        timerProgressBar: true,
                        didOpen: () => {
                            const b = Swal.getHtmlContainer().querySelector('b');
                            const timerInterval = setInterval(() => {
                                countdown--;
                                b.textContent = countdown;
                            }, 1000);
                        },
                        willClose: () => {
                            // Redirigir al usuario a la URL del premio, pasando la cantidad restante
                            window.location.href = obtenerUrlPremio(premio, cantidadRestante);
                        }
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    });
}

// Esta función retorna la URL correspondiente al premio seleccionado basado en la cantidad restante
function obtenerUrlPremio(premio, cantidadRestante) {
    let urls = {
        'auricular1': 'https://www.vtkaccesorios.com/checkout/v3/start/1560967481/cc0fba8c9a556dcd81b02b248187d6e2491942cf?from_store=1',
        'auricular2': 'https://www.vtkaccesorios.com/checkout/v3/start/1560969826/3de025ba84fe16c7f9a4bddbad8f5eb817a00e30?from_store=1',
        'funda_vidrio1': 'https://www.vtkaccesorios.com/checkout/v3/start/1561013248/7ed6638a343a0acb00abddcd2d8a182bb48e0ada?from_store=1',
        'funda_vidrio2': 'https://www.vtkaccesorios.com/checkout/v3/start/1561006560/a6c40c3532dec9275338f71f25f572792ae654d1?from_store=1', // Segundo enlace
        'hidrogel_funda': 'https://www.vtkaccesorios.com/checkout/v3/start/1561016885/1c8f561c2020123d773416ce03bf0ec3e1097e55?from_store=1',
        'orden_compra1': 'https://www.vtkaccesorios.com/checkout/v3/start/1561017479/e328ae9ee3fdc55e44db7a758cea19d5bb06b56c?from_store=1',
        'orden_compra2': 'https://www.vtkaccesorios.com/checkout/v3/start/1561017742/e7bfb0f08467a064d8cd9e5a64772652f905c29b?from_store=1' // Segundo enlace
    };

    // Lógica para seleccionar el enlace correcto basado en la cantidad restante
    if (premio === 'funda_vidrio') {
        return cantidadRestante === 1 ? urls['funda_vidrio2'] : urls['funda_vidrio1'];
    } else if (premio === 'orden_compra') {
        return cantidadRestante === 1 ? urls['orden_compra2'] : urls['orden_compra1'];
    } else {
        return urls[premio]; // Para otros premios
    }
}
