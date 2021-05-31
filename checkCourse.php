<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/corsinfo.css">
    <title>Course Info</title>
</head>

<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400);

    .site {
        display: flex;
        min-height: 100vh;
    }

    .site-nav {
        background: white;
        width: 120px;
        border-right: 1px solid #e6e6e6;
    }

    .site-content {
        background: #eee;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .content-header {
        background: #fff;
        height: 40px;
        box-shadow: 0 2px 0 rgba(0, 0, 0, 0.15);
    }

    .content-topic {
        background: #fff;
        flex-grow: 1;
        margin: 30px 50px;
        box-shadow: 5px 5px 0 rgba(0, 0, 0, 0.15);
    }

    .flex-center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .section-title {
        font-size: 1.5em;
        font-family: "Open Sans", sans-serif;
        color: rgba(0, 0, 0, 0.25);
        text-align: center;
    }
</style>

<body class="site">
    <nav class="site-nav flex-center">
        <h1 class="section-title">NAV</h1>
    </nav>
    <main class="site-content">
        <header class="content-header flex-center">
            <h1 class="section-title">HEADER</h1>
        </header>
        <section class="content-topic flex-center">
            <h1 class="section-title">TOPIC</h1>
        </section>
    </main>
</body>

</html>