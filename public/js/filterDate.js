const dateSelect = document.querySelector('.date');
const filterButton = document.querySelector('.filter-button');
const clearFilter = document.querySelector('.clear-filter');
const dateOnLoad = document.querySelector('#selected-date');
const alert = document.querySelector('.alert');
let date = dateSelect.value;

const initialDateParameter = () => {
    const pathSegments = window.location.pathname.split('/');
    const dateIndex = pathSegments.indexOf('scores') + 1;

    if (dateIndex > 0 && dateIndex < pathSegments.length) {
        return pathSegments[dateIndex];
    }

    return '';
}

const dateOnLoadHeader = () => {
    dateOnLoad.innerHTML = initialDateParameter()
}

dateOnLoadHeader();

clearFilter.addEventListener('click', e => {
    window.location.href = '../scores';
})

filterButton.addEventListener('click', e => {
    date = dateSelect.value;
    if (!date) {
        alert.style.display = 'block';
        alert.innerHTML = 'Date not selected';
    } else if (window.location.href !== `../scores/${date}`) {
        window.location.href = `../scores/${date}`;
    }
});
