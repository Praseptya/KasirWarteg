              <?php
                require "../../config.php";
                require "../../condition.php";

                $i3 = 1;
                $keylaporan = $_GET['carilaporan'];

                $tbmenu = mysqli_query($conn, "SELECT * FROM daftar_menu INNER JOIN detail_pesanan ON daftar_menu.id_menu=detail_pesanan.id_menu INNER JOIN pesanan ON detail_pesanan.id_pesanan=pesanan.id_pesanan WHERE daftar_menu.menu LIKE '%$keylaporan%' OR daftar_menu.jenis LIKE '%$keylaporan%' OR pesanan.tanggal LIKE '%$keylaporan%' OR daftar_menu.terjual LIKE '%$keylaporan%' ORDER BY daftar_menu.menu");

                foreach( $tbmenu as $rowmenu ):
              ?>
              <tr>
                <td><?=$i3;?></td>
                <td><?=$rowmenu["menu"];?></td>
                <td><?=$rowmenu["qty"];?></td>
                <td><?=$rowmenu["jenis"];?></td>
              </tr>
              <?php
                $i3++;
                endforeach;
              ?>
              