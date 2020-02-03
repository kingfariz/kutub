<?php
include "database/koneksi.php";

$select =" SELECT 
                tb_video.judul as judul
                FROM tb_video
                LEFT JOIN tb_respon
                ON tb_video.id_video = tb_respon.id_video
                GROUP BY tb_video.kategori, tb_video.id_video, tb_video.judul, tb_video.tgl_upload, tb_video.deskripsi, tb_video.lokasi
                order by tgl_upload desc
                ";
$select2 =" SELECT 
                sum(tb_respon.respon like 'like') as jumlah
                FROM tb_video
                LEFT JOIN tb_respon
                ON tb_video.id_video = tb_respon.id_video
                GROUP BY tb_video.kategori, tb_video.id_video, tb_video.judul, tb_video.tgl_upload, tb_video.deskripsi, tb_video.lokasi
                order by tgl_upload desc
                ";
$exec       = mysqli_query($conn, $select);
$exec2 = mysqli_query($conn, $select2);
				
?>
<html>
    <head>
        <title>Chart</title>
        <script src="../style/Chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

        <style type="text/css">
            .container5 {
                width: 30%;
                margin-left: 10%;
            }
        </style>
    </head>
    <body>
	<h3 id="margin"> Grafik Total Likes Video Berdasarkan Tanggal Upload </h3>
        <div class="container5">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($exec)) { echo '"' . $b['judul'] . '",';}?>],
                    datasets: [{
                            label: '# jumlah like',
                            data: [<?php while ($p = mysqli_fetch_array($exec2)) { echo '"' . $p['jumlah'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html>