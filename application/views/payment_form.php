<!DOCTYPE html>
<html>

<head>
    <title>Ödəniş Əlavə Et</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Ödəniş Əlavə Et</h2>
        <form id="paymentForm">
            <div class="form-group">
                <label for="amount">Məbləğ:</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Məbləğ" required>
            </div>
            <div class="form-group">
                <label for="category_id">Ödəniş Növü:</label>
                <select class="form-control" id="category_id" name="category_id" required>
                </select>
            </div>
            <div class="form-group">
                <label for="currency_id">Valyuta:</label>
                <select class="form-control" id="currency_id" name="currency_id" required>
                </select>
            </div>
            <div class="form-group">
                <label for="type">Tip:</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="income">Mədaxil</option>
                    <option value="expense">Məxaric</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Qeyd:</label>
                <input type="text" class="form-control" id="comment" name="comment" placeholder="Qeyd">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Əlavə Et</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '<?= base_url("payment/get_form_data") ?>',
                type: 'GET',
                success: function(response) {
                    var data = JSON.parse(response);
                    var categories = data.categories;
                    var currencies = data.currencies;

                    var categorySelect = $('#category_id');
                    categories.forEach(function(category) {
                        categorySelect.append('<option value="' + category.id + '">' + category.name + '</option>');
                    });

                    var currencySelect = $('#currency_id');
                    currencies.forEach(function(currency) {
                        currencySelect.append('<option value="' + currency.id + '">' + currency.name + '</option>');
                    });
                }
            });

            
            $('#paymentForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url("payment/add") ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status == 'success') {
                            alert('Ödəniş əlavə edildi!');
                        } else {
                            alert('Xəta baş verdi!');
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>