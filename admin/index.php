<?php
require '../server/baglan.php';
$customCSS = array(
  '<link href="https://quarex.pro/assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
  
);
$customJAVA = array(
  '<script src="../assets/plugins/apexcharts/apexcharts.min.js"></script>',
  '<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>',
  '<script src="../assets/js/pages/dashboard.js"></script>'
);
$page_title = 'CHAVO PANEL';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

$query = "SELECT * FROM sh_kullanici";

if ($result = mysqli_query($conn, $query)) {
  $rowcount = mysqli_num_rows($result);
  $rowcount;
} else {
  $rowcount = "0";
  $rowcount2 = "1";
 
}
?>
<body style='background-color:black'>
<!--BAŞLANGIC-->
<style>
body {
    background-image: url(dc.jpg);
    width: 100%;
    background-size: 100% 100%;
    height: 100vh;
}

.btn-1 {
    border: none;
    color: white;
    background-color: #4CAF50;
    padding: 10px 20px;
    cursor: pointer;
    border: 2px solid #4CAF50;
    -moz-border-radius: 16px;
    -webkit-border-radius: 16px;
    border-radius: 16px;
}
 
.btn-1:hover {
    color: #4CAF50;
    background-color: #fff;
    border: 2px solid #4CAF50;
}
 
