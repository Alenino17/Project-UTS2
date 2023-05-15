<?php
include_once 'template/header.php';
include_once 'template/navbar.php';

require_once 'dbkoneksi.php';

// select all data from table "produk"
$sql = "SELECT * FROM `order`";
// execute the query
$pesanans = $dbh->query($sql);


?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Data Pesanan Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Pesanan</li>
        </ol>
        <div class="card mb-4 col-md-2">
            <div class="card-body">
                <a class="btn btn-primary" href="pesanan/form_pesanan.php">Tambah Data</a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Data Pesanan Produk
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Order Name</th>
                            <th>Tanggal Pesanan</th>
                            <th>Nama Produk</th>
                            <th>QTY</th>
                            <th>Total Harga</th>
                            <th>Nama Customer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        foreach ($pesanans as $row) {
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['order_number'] ?></td>
                                <td>
                                    <?php
                                    $date = date_create($row['date']);
                                    echo date_format($date, 'd-m-Y');
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sqljenis = "SELECT * FROM product WHERE id = " . $row['product_id'];
                                    $pesanansjenis = $dbh->query($sqljenis);
                                    $rowjenis = $pesanansjenis->fetch();
                                    echo $rowjenis['name'];
                                    ?>
                                </td>
                                <td><?= $row['qty'] ?></td>
                                <td><?= $row['total_price'] ?></td>
                                <td>
                                    <?php
                                    $sqljenis = "SELECT * FROM customer WHERE id = " . $row['customer_id'];
                                    $pesanansjenis = $dbh->query($sqljenis);
                                    $rowjenis = $pesanansjenis->fetch();
                                    echo $rowjenis['name'];
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="pesanan/view_pesanan.php?id=<?= $row['id'] ?>">View</a>
                                    <a class="btn btn-primary" href="pesanan/form_pesanan.php?id=<?= $row['id'] ?>">Edit</a>
                                    <a class="btn btn-primary" href="pesanan/delete_pesanan.php?id=<?= $row['id'] ?>" onclick="if(!confirm('Anda Yakin Hapus Data pembelian <?= $row['id'] ?>?')) {return false}">Delete</a>
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