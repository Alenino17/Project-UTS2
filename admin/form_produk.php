<?php
require_once 'dbkoneksi.php';
?>

<?php
// cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!empty($_id)) {
    // ambil data Produk berdasarkan id
    $sql = "SELECT * FROM product WHERE id=?";
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
    <form method="POST" action="proses_produk.php">
        <div class="form-group row mt-3">
            <label for="name" class="col-4 col-form-label">Kode Produk</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="name" name="sku" type="text" class="form-control" value="<?php if (isset($row['sku'])) echo $row['sku']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="name" class="col-4 col-form-label">Nama Produk</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="name" name="name" type="text" class="form-control" value="<?php if (isset($row['name'])) echo $row['name']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="jenis" class="col-4 col-form-label">Jenis Produk</label>
            <div class="col-8">
                <?php
                $sqljenis = "SELECT * FROM product_type";
                $rsjenis = $dbh->query($sqljenis);
                ?>
                <select id="product_type_id" name="product_type_id" class="custom-select">
                    <?php
                    foreach ($rsjenis as $rowjenis) {
                    ?>
                        <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="stok" class="col-4 col-form-label">Min Tersedia</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="stok" name="min_stock" value="<?php if (isset($row['min_stock'])) echo $row['min_stock']; ?>" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="stok" class="col-4 col-form-label">Stok Tersedia</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="stok" name="stock" value="<?php if (isset($row['stock'])) echo $row['stock']; ?>" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="jenis" class="col-4 col-form-label">Restok Produk</label>
            <div class="col-8">
                <?php
                $sqljenis = "SELECT * FROM restock";
                $rsjenis = $dbh->query($sqljenis);
                ?>
                <select id="restock_id" name="restock_id" class="custom-select">
                    <?php
                    foreach ($rsjenis as $rowjenis) {
                    ?>
                        <option value="<?= $rowjenis['id'] ?>"><?= $rowjenis['restock_number'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="harga" class="col-4 col-form-label">Harga Beli</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="harga" name="purchase_price" value="<?php if (isset($row['purchase_price'])) echo $row['purchase_price']; ?>" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="harga" class="col-4 col-form-label">Harga jual</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="harga" name="sell_price" value="<?php if (isset($row['sell_price'])) echo $row['sell_price']; ?>" type="text" class="form-control">
                </div>
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