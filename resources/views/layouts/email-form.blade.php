<?php
/**
 * @var \App\Models\Invite $invite
 * @var int $giftTypeId
 */
?>

<form action="{{ route('receive-gift', ['code' => $invite->code]) }}"
      method="POST">
    <input type="email" name="email" placeholder="@MailForm">
    <input type="hidden"
           name="gift_type_id"
           value="{{ $giftTypeId }}"
           class="sform-form__input" >
    <input type="hidden"
           name="_token"
           value="{{ csrf_token() }}">
    <button type="submit"><img src="{{ asset('img/submit.png') }}" alt=""></button>
</form>
<p>Введите почту, на которую Вам будет отправлен код активации.</p>