.btn-2 {
    width: 70px;
    height: 70px;
    border: none;
    color: white;
    background-color: #4CAF50;
    cursor: pointer;
    border: 2px solid #4CAF50;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
 
.btn-2:hover {
    color: #4CAF50;
    background-color: #fff;
    border: 2px solid #4CAF50;
}

h1{
    color: #fff;
    text-align: center;
    position: relative;
    font-family: sans-serif;
    font-size: 50px;
    text-shadow:
    0 0 5px #fff, 
    0 0 10px #fff,
    0 0 15px #0000ff, 
    0 0 20px #0000ff, 
    0 0 25px #0000ff, 
    0 0 30px #0000ff, 
    0 0 35px #0000ff;
}

  @function vw($px) {
  @return $px / 375 * 100vw;
}
@function rem($px) {
  @return $px / 50 * 1rem;
}
body {
  font-size: 16px;
  min-height: 100vh;
  padding: 0 0 100px 0;
  overflow: auto;
}
.container {
  box-sizing: border-box;
  width: 100%;
  padding: 16px;
}
span {
  box-sizing: border-box;
}
.bordered {
  border: 1px solid #333;
}
.span1 {
  display: inline-block;
  height: vw(20);
  line-height: vw(20);
  padding: 0 vw(8);
  background-color: #39FF14;
  border-radius: vw(4);
}
.span2 {
  display: inline-block;
  height: 24px;
  line-height: 24px;
  padding: 0 8px;
  background-color: #39FF14;
  border-radius: 4px;
}
.span3 {
  display: inline-block;
  height: rem(24);
  line-height: rem(24);
  padding: 0 rem(8);
  background-color: #36b374;
  border-radius: rem(4);
}
.span4 {
  box-sizing: border-box;
  display: inline-block;
  height: vw(12);
  line-height: 1;
  padding: 0 vw(2);
  background-color: #36b;
  border-radius: vw(4);
}
  ///////////////////////////
body {
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #000;
}

p {
  position: relative;
  font-family: sans-serif;
  text-transform: uppercase;
  font-size: 2em;
  letter-spacing: 1px;
  overflow: hidden;
  background: linear-gradient(90deg, #fff, #fff, #000);
  background-repeat: no-repeat;
  background-size: 80%;
  animation: animate 3s linear infinite;
  -webkit-background-clip: text;
  -webkit-text-fill-color: rgba(255, 255, 255, 0);
}

@keyframes animate {
  0% {
    background-position: -500%;
  }
  100% {
    background-position: 500%;
  }
}
  </style>
<div class="main-wrapper">

   <div class="row">
    <div class="col-md-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="stats-info">
            <h1 class="card-title">Toplam Kullanıcılar<span class="stats-change stats-change-info"></span></h1>
            <h4 style="color: #fff" class="stats-text"><?php echo $rowcount; ?></h4>
          </div>
          <div class="stats-icon change-danger">
            <i class="material-icons">account_circle</i>
            
           
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stats-card">
        <div class="card-body">
          <div class="stats-info">
            <link href='https://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
  <p>ÜYELİK BİLGİLERİ</p>
            <br>
         <table class="table">
            <tr>
              <strong><span style="color: red; font-weight: 800">&nbsp;&nbsp;&nbsp;ÜYELİK</span></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <span style="color: red; font-weight: 800">BİTİŞ TARİHİ<span>
            </tr>
            <tbody>
              <?php
              switch ($uyelik) {
                case 'Freemium':
                  echo '                                          <tr>
                                        <td>Freemium</td>
                                        <td><span class="badge bg-success">Süresiz</span></td><td></td><td></td>
                                        </tr>';
                  break;
                case 'Premium':
                  echo '                                          <tr>
                                        <td>Premium</td>
                                        <td><span class="badge bg-success">' . $bitis_tarihi . '</span></td><td></td><td></td>
                                        </tr>';
                  break;
                case 'Admin':
                  echo '
                                        <td><span style="color: red; font-weight: 800">&nbsp;ADMİN</span></td><td></td><td></td>
                                        <td><span class="badge bg-success">SÜRESİZ 💎</span></td>
                                        </tr>';
                  break;
              }
              ?>
              
            </tbody>
          </table>
           
          </div>
      </div>
    </div>
  </div>
    <div class="col-md-8">
      <div class="card card-bg">
      
 <center><span style="color: red; font-weight: 900">DUYURU PANELİ</span></center>
          <table class="table crypto-table">
            <tr>
              <th scope="col">Duyuru İçeriği</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">Yayın Tarihi</th>
            </tr>
            <tbody>
              <?php
              $query = mysqli_query($conn, "SELECT * FROM `sh_duyuru`");
              while ($getvar = mysqli_fetch_assoc($query)) {
                echo '
                                <tr>
                                  <td style="color: #fff"><img src="" alt="">' . $getvar['d_icerik'] . '</td>
                                  <td style="color: #fff"></td>
                                  <td style="color: #fff" class="text-danger"></td>
                                  <td style="color: #fff"><button type="button" class="btn btn-link">' . $getvar['d_time'] . '</button></td>
                                </tr>
								';
              }
              ?>
            </tbody>
          </table>
        </div>
    
    <div class="col-md-4">
      
        </div>
      </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card card-bg">
          <div class="card-body">
            <center><h5 style="font-size: 26px" class="card-title">Kurallar</h5></center>
            <ul class="kural">
              <li class="kural">Hesabınızı başka bir şahıs ile paylaştığınızda bu <span style="color: red; font-weight: 800">MULTİ</span>
                olduğu için kalıcı bir şekilde banlanıcaksınız.</li>
              <li class="kural">Başka birinin ucuza hesabı sattığı üyelikler, fark edilirse kalıcı şekilde ban yiyecektir. Ünlülere devlet yetkililerine sorgu atmak kesinlikle yasaktır hem siteden kalıcı banlanıp hemde bizi riske attığı için bizzat tarafımızca kendisiyle uğraşılacaktır.
              </li>
              <li class="kural">Kuralları kabul ettiysen artık sende bizden birisin! <br>
                Her hangi bir teknik sorunda iade geçilmez. <br>
                Ban yiyen kişiler tekrar ücret ile üyelik alabilirler.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="content py-3">
  <div class="row fs-sm">
    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
      <i class="fa fa-heart text-danger"></i> <a class="fw-semibold" href="https://t.me/rota47" target="_blank">CHAVO 2.0</a>
    </div>
    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
      <a class="fw-semibold" href="https://t.me/rota47" target="_blank">CHAVO 2.0</a> © <span data-toggle="year-copy" class="js-year-copy-enabled">2022 - 2023</span>
    </div>
  </div>
</div>

<!--BİTİŞ-->
<?php
include('inc/footer_native.php');
include('inc/footer_main.php');
?>