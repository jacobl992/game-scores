const cathyTotalScore = document.querySelector('#cathy-row-totalscore');
const jakeTotalScore = document.querySelector('#jake-row-totalscore');
const cathyWinTally = document.querySelector('#cathy-row-wintally');
const jakeWinTally = document.querySelector('#jake-row-wintally');

const cathyTotalScoreInt = parseInt(cathyTotalScore.dataset.totalscore, 10);
const jakeTotalScoreInt = parseInt(jakeTotalScore.dataset.totalscore, 10);
const cathyWinTallyInt = parseInt(cathyWinTally.dataset.wintally, 10);
const jakeWinTallyInt = parseInt(jakeWinTally.dataset.wintally, 10);

if (cathyTotalScoreInt > jakeTotalScoreInt) {
    jakeTotalScore.classList.add('winner');
} else if (cathyTotalScoreInt < jakeTotalScoreInt) {
    cathyTotalScore.classList.add('winner');
}

if (cathyWinTallyInt > jakeWinTallyInt) {
    cathyWinTally.classList.add('winner');
} else if (cathyWinTallyInt < jakeWinTallyInt) {
    jakeWinTally.classList.add('winner');
}
