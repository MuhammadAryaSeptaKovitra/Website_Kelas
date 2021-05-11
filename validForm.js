function validate() {
  var pesanError = "";

  pesanError += validateNama(myform.nama.value);
  pesanError += validateEmail(myform.email.value);
  pesanError += validasiPassword(myform.password.value);
  pesanError += konfirmasiPassword(myform.password.value, myform.pwd2.value);

  if (pesanError == "") {
    return true;
  } else {
    document.getElementById("pesanErrorBox").innerHTML = pesanError;
    return false;
  }
}
// [^a-zA-Z\' ]

function validateNama(field) {
  if (/[^a-zA-Z\' ]/.test(field)) {
    return "Nama hanya boleh berisi Huruf ";
  } else return "";
}
function validateEmail(field) {
  if (/[^a-zA-Z0-9\.\@\_\-]/.test(field)) {
    return "Terdapat karakter yang tidak valid pada email. \n";
  } else return "";
}
function validasiPassword(field) {
  if (field.length < 8) {
    return "Password minimal 8 karakter. \n";
  } else if (!/[A-Z]/.test(field)) {
    return "Password harus memuat huruf besar \n";
  } else return "";
}

function konfirmasiPassword(password, pwd2) {
  if (password != pwd2) {
    return "Password tidak sesuai. \n";
  } else return "";
}
