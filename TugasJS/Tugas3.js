var inputNama = document.querySelector('#name');
var inputPilihan = document.querySelector('#pilihan');
var container = document.querySelector('.container');
const btn = document.querySelector('#btn');

var tamp = [];

btn.addEventListener('click', tombolTekan);

function tombolTekan() {
    var nama = inputNama.value.trim();
    var pilihan = inputPilihan.value.trim();
    if (nama === '' || pilihan === '') {
        alert('Jangan ada yang kosong');
    } else {
        inputPilih();
    }
}

function inputPilih() {
    btn.remove();
    const element = document.querySelectorAll('.input');
    element.forEach(function(e) {
        e.parentNode.removeChild(e);
    });

    var batas = parseInt(inputPilihan.value.trim());
    for (let index = 0; index < batas; index++) {
        const pilih = document.createElement('div');
        pilih.classList.add('input');

        const label = document.createElement('label');
        label.textContent = 'Pilihan ' + (index + 1) + ':';
        label.setAttribute('for', 'pilihan' + index);

        const input = document.createElement('input');
        input.type = 'text';
        input.setAttribute('id', 'pilihan' + index);

        pilih.appendChild(label);
        pilih.appendChild(input);
        container.appendChild(pilih);
    }
    const ok = document.createElement('button');
    ok.type = 'submit';
    ok.setAttribute('id', 'btnOK');
    ok.textContent = 'OK';
    container.appendChild(ok);

    const okb = document.querySelector('#btnOK');
    okb.addEventListener('click', function(e) {
        const inp = document.querySelectorAll('[id^="pilihan"]');
        for (let index = 0; index < inp.length; index++) {
            tamp[index] = inp[index].value;
        }
        inputHobi();
        ok.disabled = true;
    });
}

function inputHobi() {
    const containDrop = document.createElement('div');
    containDrop.setAttribute('class', 'input');

    const hobiLabel = document.createElement('label');
    hobiLabel.textContent = 'Hobi';
    hobiLabel.setAttribute('for', 'hobi');

    const hobiSelect = document.createElement('select');
    hobiSelect.setAttribute('id', 'hobi');

    const hobi = ['Memancing', 'Ongkek', 'Ngoding', 'Workout'];

    hobi.forEach(function(hobi) {
        const optionElement = document.createElement('option');
        optionElement.textContent = hobi;
        hobiSelect.appendChild(optionElement);
    });

    const defaultOption = document.createElement('option');
    defaultOption.textContent = 'Pilih Hobi';
    defaultOption.setAttribute('disabled', 'disabled');
    defaultOption.setAttribute('selected', 'selected');
    hobiSelect.insertBefore(defaultOption, hobiSelect.firstChild);

    containDrop.appendChild(hobiLabel);
    containDrop.appendChild(hobiSelect);
    container.appendChild(containDrop);

    const ok1 = document.createElement('button');
    ok1.type = 'submit';
    ok1.setAttribute('id', 'btn_ok');
    ok1.textContent = 'Submit';
    container.appendChild(ok1);

    const tombol_OK = document.querySelector('#btn_ok');
    tombol_OK.addEventListener('click', function(e) {
        const nama = inputNama.value;
        const jmlpil = inputPilihan.value;
        var txtARy = '';

        for (let i = 0; i < tamp.length; i++) {
            txtARy += ' Pilihan ' + (i + 1) + ': ' + tamp[i] + ', ';
        }

        const hb = document.getElementById('hobi');
        const Hobi = hb.value;
        const txt = "<p>" + 'Saya ' + nama + ' memilih pilihan sejumlah ' + jmlpil + ' meliputi ' + txtARy + 'Memiliki hobi ' + Hobi + "</p>";
        container.innerHTML = txt;
    });
}
