// BOTÕES

const btnContato = document.getElementById('btncontato');
const btnServicos = document.getElementById('btnservicos');
const btnFormPhp = document.getElementById('btnformphp');
const btnEdit = document.getElementById('btnedit');
const btnPessoa = document.getElementById('btnpessoa');
const btnOng = document.getElementById('btnong');
const btnVoltar = document.getElementById('btnvoltar');
const btnLogin = document.getElementById('btnlogin');

btnContato.addEventListener('click', () => {
    window.location.href = 'contato.html';
});

btnServicos.addEventListener('click', () => {
    window.location.href = 'servico.html';
});

btnFormPhp.addEventListener('click', () => {
    window.location.href = 'form.html';
});

btnEdit.addEventListener('click', () => {
    window.location.href = '../php/edit.php';
});

btnPessoa.addEventListener('click', () => {
    window.location.href = '../php/form_v.php';
}); 

btnOng.addEventListener('click', () => {
    window.location.href = 'form_ong.html';
});

btnVoltar.addEventListener('click', () => {
    window.location.href = 'form.html';
})

btnLogin.addEventListener('click', () => {
    window.location.href = 'login.html';
})

// CARROSSEL

let cont = 1;

document.getElementById("radio-1").checked = true;

setInterval(() => {
  cont++;
  if (cont > 4) cont = 1;
  document.getElementById("radio-" + cont).checked = true;
}, 5000);