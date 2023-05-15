<?php
require_once '../dbkoneksi.php';
?>

<?php
// cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!empty($_id)) {
    // ambil data pesanan berdasarkan id
    $sql = "SELECT * FROM `order` WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
} else {
    // jika tidak ada parameter id pada URL, maka dianggap input data baru
    // inisialisasi variabel $row sebagai array kosong
    $row = [];
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<div class="container m-5">
    <form method="POST" action="proses_pesanan.php">
        <div class="form-group row mt-3">
            <label for="order_number" class="col-4 col-form-label">Order Number Produk</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="order_number" name="order_number" type="order_number" class="form-control" value="<?php if (isset($row['order_number'])) echo $row['order_number']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="tanggal" class="col-4 col-form-label">Tanggal Pesanan</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="date" name="date" type="date" class="form-control" value="<?php if (isset($row['date'])) echo $row['date']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="product_id" class="col-4 col-form-label">Nama Produk</label>
            <div class="col-8">
                <select id="product_id" name="product_id" class="custom-select">
                    <?php
                    $sql = "SELECT * FROM product";
                    $st = $dbh->prepare($sql);
                    $st->execute();
                    $rows = $st->fetchAll();
                    foreach ($rows as $row) {
                        echo "<option value='$row[id]'>$row[name]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="quantity" class="col-4 col-form-label">QTY</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="qty" name="qty" type="number" class="form-control" value="<?php if (isset($row['qty'])) echo $row['qty']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="total" class="col-4 col-form-label">Total Harga</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="total_price" name="total_price" type="number" class="form-control" value="<?php if (isset($row['total_price'])) echo $row['total_price']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="customer_id" class="col-4 col-form-label">Nama Costumer</label>
            <div class="col-8">
                <select id="customer_id" name="customer_id" class="custom-select">
                    <?php
                    $sql = "SELECT * FROM customer";
                    $st = $dbh->prepare($sql);
                    $st->execute();
                    $rows = $st->fetchAll();
                    foreach ($rows as $row) {
                        echo "<option value='$row[id]'>$row[name]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="offset-4 col-8">
                <?php
                $button = (empty($_id)) ? "Simpan" : "Update";
                ?>
                <input type="submit" name="proses" type="submit" class="btn btn-primary" value="<?= $button ?>" />
                <input type="hidden" name="id" value="<?= $_id ?>" />
            </div>
        </div>
    </form>
</div>