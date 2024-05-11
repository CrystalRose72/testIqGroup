<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <title>World Bank</title>
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>
<body>
    <div class="wpapper">
        <header class="wrap">
            <div>
                    <ul class="logoAndTelephone">
                        <span class="logo">
                            <a href="#"><img src="images/logo.png"/></a>
                        </span>
                        <span class="telephones">
                            <h2>8-800-100-5005</h2>
                            <h2>+7 (3452) 522-000</h2>
                        </span>
                    </ul>
            </div>
            <div class="clear"></div>
                <div class="menu">
                    <ul>
                        <li><a href="#">Кредитные карты</a></li>
                        <li><a href="#"  class="active">Вклады</a></li>
                        <li><a href="#">Дебетовая карта</a></li>
                        <li><a href="#">Страхование</a></li>
                        <li><a href="#">Друзья</a></li>
                        <li><a href="#">Интернет-банк</a></li>
                    </ul>
                </div>
        </header>
        <div class="clear"></div>
        <div class="links_conteiner">
            <div class="links">
                <ul>
                    <span><a href="#">Главная</a></span>
                    <span>-</span>
                    <span><a href="#">Вклады</a></span>
                    <span>-</span>
                    <span><a href="#">Калькулятор</a></span>
                </ul>
            </div>
        </div>
        <div class="calcule_container">
            <h1>Калькулятор</h1>
            <form class="calc_form"  action="">
                <label>Дата оформления вклада</label>
                <input type="date" name="date"><br>
                <label>Сумма вклада</label>
                <input type="number" name="summ" min="1000" max="3000000"><br>
                <label>Срок вклада</label>
                <select class="select_validity" name="validity">
                    <option value="1">1 год</option>
                    <option value="2">2 года</option>
                    <option value="3">3 года</option>
                    <option value="4">4 года</option>
                    <option value="5">5 лет</option>
                </select><br>
                <label>Пополнение вклада</label>
                <span>
                    <input type="radio" name="radio" value="no" <?php echo (!$_SESSION['radio'] || $_SESSION['radio'] == "no") ? 'checked="checked"' : ''; ?>>
                    <label value="Нет">Нет</label>
                </span>
                <span>
                    <input type="radio" name="radio" value="yes">
                    <label value="Да">Да</label>
                </span>
                <br>
                <label>Сумма пополнения вклада</label>
                <input type="number" name="summ_refill" min="1000" max="3000000"><br>
                <button type="submit" class="btnResult">Расчитать</button><span id="result"></span>
            </form>
            <script>
                $(".calc_form").on("submit", function(){
                    $.ajax({
                        url: 'calc.php',
                        method: 'post',
                        dataType: 'html',
                        data: $(this).serialize(),
                        success: function(data){
                            $('#result').html(data);
                        }
                    });
                    return false;
                });
            </script>
        </div>
        <div class="footer">
            <ul>
                <li><a href="#">Кредитные карты</a></li>
                <li><a href="#">Вклады</a></li>
                <li><a href="#">Дебетовая карта</a></li>
                <li><a href="#">Страхование</a></li>
                <li><a href="#">Друзья</a></li>
                <li><a href="#">Интернет-банк</a></li>
            </ul>
        </div>
    </div>
    
</body>
</html>