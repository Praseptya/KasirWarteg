              <?php
                require "../../config.php";
                require "../../condition.php";

                $i1 = 1;
                $keylaporan = $_GET['carilaporan'];

                $tbpesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE nama_transaksi LIKE '%$keylaporan%' OR total LIKE '%$keylaporan%' OR tanggal LIKE '%$keylaporan%' ORDER BY id_pesanan DESC");

                foreach( $tbpesanan as $rowpesanan ):
                $rp = strtotime($rowpesanan["tanggal"]);
                $dp = date("d", $rp);
                $mp = $bulan3[date("M", $rp)];
                $yp = date("Y", $rp);
                $dpmpyp = $dp." ".$mp." ".$yp;
              ?>
              <tr>
                <td><?=$i1;?></td>
                <td><?=$rowpesanan["id_transaksi"];?></td>
                <td><?=$rowpesanan["nama_transaksi"];?></td>
                <td>Rp <?=number_format($rowpesanan["total"]);?></td>
                <td><?=$dpmpyp;?></td>
                <td>
                  <a href="?p=detail&id=<?=$rowpesanan['id_pesanan'];?>" class="btn btn-icons h-100 w-50 p-1 btn-primary" title="Detail"><i class="fa fa-info"></i></a>
                  <?php if( $admin ){ ?>
                  <button type="button" class="btn btn-icons h-100 w-50 p-1 btn-danger" data-toggle="modal" data-target="#deletepesanan<?=$rowpesanan["id_pesanan"];?>" title="Hapus"><i class="fa fa-trash-o"></i></button>
                  <?php } ?>
                </td>
              </tr>
              <?php 
                $i1++;
                endforeach;
              ?>
