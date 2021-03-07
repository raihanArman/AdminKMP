let id_user;
function confirm(id) {
    id_user = id;
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '<?= Url::URL ?>/transaksi/confirm/' + id, true);
    xhr.onload = function () {
        if (this.status == 200) {
            let data = JSON.parse(this.responseText);

            document.getElementById('flasher').innerHTML = data.flasher;
            document.getElementById('statusPembayaran').innerHTML = data.status_pembayaran;

        }
    }
    xhr.send();
}

    // setInterval(function() {

    //     let xhr = new XMLHttpRequest();
    //     xhr.open('GET', '<?= Url::URL ?>/transaksi/getSingle/'+id_user, true);
    //     xhr.onload = function() {
    //         if (this.status == 200) {
    //             console.log(this.responseText);
    //         }
    //     }
    //     xhr.send();
    // }, 2000);


    