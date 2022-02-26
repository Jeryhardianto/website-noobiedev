//hide tombol Cetak
$(document).ready(function() {
    $("#cetakNota").hide();
});



//convert a string like "1.234.567,89" to a float like 1234567.89
function strToFloat(str) {
    str += ''; //force it to be a string
    if (str == '') {
        return 0.0;
    }
    return parseFloat(str.replace(/\./g, "").replace(",", "."));
}

//convert a string like "1.234.567,89" to an integer like 1234567
function strToInt(str) {
    str += ''; //force it to be a string
    if (str == '') {
        return 0;
    }
    return parseInt(str.replace(/\./g, "").replace(",", "."));
}

//convert a number like 1234567.89 to a string like "1.234.567,89"
function numberToStr(num) {
    var parts = num.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(",");
}

$('#produk').change(function() {
    var hargaproduk = $('option:selected', this).attr('data-price');
    $('#harga').val(numberToStr(hargaproduk));

    var hargamin = $('option:selected', this).attr('data-price-min');
    $('#hargaMin').val(numberToStr(hargamin));

    var tipex = $('option:selected', this).attr('tipe-barang');
    $('#tipex').val(tipex);

    var stok = $('option:selected', this).attr('stok');
    $('#qty').val(stok);
});
//Harga Produk
$('#harga').keyup(
    function() {
        hargaproduk = strToFloat($('#harga').val().replace(/[^0-9]/g, ''));
        $('#harga').val(numberToStr(hargaproduk));
    }
);

//Dibayar
$('#bayar').keyup(
    function() {
        bayar = strToFloat($('#bayar').val().replace(/[^0-9]/g, ''));
        $('#bayar').val(numberToStr(bayar));
    }
);

//BON
$('#bon').keyup(
    function() {
        bon = strToFloat($('#bon').val().replace(/[^0-9]/g, ''));
        $('#bon').val(numberToStr(bon));
    }
);

//Potongan
$('#potongan').keyup(
    function() {
        potongan = strToFloat($('#potongan').val().replace(/[^0-9]/g, ''));
        $('#potongan').val(numberToStr(potongan));
    }
);

/*
//JumlahUang
$('#jumlahUang').keyup(
    function() {
        jumlahUang = strToFloat($('#jumlahUang').val().replace(/[^0-9]/g, ''));
        $('#jumlahUang').val(numberToStr(jumlahUang));
    }
);*/

var table = document.getElementById("exa3");


//Fungsi untuk menambahkan data produk ke tabel

function detailProduk() {
    var produk      = document.getElementById("produk").value;
    var namaproduk  = $('#produk').find("option:selected").text();
    var harga       = strToInt(document.getElementById("harga").value);
    var jml         = strToInt(document.getElementById("jumlah").value);
    var qty         = strToInt(document.getElementById("qty").value);
    // var subTOT        = strToInt(document.getElementsByClassName("subTOT").value);
    var hargaMin    = strToInt(document.getElementById("hargaMin").value);
    var tipe        = strToInt(document.getElementById("tipex").value);

    // alert(hargaMin);



    //var kategori = $('#kategori').val();


    if (jml == '0' || jml == 0 || jml == null || jml == '' || harga == null || harga == '' || namaproduk == '-- Pilih Produk --') {
        Swal.fire(
            'Peringatan!',
            'Produk, Harga dan Jumlah tidak boleh kosong!',
            'warning'
        )

    } else if (jml > qty) {
        Swal.fire(
            'Peringatan!',
            'Stok tidak mencukupi!',
            'error'
        )
    } else if (hargaMin > harga) {
        Swal.fire(
            'Peringatan!',
            'Harga minimal untuk produk ' + namaproduk + ' adalah Rp.' + numberToStr(hargaMin) + '',
            'warning'
        )

    } else {
        //console.log('bener');
        var row = table.insertRow(-1);
        var celno = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);
        var cell3 = row.insertCell(3);
        var cell4 = row.insertCell(4);
        var cell5 = row.insertCell(5);


        celno.innerHTML = '<input type="hidden value='.concat('>');
        cell1.innerHTML = '<input type="hidden" name="produk[]" value='.concat(produk, '><input type="hidden" name="tipe[]" value=', tipe, '>', namaproduk);
        // cell2.innerHTML = '<input type="hidden" class="harga" name="harga[]" value='.concat(harga, '>', numberToStr(harga));
        cell2.innerHTML = '<input type="hidden" class="harga" name="harga[]" value='.concat(harga, '><input type="hidden" name="hargaMin[]" value=', hargaMin, '>', numberToStr(harga));

        cell3.innerHTML = '<input type="hidden" class="jml" name="jml[]" value='.concat(jml, '>', jml);
        cell4.innerHTML = '<input type="hidden" class="subTOT" name="subTOT[]" value='.concat(harga * jml, '>', numberToStr(harga * jml));


        //cell3.innerHTML='<input type="button" id="del" value="Delete" onclick="deleteRow(this)"/>';
        cell5.innerHTML =
            '<input type="hidden" class="jantotal"><button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)"><i class="mdi mdi-delete"></i> Hapus</button>';

        //document.getElementById("product").value='';
        //document.getElementById("quantity").value = '';
    }
}

