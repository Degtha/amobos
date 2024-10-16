<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AMOBOX Monitoring System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

  <style>
    body {
      background-color: #f0f0f0;
      font-family: Arial, sans-serif;
    }
    .container {
      padding-top: 30px;
    }
    .card {
      text-align: center;
      padding: 20px;
      margin-bottom: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card h3 {
      margin-bottom: 20px;
    }
    .gauge-container {
      width: 100%;
      height: 200px;
    }
    canvas {
      width: 100%;
      height: 100%;
    }
    .data-value {
      font-size: 24px;
      font-weight: bold;
      margin-top: 10px;
    }

    nav {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    padding: 0 7%;
    z-index: 1000;
    max-width: 100vw;
    left: 0;
    top: 0;
    right: 0;
    height: 100px;
    background-color: white;
    overflow-y: hidden;
  }

  nav a {
      font-size: 16px;
      text-decoration: none;
      color: black;
  }

  nav .kanan img {
      aspect-ratio: 16/9;
      width: 200px;
      object-fit: cover;
  }

  nav .tengah {
      display: flex;
      gap: 24px;
      padding: 38px 0;
      justify-content: center;
      align-items: center;
  }

  nav .tengah div {
      transition: all 0.3s ease;
  }

  nav .tengah div:hover {
      transform: scale(1.1);
      border-bottom: 2px solid #048B9E;
  }

  nav .tengah i {
      font-size: 20px;
      align-items: center;
      justify-content: center;
  }

  nav .tengah .beranda {
      border-bottom: 2px solid;
  }

  nav .kiri {
      display: flex;
      padding: 38px 0;
  }

  nav .kiri .statistik button {
      cursor: pointer;
      border-radius: 1000px;
      padding: 8px;
      background-color: white;
      border: none;
      color: #f0f0f0;
      position: relative;
      transition: all 0.3s ease;
      display: flex;
      justify-content: center;
      align-items: center;
  }

  nav .kiri .statistik button::after {
      content: '';
      position: absolute;
      height: 120%;
      width: 105%;
      border-radius: 1000px;
      background-image: linear-gradient(to bottom right, #85C1CC, #048b9e);
      z-index: -1;
  }

  nav .kiri .statistik button:hover {
      z-index: 0;
      box-shadow: 40px 0 100px #048B9E, -40px 0 100px #007bff;
      transform: scale(1.1);
      border-bottom: 2px solid #048B9E;
  }

  nav .beranda, .Konten, .About {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 5px;
  }

  /* NAVBAR MOBILE */
  @media (max-width: 768px) {
      body {
          overflow-x: hidden;
      }

      nav {
          flex-direction: row;
          justify-content: center;
          border-bottom: 1px solid;
          align-items: center;
          overflow-x: hidden;
          gap: 25px;
      }

      nav .tengah {
          gap: 10px;
      }

      nav .kiri {
          display: flex;
          justify-content: space-between;
      }
  }

  @media (max-width: 480px) {
      nav .kiri .statistik button {
          padding: 10px 10px;
      }

      nav .kiri .statistik button a {
          font-size: 10px;
      }

      nav .kanan img {
          width: 80px;
          height: 80px;
      }

      nav .tengah i {
          font-size: 24px;
      }

      nav .tengah p {
          display: none;
      }
  }

  .container{
    padding: 150px 0 0 0;
  }
  </style>
</head>
<body>
    <!-- navbar top -->
  <nav>
      <div class="kanan">
          <a href="index.html">
              <img src="images/amobox landscape logo.png" alt="Logo AMOBOX">
          </a>
      </div>

      <div class="tengah">
          <div class="beranda">
              <a href="index.html"><i class='bx bx-home'></i></a>
              <a href="index.html"><p>BERANDA</p></a>
          </div>
          <div class="Konten">
              <a href="artikel.html"><i class='bx bx-bulb'></i></a>
              <a href="artikel.html"><p>KONTEN</p></a>
          </div>
          <div class="About">
              <a href="tentang-kami.html"><i class='bx bx-user-circle'></i></a>
              <a href="tentang-kami.html"><p>TENTANG KAMI</p></a>
          </div>
      </div>

      <div class="kiri">
          <div class="statistik">
              <button><a href="statistik2.html">STATISTIK</a></button>
          </div>
      </div>
  </nav>


  <div class="container">
    <div class="row">
      <!-- Carbon Data -->
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <h3>Carbon</h3>
          <canvas id="gauge-carbon" width="200" height="200"></canvas>
          <div id="value-carbon" class="data-value">0 ppm</div>
        </div>
      </div>
      <!-- Propane Data -->
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <h3>Propane</h3>
          <canvas id="gauge-propane" width="200" height="200"></canvas>
          <div id="value-propane" class="data-value">0 ppm</div>
        </div>
      </div>
      <!-- Isobutane Data -->
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <h3>Isobutane</h3>
          <canvas id="gauge-isobutane" width="200" height="200"></canvas>
          <div id="value-isobutane" class="data-value">0 ppm</div>
        </div>
      </div>
      <!-- Dust Data -->
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <h3>Dust</h3>
          <canvas id="gauge-dust" width="200" height="200"></canvas>
          <div id="value-dust" class="data-value">0 μg/m³</div>
        </div>
      </div>
      <!-- PM2.5 Data -->
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <h3>PM2.5</h3>
          <canvas id="gauge-pm25" width="200" height="200"></canvas>
          <div id="value-pm25" class="data-value">0 μg/m³</div>
        </div>
      </div>
      <!-- Temperature Data -->
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <h3>Temperature</h3>
          <canvas id="gauge-temp" width="200" height="200"></canvas>
          <div id="value-temp" class="data-value">0 °C</div>
        </div>
      </div>
      <!-- Humidity Data -->
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <h3>Humidity</h3>
          <canvas id="gauge-humid" width="200" height="200"></canvas>
          <div id="value-humid" class="data-value">0 %</div>
        </div>
      </div>
      <!-- TVOC Data -->
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <h3>TVOC</h3>
          <canvas id="gauge-tvoc" width="200" height="200"></canvas>
          <div id="value-tvoc" class="data-value">0 ppb</div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Function to draw gauges
    function drawGauge(canvasId, value, minValue, maxValue, unit) {
      const ctx = document.getElementById(canvasId).getContext('2d');
      ctx.clearRect(0, 0, 200, 200);

      // Buat lingkaran latar belakang
      ctx.beginPath();
      ctx.arc(100, 100, 90, 0, 2 * Math.PI);
      ctx.strokeStyle = '#E0E0E0';
      ctx.lineWidth = 10;
      ctx.stroke();

      // Buat lingkaran progress
      ctx.beginPath();
      ctx.arc(100, 100, 90, 0, (value / maxValue) * 2 * Math.PI);
      ctx.strokeStyle = '#FF6F61';
      ctx.lineWidth = 10;
      ctx.stroke();

      // Tambahkan teks nilai
      ctx.font = '24px Arial';
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillStyle = '#000';
      ctx.fillText(value + ' ' + unit, 100, 100);
    }

    // Update data every 10 seconds
    function updateData() {
      // Replace URL with actual PHP endpoints
      $.get("cekcarbon.php", function(data) {
        const carbon = parseFloat(data);
        $("#value-carbon").text(carbon + " ppm");
        drawGauge('gauge-carbon', carbon, 0, 1000);
      });

      $.get("cekpropane.php", function(data) {
        const propane = parseFloat(data);
        $("#value-propane").text(propane + " ppm");
        drawGauge('gauge-propane', propane, 0, 1000);
      });

      $.get("cekisobutane.php", function(data) {
        const isobutane = parseFloat(data);
        $("#value-isobutane").text(isobutane + " ppm");
        drawGauge('gauge-isobutane ', isobutane, 0, 1000);
      });

      $.get("cekdust.php", function(data) {
        const dust = parseFloat(data);
        $("#value-dust").text(dust + " μg/m³");
        drawGauge('gauge-dust', dust, 0, 500);
      });

      $.get("cekpm25.php", function(data) {
        const pm25 = parseFloat(data);
        $("#value-pm25").text(pm25 + " μg/m³");
        drawGauge('gauge-pm25', pm25, 0, 500);
      });

      $.get("cektemp.php", function(data) {
        const temp = parseFloat(data);
        $("#value-temp").text(temp + " °C");
        drawGauge('gauge-temp', temp, 0, 50);
      });

      $.get("cekhumid.php", function(data) {
        const humid = parseFloat(data);
        $("#value-humid").text(humid + " %");
        drawGauge('gauge-humid', humid, 0, 100);
      });

      $.get("cektvoc.php", function(data) {
        const tvoc = parseFloat(data);
        $("#value-tvoc").text(tvoc + " ppb");
        drawGauge('gauge-tvoc', tvoc, 0, 1000);
      });
    }

    // Initial call
    updateData();

    // Refresh data every 10 seconds
    setInterval(updateData, 10000);
  </script>
</body>
</html>