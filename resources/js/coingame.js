const coin = document.querySelector('#coin');
const buttonHeads = document.querySelector('#flipHeads');
const buttonTails = document.querySelector('#flipTails');
const amount = document.querySelector('#amount');
const url = document.URL;

function deferFn(callback, ms) {
    setTimeout(callback, ms);
}

function processResultHeads(resultHeads) {
    let bet = amount.value;
    if (resultHeads === 'heads') {
        window.location.replace(url + "win" + bet);
    } else {
        window.location.replace(url + "lose" + bet);
    }
}

function processResultTails(resultTails) {
    let bet = amount.value;
    if (resultTails === 'tails') {
        window.location.replace(url + "win" + bet);
    } else {
        window.location.replace(url + "lose" + bet);
    }
}

function flipCoinHeads() {
    coin.setAttribute('class', '');
    const random = Math.random();
    const resultHeads = random < 0.45 ? 'heads' : 'tails';
    deferFn(function () {
        coin.setAttribute('class', 'animate-' + resultHeads);
        deferFn(processResultHeads.bind(null, resultHeads), 2900);
    }, 100);
}


function flipCoinTails() {
    coin.setAttribute('class', '');
    const random = Math.random();
    const resultTails = random < 0.45 ? 'tails' : 'heads';
    deferFn(function () {
        coin.setAttribute('class', 'animate-' + resultTails);
        deferFn(processResultTails.bind(null, resultTails), 2900);
    }, 100);
}

buttonHeads.addEventListener('click', flipCoinHeads);
buttonTails.addEventListener('click', flipCoinTails);

//source: https://codepen.io/hisivasankar/pen/yWZbPJ