$('.telefone_celular').inputmask('(99) 99999-9999', { 'placeholder': '(__) _____-____' });


function Salvando() {
  document.querySelector('button[type="submit"]').disabled = true;
  document.querySelector('button[type="submit"]').innerHTML = "Salvando..."
}
