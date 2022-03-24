@section('title')
    S&P 500 NEWS - Финансовые новости компаний Европы и Запада
@endsection
@include('parts.head')

<body>

<main role="main" class="container-fluid">
    @include('parts.header')

    @include('parts.nav')

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark main-section">
        <div class="col-md-12 px-0">
            <h1 class="display-3 font-weight-bold">S&P 500 Финансовые новости Европы и Америки</h1>
            <p class="lead my-3">Узнавайте первыми о финасовых событиях в мире!</p>
        </div>
    </div>
    <div class="container">
        @include('parts.postThumb')
        <div class="mt-3 mb-3">
        {{$posts->links()}}
        </div>
    </div>
</main>
<!-- Yandex.RTB R-A-1285108-3 -->
<div id="yandex_rtb_R-A-1285108-3"></div>
<script>window.yaContextCb.push(()=>{
        Ya.Context.AdvManager.render({
            renderTo: 'yandex_rtb_R-A-1285108-3',
            blockId: 'R-A-1285108-3'
        })
    })</script>
@include('parts.footer')
@include('parts.scripts')
</body>
</html>
