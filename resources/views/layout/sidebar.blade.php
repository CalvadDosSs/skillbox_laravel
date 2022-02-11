<style>

    .main_sidebar {
        float: right;
        border-radius: 20px;
        max-width: 200px;
        background-color: lightskyblue;
        margin: 20px 0;
        height: 50px;
        display: block;
    }

</style>

    @include('articles.tags', ['tags' => $tagsCloud])
<aside class="main_sidebar">

</aside>
