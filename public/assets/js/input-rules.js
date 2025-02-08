function validateLowercaseInput(input) {
    // Hanya memperbolehkan huruf kecil (a-z)
    input.value = input.value.replace(/[^a-z]/g, '');
}

function validateUppercaseInput(input) {
    // Hanya memperbolehkan huruf besar (A-Z)
    input.value = input.value.replace(/[^A-Z]/g, '');
}

function validateNumberInput(input) {
    // Hanya memperbolehkan angka (0-9)
    input.value = input.value.replace(/[^0-9]/g, '');
}

function validateAlphanumericInput(input) {
    // Hanya memperbolehkan huruf dan angka
    input.value = input.value.replace(/[^a-zA-Z0-9]/g, '');
}

function validateEmailInput(input) {
    // Hanya memperbolehkan email
    input.value = input.value.replace(/[^a-zA-Z0-9@.]/g, '');
}

function validatePhoneInput(input) {
    // Hanya memperbolehkan nomor telepon
    input.value = input.value.replace(/[^0-9+]/g, '');
}

function validateURLInput(input) {
    // Hanya memperbolehkan URL
    input.value = input.value.replace(/[^a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g, '');
}

function validateDateInput(input) {
    // Hanya memperbolehkan tanggal
    input.value = input.value.replace(/[^0-9/]/g, '');
}

function validateTimeInput(input) {
    // Hanya memperbolehkan waktu
    input.value = input.value.replace(/[^0-9:]/g, '');
}

function validateDateTimeInput(input) {
    // Hanya memperbolehkan tanggal dan waktu
    input.value = input.value.replace(/[^0-9/:]/g, '');
}

function validateDecimalInput(input) {
    // Hanya memperbolehkan angka desimal
    input.value = input.value.replace(/[^0-9.]/g, '');
}

function validateIntegerInput(input) {
    // Hanya memperbolehkan angka bulat
    input.value = input.value.replace(/[^0-9]/g, '');
}

function validateCreditCardInput(input) {
    // Hanya memperbolehkan nomor kartu kredit
    input.value = input.value.replace(/[^0-9-]/g, '');
}

function validateLetterInput(input) {
    // Hanya memperbolehkan huruf dan tidak bisa symbol atau spasi
    input.value = input.value.replace(/[^a-zA-Z]/g, '');
}
