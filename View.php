<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Currency Converter</title>
</head>
<body>
<div class="container">
    <form action="Converter.php" method="post">
        <fieldset>
            <legend>Currency Converter</legend>
            <div class="mb-3">
                <label for="StateName1" class="form-label">Select Currency to Convert From</label>
                <select class="form-select" name="StateName1" id="StateName1" required>
                    <?php
                    foreach ($currency->customCurrencies() as $currencyName => $rate) {
                        echo "<option value='$currencyName'>$currencyName</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="StateName2" class="form-label">Select Currency to Convert To</label>
                <select class="form-select" name="StateName2" id="StateName2" required>
                    <?php
                    foreach ($currency->customCurrencies() as $currencyName => $rate) {
                        echo "<option value='$currencyName'>$currencyName</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount in UZS</label>
                <input type="number" id="amount" class="form-control" name="amount" step="0.01" min="0" value="<?= htmlspecialchars((string)$amount) ?>" required aria-describedby="amountHelp">
                <div id="amountHelp" class="form-text">Enter the amount in UZS to be converted.</div>
            </div>
            <div class="mb-3">
                <label for="convertedAmount1" class="form-label">Converted Amount (Currency 1)</label>
                <input type="text" id="convertedAmount1" class="form-control" value="<?= htmlspecialchars((string)$convertedAmount1) ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="convertedAmount2" class="form-label">Converted Amount (Currency 2)</label>
                <input type="text" id="convertedAmount2" class="form-control" value="<?= htmlspecialchars((string)$convertedAmount2) ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Convert</button>
        </fieldset>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
