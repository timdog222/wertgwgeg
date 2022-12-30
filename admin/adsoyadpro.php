<?php
$customCSS = array('<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
'<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>',
    '<script src="../assets/plugins/jquery.toast/jquery.toast.js"></script>'

);

$page_title = 'Ad Soyad PRO';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

error_reporting(0);

?>
<!--<div class="page-content">-->
<!--BAŞLANGIC-->
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        Ad Soyad PRO
                    </h4>
                    <p style="color: #fff">Sorgulanacak kişinin adını ve soyadını giriniz.</p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input require maxlength="30" class="form-control" type="text" name="first" id="first" placeholder="Ad"><br>
                            <input require maxlength="30" class="form-control" type="text" name="last" id="last" placeholder="Soyad"><br>
                            <input require maxlength="30" class="form-control" type="text" name="adresil" id="adresil" placeholder="İl"><br>
                            <input require maxlength="30" class="form-control" type="text" name="adresilce" id="adresilce" placeholder="İlçe"><br>
                            <center class="nw">
                                <button onclick="checkNumber()" id="sorgula" class="btn waves-effect waves-light btn-rounded btn-primary btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
                                    <span><i class="fas fa-search"></i> Sorgula </span></button>
                                <button onclick="clearResults()" id="durdurButon" class="btn waves-effect waves-light btn-rounded btn-danger btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
                                    <span><i class="fas fa-trash-alt"></i> Sıfırla </span></button>
                                <button onclick="printTable()" id="yazdirTable" class="btn waves-effect waves-light btn-rounded btn-warning btn-new" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
                                    <span><i class="fas fa-print"></i> Yazdır Detay </span></button><br><br>
                            </center>
                            <div class="table-responsive">
                                <table id="zero-conf" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Kimlik No</th>
                                            <th>Ad</th>
                                            <th>Soyad</th>
                                            <th>Doğum Tarihi</th>
                                            <th>Doğum Yeri</th>
                                            <th>Anne Adı</th>
                                            <th>Baba Adı</th>
                                            <th>Nüfus İl</th>
                                            <th>Nüfus İlçe</th>
                                            <th>Adres İl</th>
                                            <th>Adres İlçe</th>
                                            <th>Adres Mahalle</th>
                                            <th>Adres Cadde/Sokak</th>
                                            <th>Adres Bina No</th>
                                            <th>Adres Daire No</th>
                                        </tr>
                                    </thead>
                                    <tbody id="jojjoojj">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById('first').addEventListener("keyup", function() {
        this.value = this.value.toLocaleLowerCase("tr-TR");
    });

    document.getElementById('last').addEventListener("keyup", function() {
        this.value = this.value.toLocaleLowerCase("tr-TR");
    });

    document.getElementById('adresil').addEventListener("keyup", function() {
        this.value = this.value.toLocaleLowerCase("tr-TR");
    });

    document.getElementById('adresilce').addEventListener("keyup", function() {
        this.value = this.value.toLocaleLowerCase("tr-TR");
    });
</script>
<script type="text/javascript">
    function clearResults() {

        $("#jojjoojj").html(
            '<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">No data available in table</td></tr>'
        );

        $("#first").val("");
        $("#last").val("");
        $("#adresil").val("");
        $("#adresilce").val("");
    }

    function checkNumber() {
        /*
        return Swal.fire({
            icon: "warning",
            title: "Oooooopss...",
            text: "Bu çözüm şu an bakımdadır!"
        });
        */

        var roleNumber = "<?= $k_rol ?>";

        if (parseInt(roleNumber) == 1 || parseInt(roleNumber) == 2) {

            $.Toast.showToast({
                "title": "Sorgulanıyor...",
                "icon": "loading",
                "duration": 86400000
            });

            $.ajax({
                url: "../api/secmen/api.php",
                type: "POST",
                data: {
                    ad: $("#first").val(),
                    soyad: $("#last").val(),
                    adresil: $("#adresil").val(),
                    adresilce: $("#adresilce").val(),
                },
                success: (res) => {

                    var json = res;

                    $.Toast.hideToast();

                    if (json.message === "cooldown error") {
                        return Swal.fire({
                            icon: 'warning',
                            title: 'Ooooopss...',
                            text: 'Çok sık sorgu yapıyorsunuz! Lütfen ' + json.remain + ' saniye bekleyin.',
                        })
                    }

                    if (json.success === "false") {
                        $.Toast.hideToast();
                        Swal.fire({
                            icon: 'error',
                            title: 'Bulunamadı!',
                            text: 'Girdiğiniz bilgiler ile eşleşen biri bulunamadı.',
                        })
                        return;
                    } else if (json.success === "true") {
                        $.Toast.hideToast();
                        var array = [];
                        for (var i = 0; i < json.number; i++) {
                            var data = json.data[i];
                            var tc = data.tc;
                            var ad = data.ad;
                            var soyad = data.soyad;
                            var dogumtarihi = data.dogumtarihi;
                            var dogumyeri = data.dogumyeri;
                            var anneadi = data.anneadi;
                            var babaadi = data.babaadi;
                            var nufusil = data.nufusil;
                            var nufusilce = data.nufusilce;
                            var adresil = data.adresil;
                            var adresilce = data.adresilce;
                            var mahalle = data.mahalle;
                            var caddesokak = data.caddesokak;
                            var kapino = data.kapino;
                            var daireno = data.daireno;

                            result = "<tr>" +
                                "<td>" + tc + "</td>" +
                                "<td>" + ad + "</td>" +
                                "<td>" + soyad + "</td>" +
                                "<td>" + dogumtarihi + "</td>" +
                                "<td>" + dogumyeri + "</td>" +
                                "<td>" + anneadi + "</td>" +
                                "<td>" + babaadi + "</td>" +
                                "<td>" + nufusil + "</td>" +
                                "<td>" + nufusilce + "</td>" +
                                "<td>" + adresil + "</td>" +
                                "<td>" + adresilce + "</td>" +
                                "<td>" + mahalle + "</td>" +
                                "<td>" + caddesokak + "</td>" +
                                "<td>" + kapino + "</td>" +
                                "<td>" + daireno + "</td>" +
                                "</tr>";
                            array.push(result);
                        }
                        $("#jojjoojj").html(array)
                    } else {
                        $.Toast.hideToast();
                        Swal.fire({
                            icon: 'error',
                            title: 'Bulunamadı!',
                            text: 'Girdiğiniz bilgiler ile eşleşen biri bulunamadı.',
                        })
                        return;
                    }
                },
                error: () => {
                    $.Toast.hideToast();
                    Swal.fire({
                        icon: 'error',
                        title: "Sunucu hatası!",
                        text: 'Lütfen yönetici ile iletişime geçin.'
                    })
                    return;
                }
            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Bu çözümü kullanman için yeterli yetkin bulunmuyor!',
            })
            return;
        }
    }
</script>
<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>