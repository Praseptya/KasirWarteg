              <?php
                $total = $_GET['total'];
                $bayar = $_GET['bayar'];
                if( $bayar>$total ){
                  $kembali = $bayar-$total;
                } elseif( $bayar==$total ){
                  $kembali = 0;
                } else {
                  $kembali = 0;
                }
              ?>
              <input type="number" name="kembali" id="kembali" class="form-control" readonly value="<?=$kembali;?>" title="Uang Kembalian">
              <?php
                if( $bayar=="" ){
                  echo "";
                } else {
                  if( $bayar<$total ){
                    echo "<h6 class='text-danger mt-1'>Bayar masih kurang :</h6><h6 class='text-danger mt-n2'>Rp ".number_format(abs($bayar-$total))."</h6>";
                  }
                }
              ?>
