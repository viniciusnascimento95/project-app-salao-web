$('.telefone_celular').inputmask('(99) 99999-9999', { 'placeholder': '(__) _____-____' });

$('.agendamento').inputmask('99/99/9999 99:99', { 'placeholder': '01/01/2020 12:00' });


function Salvando() {
  document.querySelector('button[type="submit"]').disabled = true;
  document.querySelector('button[type="submit"]').innerHTML = "Salvando..."
}
