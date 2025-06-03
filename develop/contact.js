function validate() {

    var flag = true;

    removeElementsByClass("error");
    removeClass("error-form");

    // 名前の入力チェック
    if (document.edit.name.value == "") {
        errorElement(document.edit.name, "お名前が入力されていません");
        flag = false;
    }

    // ふりがなの入力チェック
    if (document.edit.kana.value == "") {
        errorElement(document.edit.kana, "ふりがなが入力されていません");
        flag = false;
    } else {
        if (!validateKana(document.edit.kana.value)) {
            errorElement(document.edit.kana, "ひらがなを入れてください");
            flag = false;
        }
    }

    // メールアドレスの入力チェック
    if (document.edit.email.value == "") {
        errorElement(document.edit.email, "メールアドレスが入力されていません");
        flag = false;
    } else {
        if (!validateMail(document.edit.email.value)) {
            errorElement(document.edit.email, "メールアドレスが正しくありません");
            flag = false;
        }
    }

    // 電話番号の入力チェック
    if (document.edit.tel.value == "") {
        errorElement(document.edit.tel, "電話番号が入力されていません");
        flag = false;
    } else {
        if (!validateTel(document.edit.tel.value)) {
            errorElement(document.edit.tel, "電話番号が違います");
            flag = false;
        }
    }

    // エラーチェック
    if (flag) {
        document.edit.submit();
    }
    return false;
}

// エラーメッセージの表示
var errorElement = function (form, msg) {
    form.className = "error-form";
    var newElement = document.createElement("div");
    newElement.className = "error";
    var newText = document.createTextNode(msg);
    newElement.appendChild(newText);
    form.parentNode.insertBefore(newElement, form.nextSibling);
}

//エラーメッセージの削除
var removeElementsByClass = function (className) {
    var elements = document.getElementsByClassName(className);
    while (elements.length > 0) {
        elements[0].parentNode.removeChild(elements[0]);
    }
}

// 適応スタイルの削除

var removeClass = function (className) {
    var elements = document.getElementsByClassName(className);
    while (elements.length > 0) {
        elements[0].className = "";
    }
}

// メールアドレスの書式チェック
var validateMail = function (val) {
    if (val.match(/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/) == null) {
        return false;
    } else {
        return true;
    }
}

//電話番号のチェック
var validateTel = function (val) {
    if (val.match(/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/) == null) {
        return false;
    } else {
        return true;
    }
}

// ひらがなのチェック
var validateKana = function (val) {
    if (val.match(/^[ぁ-んー]+$/) == null) {
        return false;
    } else {
        return true;
    }
}