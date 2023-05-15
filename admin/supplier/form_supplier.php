<?php
require_once '../dbkoneksi.php';
?>

<?php
// cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!empty($_id)) {
    // ambil data pesanan berdasarkan id
    $sql = "SELECT * FROM supplier WHERE id=?";
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
    <form method="POST" action="proses_supplier.php">
        <div class="form-group row mt-3">
            <label for="tanggal" class="col-4 col-form-label">Nama Supplier</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="name" name="name" type="text" class="form-control" value="<?php if (isset($row['name'])) echo $row['name']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="quantity" class="col-4 col-form-label">Nomor Telepon</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="phone" name="phone" type="number" class="form-control" value="<?php if (isset($row['phone'])) echo $row['phone']; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="total" class="col-4 col-form-label">Alamat Supplier</label>
            <div class="col-8">
                <div class="input-group">
                    <textarea name="address" id="address" cols="30" rows="10" class="form-control">
                    <?php if (isset($row['address'])) echo $row['address']; ?>
                    </textarea>
                </div>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="tanggal" class="col-4 col-form-label">Nama Kontak</label>
            <div class="col-8">
                <div class="input-group">
                    <input id="contact_name" name="contact_name" type="text" class="form-control" value="<?php if (isset($row['contact_name'])) echo $row['contact_name']; ?>">
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