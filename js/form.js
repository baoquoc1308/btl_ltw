function validate() {
    document.querySelector("[name='id']").classList.remove('error-input');
    document.querySelector("[name='name']").classList.remove('error-input');
    document.querySelector("[name='email']").classList.remove('error-input');
    document.querySelector(".gender").classList.remove('error-input');
    document.querySelector(".favorite").classList.remove('error-input');
    document.querySelector(".nationality").classList.remove('error-input');
    // Bắt đầu check validate ID:
    let inputId = document.querySelector("[name='id']").value.trim();
    let checkId = ``;
    let checkPlaceId = inputId.split("");

    if (inputId.length == 0) {
        checkId = `Vui lòng nhập ID!`
        document.querySelector("[name='id']").classList.add('error-input');
    }
    else if (!/^\d{10}$/.test(inputId)) {
        checkId = `Vui lòng nhập mã gồm 10 chữ số!`;
        document.querySelector("[name='id']").classList.add('error-input');
    }
    else {
        for (let i = 0; i < 10; i++) {
            if (checkPlaceId.length != 10) {
                checkId = `Vui lòng nhập đúng định dạng!`;
                break;
            }
        }
    }
    document.querySelector("#id_error").innerText = checkId;
    // Kết thúc check validate ID

    // Bắt đầu check validate Name:
    let inputFullName = document.querySelector("[name='name']").value.trim();
    let arrInputFullName = inputFullName.split(" ");
    let checkFullName = ``;

    function checkNumbers() {
        for (let item of arrInputFullName) {
            if (isNaN(item) == false) {
                return true;
            }
        }
    }

    if (inputFullName.length == 0) {
        checkFullName = `Vui lòng nhập Họ tên!`;
        document.querySelector("[name='name']").classList.add('error-input');
    }
    else if (arrInputFullName.length == 1 || checkNumbers()) {
        checkFullName = `Vui lòng nhập đúng định dạng!`;
        document.querySelector("[name='name']").classList.add('error-input');
    }

    document.querySelector("#name_error").innerText = checkFullName;
    // Kết thúc check

    // Bắt đầu check validate Email:
    let inputEmail = document.querySelector("[name='email']").value.trim();
    let checkEmail = ``;
    let arrCheckEmail = inputEmail.split("@");

    if (inputEmail.length == 0) {
        checkEmail = `Vui lòng nhập Email!`;
        document.querySelector("[name='email']").classList.add('error-input');

    }
    else if (inputEmail.startsWith("@") == true || inputEmail.endsWith("@") == true || arrCheckEmail.length != 2 || arrCheckEmail[1].startsWith(".") == true || arrCheckEmail[1].includes(".") == false || arrCheckEmail[1].endsWith(".") == true) {
        checkEmail = `Vui lòng nhập đúng định dạng!`;
        document.querySelector("[name='email']").classList.add('error-input');

    }

    document.querySelector("#email_error").innerText = checkEmail;
    // Kết thúc check validate Email

    // Bắt đầu check validate Giới tính:
    let listStatusSex = document.querySelectorAll(".status_sex");
    let checkStatusSex = `Vui lòng chọn!`;
    if (checkStatusSex !== '') {
        document.querySelector(".gender-row").classList.add('error-input');
    }
    for (let check of listStatusSex) {
        if (check.checked == true) {
            checkStatusSex = ``;
            document.querySelector(".gender-row").classList.remove('error-input');
            break;
        }
    }

    document.querySelector("#sex_error").innerText = checkStatusSex;
    // Kết thúc check validate Giới tính

    // Bắt đầu check validate Favorite:
    let listStatusFavorite = document.querySelectorAll(".status_favorite");
    let checkStatusFavorite = `Vui lòng chọn!`;
    if (checkStatusFavorite !== '') {
        document.querySelector(".favorite-row").classList.add('error-input');
    }
    for (let check of listStatusFavorite) {
        if (check.checked == true) {
            checkStatusFavorite = ``;
            document.querySelector(".favorite-row").classList.remove('error-input');

        }
    }

    document.querySelector("#favorite_error").innerText = checkStatusFavorite;
    // Kết thúc check validate Favorite

    // Bắt đầu check Nationality:
    let inputNationality = document.querySelector("#nationality").value;
    let nationalityErrorElement = document.querySelector("#nationality_error");
    let nationalitySelectElement = document.querySelector("#nationality");

    if (inputNationality == "null") {
        nationalityErrorElement.innerText = `Vui lòng chọn Quốc tịch!`;
        nationalitySelectElement.classList.add('error-input');
    } else {
        nationalityErrorElement.innerText = ''; 
        nationalitySelectElement.classList.remove('error-input');
    }
    // Kết thúc check Nationality

    // Bắt đầu check validate Ghi chú:
    let noteTextArea = document.querySelector("[name='note']");
    let noteContent = noteTextArea.value.trim();
    let noteError = document.querySelector("#note_error");

    if (noteContent.length > 200) {
        noteError.innerText = "Ghi chú không được quá 200 ký tự!";
        noteTextArea.classList.add('error-input');
    } else {
        noteError.innerText = ''; 
        noteTextArea.classList.remove('error-input'); 
    }
    // Kết thúc check validate Ghi chú
}