<style>

    .allert {
        background-color: #DA7F8C;
        max-width: 1000px;
        margin: 10px auto;
        padding: 10px 20px;
        border-radius: 10px;
    }

</style>


@if($errors->count())
    <div class="allert">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
