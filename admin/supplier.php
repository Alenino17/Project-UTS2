<?php
include_once 'template/header.php';
include_once 'template/navbar.php';

require_once 'dbkoneksi.php';

// select all data from table "produk"
$sql = "SELECT * FROM supplier";
// execute the query
$rs = $dbh->query($sql);


?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Data Supplier</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>
        <div class="card mb-4 col-md-2">
            <div class="card-body">
                <a class="btn btn-primary" href="supplier/form_supplier.php">Tambah Data</a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Data Produk produk
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Supplier</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                            <th>Nama Kontak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        foreach ($rs as $row) {
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['contact_name'] ?></td>
                                <td>
                                    <a class="btn btn-primary" href="supplier/view_supplier.php?id=<?= $row['id'] ?>">View</a>
                                    <a class="btn btn-primary" href="supplier/form_supplier.php?id=<?= $row['id'] ?>">Edit</a>
                                    <a class="btn btn-primary" href="supplier/delete_supplier.php?id=<?= $row['id'] ?>" onclick="if(!confirm('Anda Yakin Hapus Data pembelian <?= $row['name'] ?>?')) {return false}">Delete</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
include_once 'template/footer.php';
?>