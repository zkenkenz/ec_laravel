    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">サンプル</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="admin">商品管理一覧へ</a>
                    </li>
                    <li class="nav-item">
                        <form action="informations" method="post" name="information">
                            @csrf
                            <a class="nav-link" href="javascript:information.submit()">ユーザー情報一覧</a>
                        </form>
                    </li>
            </div>
        </div>
    </nav>
