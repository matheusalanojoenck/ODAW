class GuessGame {
    constructor() {
        var min = 1;
        var max = 101;
        this.number_to_guess = Math.floor(Math.random() * (max - min)) + min;

        this.qntTry = 3;
        document.getElementById('resultLabel').innerHTML = '';
        console.log(this.number_to_guess);
    }

    playerGuess() {
        var playerNumberGuess = parseInt(document.getElementById('playerGuess').value);
        document.getElementById('playerGuess').value = '';
        if (!(playerNumberGuess == this.number_to_guess)) {
            this.qntTry--;
            if (this.qntTry == 0) {
                this.endGame();
            } else if (playerNumberGuess < this.number_to_guess) {
                document.getElementById('resultLabel').innerHTML = 'Errou! Tente um número maior';
            } else {
                document.getElementById('resultLabel').innerHTML = 'Errou! Tente um número menor';
            }
        } else {
            this.winGame();
        }
        this.updateRemainingAttempts();
    }

    initGame() {
        document.getElementById('playerGuess').disabled = false;
        document.getElementById('guessButton').disabled = false;
        document.getElementById('playerGuess').value = '';
    }

    endGame() {
        document.getElementById('resultLabel').innerHTML = 'Sem tentativas restante! \n O número correto era: ' + this.number_to_guess;
        document.getElementById('playerGuess').disabled = true;
        document.getElementById('guessButton').disabled = true;
    }

    winGame() {
        document.getElementById('resultLabel').innerHTML = 'Parabéns! Você acertou o número.';
        document.getElementById('playerGuess').disabled = true;
        document.getElementById('guessButton').disabled = true;
    }

    getQntTry() {
        return this.qntTry;
    }

    updateRemainingAttempts() {
        document.getElementById('remainingAttempts').innerHTML = 'Tentativas restantes: ' + this.qntTry;
    }
}

function removeDuplicateCharacters(string) {
    return string
        .split('')
        .filter(function (item, pos, self) {
            return self.indexOf(item) == pos;
        })
        .join('');
}

function remDup() {

    var result = removeDuplicateCharacters(document.getElementById('inputString').value);
    console.log(result);
    document.getElementById('resultRemDupLabel').innerHTML = 'String sem os caracteres duplicados: ' + result;
}

function sortList() {
    var list = document.getElementById('inputList').value;
    list = list.replace(' ', '');


    if (list.match(/^-?\d+(?:[ \t]*,[ \t]*-?\d+)*$/) != null) {
        var array = list.split(',').map(x => +x);
        array = array.sort((a, b) => a - b);
        document.getElementById('sortResult').innerHTML = 'Lista ordenada -> ' + array;
    } else {
        alert('Lista deve estar no formato correto!');
    }
}

function maiorIdade() {
    var hoje = new Date();
    var dataNasc = new Date(document.getElementById('dataNasc').value);
    const diff = Math.abs(hoje - dataNasc);
    var idade = Math.floor(diff / ((1000 * 60 * 60 * 24 * 365)));
    var suaIdade = `Sua idade: ${idade} | `;

    if (idade >= 18) {
        document.getElementById('resultIdade').innerHTML = suaIdade + 'Você é maior de idade!';
    } else {
        document.getElementById('resultIdade').innerHTML = suaIdade + 'Você não é maior de idade!';
    }
}