function deleteRow(el) {
    var i = el.parentNode.parentNode.rowIndex;
    table.deleteRow(i);
    while (table.rows[i]) {
        updateRow(table.rows[i], i, false);
        i++;
    }
    //Jika Ada 1 baris produk dihapus reset potongan,dibayar dan bon menjadi 0
    var nol = 0;
    $('#potongan').val(numberToStr(nol));
    $('#bon').val(numberToStr(nol));
    $('#bayar').val(numberToStr(nol));

}


//Fungsi untuk mendapatkan harga total barang.
$('#FormNotaJual').on('change keyup click', function() {
    var subtotal            = 0;
    var total               = 0;
    var bayar               = 0;
    var bon                 = 0;
    var potongan            = 0;
    var totalHarusBayar     = 0;
    var kembalian           = 0;

    $('tr', this).each(function() {
        var $this = $(this),
            jumlahBarang = parseFloat(strToFloat($this.find('.jml').val()) || '0', 10),
            hargaPerBarang = parseInt(strToInt($this.find('.harga').val()) || '0', 10);
        //console.log(jumlahBarang);
        //console.log(hargaPerBarang);
        var sum = jumlahBarang * hargaPerBarang;
        var msum = numberToStr(sum);
        $this.find('.jantotal').val(msum);
        //  $('.kembalian').html('Rp '.concat(numberToStr(kembalian)));

        subtotal += (jumlahBarang * hargaPerBarang);
    });
    var mSubtotal = numberToStr(subtotal);

    console.log(mSubtotal);
    $('.subtotal', this).html('Rp '.concat(mSubtotal));

    potongan = strToInt($('#potongan').val().replace(/[^0-9]/g, ''));
    $('.potongan').html('Rp '.concat(numberToStr(potongan)));
    total = subtotal - potongan;


    // $('#ltotal').val('Rp '.concat(numberToStr(total)));
    $('.total').html('Rp '.concat(numberToStr(total)));
    $('#total').val(total);

    //Dibayar
    bayar = strToFloat($('#bayar').val().replace(/[^0-9]/g, ''));


    //Bon
    bon = strToFloat($('#bon').val().replace(/[^0-9]/g, ''));

    //Total Harus Dibayar
    totalHarusBayar = total - bon
        //set value hidden total harus dibayar
        //$('#totalHarusBayar').val(totalHarusBayar);
        // console.log(totalHarusBayar);

    //Kembalian
    kembalian = bayar - totalHarusBayar;
    $('.kembalian').html('Rp '.concat(numberToStr(kembalian)));





    if (total != 0 && totalHarusBayar != 0) {
        if (kembalian == 0 || bayar >= total) {
            $("#cetakNota").show();
        } else {
            $("#cetakNota").hide();
        }
    }




});