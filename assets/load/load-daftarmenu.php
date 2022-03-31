              <?php
                require "../../config.php";
                require "../../condition.php";

                $keymenu = $_GET["carimenu"];

                $tbmenu = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE menu LIKE '%$keymenu%' OR harga LIKE '%$keymenu%' OR status LIKE '%$keymenu%' ORDER BY menu");

                foreach( $tbmenu as $rowmenu ):
              ?>
              <tr>
                <td><img src="assets/images/daftarmenu/<?=$rowmenu["gambar"];?>" alt="<?=$rowmenu['menu'];?>" class="thumb-image img-lg" title="Gambar <?=$rowmenu['menu'];?>"></td>
                <td><?=$rowmenu["menu"];?></td>
                <td>Rp <?=number_format($rowmenu["harga"]);?></td>
                <td><?=$rowmenu["status"]=="Tersedia" ? '<strong class="text-success">Tersedia</strong>':'<strong class="text-danger">Habis</strong>';?>
                </td>
                <?php if( $admin ){ ?>
                  <td>
                    <button type="button" class="btn btn-icons btn-secondary" data-toggle="modal" data-target="#edit<?=$rowmenu['id_menu'];?>" title="Ubah"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-icons btn-danger" data-toggle="modal" data-target="#delete<?=$rowmenu['id_menu'];?>" title="Hapus"><i class="fa fa-trash-o"></i></button>
                  </td>
                <?php } ?>
              </tr>
              <?php endforeach; ?>
              