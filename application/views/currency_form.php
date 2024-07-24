<!DOCTYPE html>
<html>

<head>
    <title>Valyutalar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Valyuta Əlavə Et</h2>
        <form id="currencyForm" class="form-inline">
            <div class="form-group mb-2">
                <label for="name" class="sr-only">Valyuta Adı</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Valyuta Adı" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-2">Əlavə Et</button>
        </form>
    </div>
    <script>
        $('#currencyForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url("currency/create") ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status == 'success') {
                        alert('Valyuta uğurla əlavə edildi!');
                    } else {
                        alert('Xəta baş verdi!');
                    }
                }
            });
        });
    </script>
</body>
</html>