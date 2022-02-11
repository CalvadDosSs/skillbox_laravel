<div class="contacts">
    <p class="contact_email"> Автор: {{ $contact->email }} </p>
    <hr>
    <p class="contact_message"> {{ $contact->message }} </p>
    <p class="contact_created_at"> {{ $contact->created_at->toFormattedDateString() }} </p>
</div>
