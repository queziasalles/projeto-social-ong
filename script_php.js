const btnContatoPhp = document.getElementById('btncontatophp');
const btnServicosPhp = document.getElementById('btnservicosphp');
const btnFormPhp = document.getElementById('btnformphp');
const btnEditPhp = document.getElementById('btneditphp');
const btnVoltarPhp = document.getElementById('btnvoltarphp');

btnContatoPhp.addEventListener('click', () => {
    window.location.href = '../html/contato.html';
});

btnServicosPhp.addEventListener('click', () => {
    window.location.href = '../html/servico.html';
});

btnFormPhp.addEventListener('click', () => {
    window.location.href = '../html/form.html';
});

btnEditPhp.addEventListener('click', () => {
    window.location.href = '../php/edit.php';
});

btnVoltarPhp.addEventListener('click', () => {
    window.location.href = '../html/form.html';
});