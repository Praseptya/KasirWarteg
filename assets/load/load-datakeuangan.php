              <?php
                require "../../config.php";
                require "../../condition.php";

                $i2 = 1;
                $keylaporan = $_GET['carilaporan'];

                $tbkeuangan = mysqli_query($conn, "SELECT * FROM keuangan WHERE modal LIKE '%$keylaporan%' OR tanggal LIKE '%$keylaporan%'");
                  
                foreach( $tbkeuangan as $rowkeuangan ):
                $sk = strtotime($rowkeuangan["tanggal"]);
                $dk = date("d", $sk);
                $mk = $bulan3[date("M", $sk)];
                $yk = date("Y", $sk);
                $dkmkyk = $dk." ".$mk." ".$yk;
              ?>
              <tr>
                <td><?=$i2;?></td>
                <td>Rp <?=number_format($rowkeuangan["penghasilan_bersih"]);?></td>
                <td>Rp <?=number_format($rowkeuangan["penghasilan_kotor"]);?></td>
                <td>Rp <?=number_format($rowkeuangan["modal"]);?></td>
                <td><?=$dkmkyk;?></td>
                <?php if( $admin ){ ?>
                  <td>
                    <button type="button" class="btn btn-icons btn-danger h-100 w-75 p-1 " data-toggle="modal" data-target="#deletekeuangan<?=$rowkeuangan['id_keuangan'];?>" title="Hapus"><i class="fa fa-trash-o"></i></button>
                  </td>
                <?php } ?>
              </tr>
              <?php 
                $i2++;
                endforeach;
              ?>
              