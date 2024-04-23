
@component('mail::message')

    <h2>Olá</h2>

    <p>Para resetar sua senha clique no link abaixo</p>

    <a href="{{ url('/reset-password/'.$body['token']) }}">Clique aqui</a>.

    <p>
        @component('mail::button', ['url' => url('/reset-password/'.$token)])
            Redefinir senha
        @endcomponent
    </p>

   Att!<br>

    {{ config('app.name') }}<br>

@endcomponent
