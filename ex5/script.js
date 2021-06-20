function validaCpf(cpf) {
    if (cpf.length != 11) {
        return false;
    }

    let soma = 0;
    let resto = 0;
    var digito_verificador;

    function set_digito_verificador(resto) {
        if (resto < 2) {
            digito_verificador = 0;
        } else {
            digito_verificador = 11 - resto;
        }
    }

    for (let i = 0; i < 9; i++) {
        soma += parseInt(cpf[i]) * (10 - i)
    }
    resto = soma % 11;
    set_digito_verificador(resto);

    if (cpf[9] != digito_verificador) {
        return false;
    }

    soma = 0;
    for (let i = 0; i < 10; i++) {
        soma += parseInt(cpf[i]) * (11 - i)
    }
    resto = soma % 11;
    set_digito_verificador(resto);

    if (cpf[10] != digito_verificador) {
        return false;
    }

    return true;
}

function fat(num) {
    var rval = 1;
    for (var i = 2; i <= num; i++)
        rval = rval * i;
    return rval;
}

function qua_cub_fat(n) {
    return [n, Math.pow(n, 2), Math.pow(n, 3), fat(n)];
}

function populateTable(qnt) {
    table = document.getElementsByTagName('table')[0];

    for (let i = 0; i <= qnt; i++) {
        var newRow = table.insertRow(table.length);
        results = qua_cub_fat(i)
        for (var j = 0; j < results.length; j++) {
            // create a new cell
            var cell = newRow.insertCell(j);

            // add value to the cell
            cell.innerHTML = results[j];
        }
    }
}

function stringManipulation() {
    //Manipulação de strings
    //.indexOf retorna a posição da primeira ocorrência de uma substring em uma string
    let str = "Please locate where 'locate' occurs!";
    console.log(str.indexOf("locate"));

    //.toUpperCase retorna uma nova string em caixa alta, não altera a string original
    let strUpper = str.toUpperCase();
    console.log(strUpper);

    //retorna o char na n-ésima posição de uma string 
    console.log(str.charAt(9));
}

function somaAB() {
    a = document.getElementById('inputA').value;
    b = document.getElementById('inputB').value;
    resultado = parseInt(a) + parseInt(b);
    document.getElementById('textAreaResultado').value = resultado;
}




