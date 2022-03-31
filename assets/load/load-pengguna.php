              <?php
                require "../../config.php";
                require "../../condition.php";

                $i = 1;
                $keyword = $_GET["cariuser"];

                $tbpengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE username LIKE '%$keyword%' OR nama_lengkap LIKE '%$keyword%' OR email LIKE '%$keyword%' OR telepon LIKE '%$keyword%' OR level LIKE '%$keyword%' OR status LIKE '%$keyword%'");

                foreach( $tbpengguna as $rowpengguna ):
              ?>
              <tr>
                <td><?=$i;?></td>
                <td><img src="assets/images/user/<?=$rowpengguna['gambar'];?>" alt="Foto <?=$rowpengguna['nama_lengkap'];?>" title="Foto <?=$rowpengguna['nama_lengkap'];?>"></td>
                <td><?=$rowpengguna["nama_lengkap"];?></td>
                <td><?=$rowpengguna["email"];?></td>
                <td><?=$rowpengguna["telepon"];?></td>
                <td><?=$rowpengguna["username"];?></td>
                <td><?=$rowpengguna["level"];?></td>
                <td><?=$rowpengguna["status"]=="aktif" ? '<strong class="text-success">Aktif</strong>':'<strong class="text-danger">Pasif</strong>';?></td>
                <td>
                  <button type="button" class="btn btn-icons btn-secondary" data-toggle="modal" data-target="#edit<?=$rowpengguna['id_pengguna'];?>" title="ubah level dan status"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-icons btn-danger" data-toggle="modal" data-target="#delete<?=$rowpengguna['id_pengguna'];?>" title="Hapus <?=$rowpengguna['nama_lengkap'];?>"><i class="fa fa-trash-o"></i></button>
                </td>
              </tr>
              <?php
                $i++;
                endforeach;
              ?>
              