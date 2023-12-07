const addScoreForm = document.querySelector('#scoreForm');

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
    console.log(data())

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
            } else {
                console.log(responseJson.message);
                console.log('error');
            }
        })
});
