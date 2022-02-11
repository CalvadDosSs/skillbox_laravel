<style>

    .success {
        background-color: limegreen;
        max-width: 1000px;
        margin: 10px auto;
        padding: 10px 20px;
        border-radius: 10px;
    }

</style>


@if(isset($success))
    <div class="success">
        <ul>
            Изменения выполнены успешно
        </ul>
    </div>
@endif
