$(document).ready(function () {
    let intervalId = null;

    // Manejo de eliminación de vehículo
    $("[data-modal-toggle='delete-modal']").on("click", function () {
        let vehicleId = $(this).data("vehicle-id");
        $("#deleteVehicleForm").attr("action", `/vehicles/${vehicleId}`);
    });

    $(".modalToggleButton").click(function () {
        const vehicleId = $(this).data("id");
        const vehicleType = $(this).data("type");
        const vehiclePlate = $(this).data("plate");
        const vehicleStartTime = $(this).data("start-time");

        $(".modalTitle").html(`TIPO: ${vehicleType} | PLACA: ${vehiclePlate}`);

        $("#modalVehicleId").val(vehicleId);
        $("#modalStartTime").val(vehicleStartTime);

        if (intervalId) {
            clearInterval(intervalId);
        }

        function updateExitTime() {
            let now = new Date();

            // Formatear la hora actual en 24H (sin AM/PM)
            let hours = now.getHours().toString().padStart(2, "0");
            let minutes = now.getMinutes().toString().padStart(2, "0");
            let seconds = now.getSeconds().toString().padStart(2, "0");

            let currentTime = `${hours}:${minutes}:${seconds}`;
            $("#modalEndTime").val(currentTime);

            // Convertir Hora de Entrada y Hora Actual a milisegundos
            let startDate = new Date();
            let [startHours, startMinutes, startSeconds] = vehicleStartTime.split(":").map(Number);
            startDate.setHours(startHours, startMinutes, startSeconds, 0);

            let endDate = new Date();
            endDate.setHours(now.getHours(), now.getMinutes(), now.getSeconds(), 0);

            // Calcular la diferencia en milisegundos
            let diffMilliseconds = endDate - startDate;
            if (diffMilliseconds < 0) {
                diffMilliseconds += 86400000; // Manejo si pasa la medianoche
            }

            // Convertir la diferencia en HH:MM:SS
            let diffHours = Math.floor(diffMilliseconds / (1000 * 60 * 60));
            let diffMinutes = Math.floor((diffMilliseconds % (1000 * 60 * 60)) / (1000 * 60));
            let diffSeconds = Math.floor((diffMilliseconds % (1000 * 60)) / 1000);

            let totalTime = `${String(diffHours).padStart(2, "0")}:${String(diffMinutes).padStart(2, "0")}:${String(diffSeconds).padStart(2, "0")}`;
            $("#modalTotalTime").val(totalTime);
        }

        updateExitTime();
        intervalId = setInterval(updateExitTime, 1000);
    });

    $("[data-modal-hide='staticModal']").on("click", function () {
        if (intervalId) {
            clearInterval(intervalId);
            intervalId = null;
        }
    });
});
