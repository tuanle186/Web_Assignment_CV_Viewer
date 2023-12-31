<nav class="navbar navbar-dark navbar-expand-sm bg-body-tertiary sticky-top mb-4">
    <div class="container">
        <a href="collection.php"> <img class="navbar-brand" src="../Asset/logo.png" alt="HCMUT logo" width="60" height="68"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex me-auto nav-link" role="search" id="searchForm">
                <div class="input-group">
                    <input type="text" class="form-control no-hover-input" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="searchInput" name="search">
                    <button type="submit" class="btn btn-outline-secondary bg-white border-start-0 border ms-n5">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav mb-md-0 mb-sm-2">
                <div class="nav-link dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo $_SESSION['email'] ?> </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="../login_page/logout.php">Log out</a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>