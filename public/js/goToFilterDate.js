const dateSelect = document.querySelector('#date');
const filterButton = document.querySelector('#filter-button');

filterButton.addEventListener('click', e => {
    let date = dateSelect.value;
    console.log(date);
    if (window.location.href !== `./scores/${date}`) {
            window.location.href = `./scores/${date}`;
            }
});
