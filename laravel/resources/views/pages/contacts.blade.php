@extends('post')
@section('content')
    <div class="text-center">
        <h1>Данные издания</h1>
    </div>
    <div class="row m-5 align-items-center">
        <div class="col-md-6">
           <p><span class="lead">Название издания:</span> S&P 500 news</p>
            <p><span class="lead">Адрес:</span> Город Екатеринбург, ул. Ткачей 6 оф.25</p>
            <p><span class="lead">Правовая форма регистрации:</span> ИП Жолобов Н.Н</p>
            <p><span class="lead">ИНН:</span> 665805802240</p>
            <p><span class="lead">ОГРНИП:</span> 319665800125222</p>
            <p><span class="lead">E-mail:</span> snp500news@gmail.com</p>
            <p><span class="lead">Сайт:</span> snp500-news.ru</p>
            <p><span class="lead">Тематика новостного портала:</span> Финансовые новости Американских и Европейских компаний</p>
        </div>
        <div class="col-md-6">
            <div style="position:relative;overflow:hidden;"><a
                    href="https://yandex.ru/maps/54/yekaterinburg/?utm_medium=mapframe&utm_source=maps"
                    style="color:#eee;font-size:12px;position:absolute;top:0px;">Екатеринбург</a><a
                    href="https://yandex.ru/maps/54/yekaterinburg/house/ulitsa_tkachey_6/YkkYcARlQUwCQFtsfXRweXpkZQ==/?ll=60.635895%2C56.818671&utm_medium=mapframe&utm_source=maps&z=16.72"
                    style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Ткачей, 6 — Яндекс.Карты</a>
                <iframe src="https://yandex.ru/map-widget/v1/-/CCUmEJXWWC" width="560" height="400" frameborder="1"
                        allowfullscreen="true" style="position:relative;"></iframe>
            </div>
        </div>
    </div>
@endsection
