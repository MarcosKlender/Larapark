$(document).ready(function () {
    $(".modalToggleButton").click(function () {
        // Creación de constantes con los valores del botón Modal Toggle
        const vehicleId = $(this).attr("data-id");
        const vehicleType = $(this).attr("data-type");
        const vehiclePlate = $(this).attr("data-plate");
        const vehicleStartTime = $(this).attr("data-start-time");

        // Título dinámico del modal
        $(".modalTitle").html(
            "TIPO: " + vehicleType + " | PLACA: " + vehiclePlate
        );

        // Asignación del ID Vehículo
        $("#modalVehicleId").val(vehicleId);

        // Asignación de la hora de entrada del Vehículo
        $("#modalStartTime").val(vehicleStartTime);

        // INICIO DEL SETINTERVAL
        setInterval(function () {
            // Asignación de la hora de salida del Vehículo
            var currentTime = new Date().toLocaleTimeString();
            $("#modalEndTime").val(currentTime);

            // Asignación del tiempo total del Vehículo
            var hora1 = vehicleStartTime;
            var hora2 = currentTime;

            var segundos1 =
                +hora1.split(":")[0] * 3600 +
                +hora1.split(":")[1] * 60 +
                +hora1.split(":")[2];
            var segundos2 =
                +hora2.split(":")[0] * 3600 +
                +hora2.split(":")[1] * 60 +
                +hora2.split(":")[2];

            var diferencia = Math.abs(segundos2 - segundos1);
            var horas = Math.floor(diferencia / 3600);
            var minutos = Math.floor((diferencia % 3600) / 60);
            var segundos = diferencia % 60;

            var tiempo =
                ("0" + horas).slice(-2) +
                ":" +
                ("0" + minutos).slice(-2) +
                ":" +
                ("0" + segundos).slice(-2);

            $("#modalTotalTime").val(tiempo);
        }, 1000);
        // FIN DEL SETINTERVAL
    });
});
