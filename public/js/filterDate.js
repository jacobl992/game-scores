const dateSelect = document.querySelector('.date');
const filterButton = document.querySelector('.filter-button');const unresponseiveTable = document.querySelector('#unresponsive-table');
const clearFilter = document.querySelector('.clear-filter');

clearFilter.addEventListener('click', e => {
    window.location.href = '../scores';
})

filterButton.addEventListener('click', e => {
    let date = dateSelect.value;
    console.log(date);
    if (window.location.href !== `../scores/${date}`) {
            window.location.href = `../scores/${date}`;
            }
});
