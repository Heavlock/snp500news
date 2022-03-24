<header class="blog-header py-3">
    <div class="row justify-content-center align-items-center flex-wrap">
        <div class="col-md-4 text-center">
            <a class="blog-header-logo text-dark" href="/">S&P500 NEWS</a>
        </div>
        <div class="col-md-4 pt-1 header-desc">
            <span class="text-muted">Новости из мира финансов Американских и Европейских стран</span>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <form action="{{route('search')}}" method="get">
                @csrf
                <div class="input-group">
                    <input type="search" name="search" class="form-control rounded" placeholder="Поиск"
                           aria-label="Поиск"
                           aria-describedby="search-addon" required/>
                    <button type="submit" class="btn btn-outline-secondary">Поиск</button>
                </div>
            </form>
        </div>
    </div>
</header>
