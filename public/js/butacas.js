let seleccionadas = [];

document.addEventListener('DOMContentLoaded', () => {

    const seats = document.querySelectorAll('.seat');
    const input = document.getElementById('butacasInput');

    seats.forEach(seat => {

        seat.addEventListener('click', () => {

            // 🚫 si está bloqueada
            if (seat.classList.contains('disabled-seat')) return;

            const id = seat.dataset.id;

            // 🔁 toggle selección
            if (seleccionadas.includes(id)) {

                seleccionadas = seleccionadas.filter(x => x !== id);

                seat.classList.remove('bg-primary');
                seat.classList.add('bg-success');

            } else {

                seleccionadas.push(id);

                seat.classList.remove('bg-success');
                seat.classList.add('bg-primary');

            }

            // 📦 actualizar input oculto
            input.value = seleccionadas.join(',');

            console.log('Seleccionadas:', seleccionadas);
        });

    });

});