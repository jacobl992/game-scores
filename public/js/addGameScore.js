const addScoreForm = document.querySelector('#scoreForm');
const intValidationDisplay = document.querySelector('#invalidInt');
const formSuccess = document.querySelector('#submit-success');

const validation = (score) => {
    let result = false;

    if (Number.isInteger(parseInt(score, 10)) && score > 0) {
        result = true;
    }
    return result;
}

let data = () => {
    return {
        player: addScoreForm.elements['player'].value,
        game: addScoreForm.elements['game'].value,
        score: addScoreForm.elements['score'].value,
        date: addScoreForm.elements['gameDate'].value
    };
}

addScoreForm.addEventListener('submit', e => {
    e.preventDefault()
    formSuccess.style.display = 'none';
    let score = addScoreForm.elements['score'].value;

    console.log(data())
    if (validation(score)) {
        console.log('data passed fe validation')
        intValidationDisplay.style.display = 'none';

        // send it!
        fetch('./addScore', {
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            method: 'post',
            body: JSON.stringify(data())
        })
            .then(response => {
                return response.json()
            })
            .then(responseJson => {
                if (responseJson.success) {
                    console.log(responseJson.message);
                    formSuccess.style.display = 'block';
                } else {
                    console.log(responseJson.message);
                    intValidationDisplay.innerHTML = responseJson.message;
                    intValidationDisplay.style.display = 'block';
                    console.log('error');
                }
            })
    } else {
        intValidationDisplay.style.display = 'block';
        console.log('failed validation')
    }
});
