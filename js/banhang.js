let list = [
  {
    id: 0,
    name: "Nhẫn kim cương",
    price: 700,
    number: 0
  },
  {
    id: 1,
    name: "Đồng hồ nữ",
    price: 400,
    number: 0
  },
  {
    id: 2,
    name: "Vòng tay bạc",
    price: 100,
    number: 0
  },
  {
    id: 3,
    name: "Lắc tay vàng",
    price: 450,
    number: 0
  },
  {
    id: 4,
    name: "Nhẫn bạc",
    price: 180,
    number: 0
  },
  {
    id: 5,
    name: "Dây chuyền vàng",
    price: 400,
    number: 0
  },
  {
    id: 6,
    name: "Lắc tay vàng",
    price: 600,
    number: 0
  },
];
generateTable();
let checkBoxFather = document.querySelector(".check_father");
let list_checkBoxChild = document.querySelectorAll(".check_child");
let listStatusCheckBoxChild = document.querySelectorAll(".check_child:checked");
let ArrIpt = document.querySelectorAll(".allIpt");
let listTmpArrIpt = ArrIpt;
let listIp = document.querySelectorAll(".ipt");
let listSum = document.querySelectorAll(".sum");
let sum = 0;
// Sort price: 
function sortTable() {
  document.querySelector("#sumPrice").innerText = 0;
  let sortPrice = document.querySelector("#sort").value;
  if (sortPrice == 1) {
    list.sort(function (a, b) {
      return a.price > b.price ? 1 : -1;
    })
  }
  else if (sortPrice == 2) {
    list.sort(function (a, b) {
      return a.price < b.price ? 1 : -1;
    })
  }
  generateTable();

  reloadArr();

  checkBoxFather.checked = false;

  checkboxOrInput();

  price();
}

checkboxOrInput();

price();

function generateTable() {
  let content = ``;
  for (let item of list) {
    content += `<tr>
                  <td>
                      <input id="checkbox_${item.id}" class="check_child" type="checkbox">
                  </td>
                  <td>
                      ${item.name}
                  </td>     
                  <td>
                      ${item.price}
                  </td>
                  <td class="allIpt">
                      <input step="1" type="number" class="ipt" value="${item.number}">
                  </td>
                  <td class='sum' id="sum_${item.id}">

                  </td>    
              </tr>`;

    document.querySelector("tbody").innerHTML = content;
  }
}

function reloadArr() {
  checkBoxFather = document.querySelector(".check_father");
  list_checkBoxChild = document.querySelectorAll(".check_child");
  ArrIpt = document.querySelectorAll(".allIpt");
  listTmpArrIpt = ArrIpt;
  listIp = document.querySelectorAll(".ipt");
  listSum = document.querySelectorAll(".sum");
}

// Checkbox and Input:
function checkboxOrInput() {
  for (let item of listIp) {
    item.style.display = `none`;
  }

  checkBoxFather.onclick = function () {
    for (let item of list_checkBoxChild) {
      item.checked = this.checked;
    }

    for (let item of listIp) {
      item.style.display = this.checked == false ? `none` : `inline`;
      item.value = 0;
    }

    for (let item of listSum) {
      item.innerText = 0;
    }

    for (let item of list) {
      item.number = 0;
    }

    sum = 0;
    document.querySelector("#sumPrice").innerText = 0;
  }

  for (let i = 0; i < 7; i++) {
    list_checkBoxChild[i].onclick = function () {

      listStatusCheckBoxChild = document.querySelectorAll(".check_child:checked");
      checkBoxFather.checked = listStatusCheckBoxChild.length == list_checkBoxChild.length;

      for (let i = 0; i < 7; i++) {
        if (list_checkBoxChild[i].checked == false) {
          listIp[i].style.display = `none`;
          listIp[i].value = 0;
        }
        else {
          listIp[i].style.display = `inline`;
        }
      }

      listSum[i].innerText = 0;
      sum -= list[i].price * list[i].number;
      list[i].number = 0;
      document.querySelector("#sumPrice").innerText = sum;

    }
  }
}

// Price
function price() {
  for (let i = 0; i < 7; i++) {
    let valueInput = parseInt(listIp[i].value);
    listIp[i].oninput = function () {
      valueInput = parseInt(listIp[i].value);
      list[i].number = valueInput >= 0 ? valueInput : 0;
    }

    listIp[i].onblur = function () {
      if (listIp[i].value == 0) {
        list[i].number = 0;
        valueInput = 0;
      }
      else if (valueInput < 0) {
        listIp[i].value = 0;
        list[i].number = 0;
        valueInput = 0;
        listSum[i].innerText = 0;
      }
      else {
        listSum[i].innerText = list[i].price * valueInput;
        sum += list[i].price * valueInput;
        document.querySelector("#sumPrice").innerText = sum;
      }
    }

    listIp[i].onfocus = function () {
      if (parseInt(listSum[i].innerHTML) != 0) {
        sum -= list[i].price * valueInput;
      }
      listIp[i].value = 0;
      listSum[i].innerText = 0;
      list[i].number = 0;
      document.querySelector("#sumPrice").innerText = sum;
    }
  }
}