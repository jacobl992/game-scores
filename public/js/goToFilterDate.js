const dateSelect = document.querySelector('#date');
const filterButton = document.querySelector('#filter-button');
const alert = document.querySelector('.alert');
let date = dateSelect.value;

filterButton.addEventListener('click', e => {
    date = dateSelect.value;
    if (!date) {
        alert.style.display = 'block';
        alert.innerHTML = 'Date not selected';
    } else if (window.location.href !== `./scores/${date}`) {
            alert.style.display = 'none';
            window.location.href = `./scores/${date}`;
            }
});
